<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\CardImport;
use App\Models\PackageType;
use App\Models\User;
use App\Models\Card;
use App\Notifications\sendCard;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Validator;



class CardsController extends Controller
{

    public function index(Request $request)
    {
        $status = ['draft', 'pending','done','paid','print'];
        $card = Card::with('agent','cards','package');
//        $card = Card::whereIsParent(1)->with('agent','cards','package');
        if($request->get('cpr')){
            $card->where('cpr_no',$request->get('cpr'))
                ->orWhere('full_name', 'like', '%'.$request->get('cpr').'%')
                ->orWhere('mobile', 'like', '%'.$request->get('cpr').'%')
                ->orWhere('mobile2', 'like', '%'.$request->get('cpr').'%')
                ->orWhere('email', 'like', '%'.$request->get('cpr').'%')
                ->orWhere('phone', 'like', '%'.$request->get('cpr').'%');
        }
         if($request->get('s')){
             if($request->get('s') == 'paid'){
                 $card->where('paid',1);
             }else {
                 $card->where('status',$request->get('s'));
             }
        }
         if($request->has('online')){
            $card->where('online',1);
        }
         if($request->has('agent')){
             $agent = $this->cardAgent();
            $card->where('agent_id','!=',$agent);
        }
         if($request->has('today')){
            $card->whereDate('issue_date', Carbon::today())->wherePaid(1);
        }
         if($request->has('imported')){
            $card->where('imported', 1);
        }
         if($request->has('expired')){
            $card->where('expiry_date', '<=', Carbon::now());
        }
         if($request->has('renewal')){
            $card->where('expiry_date', '<=', Carbon::now()->subDays(20));
        }
         if($request->get('from') && $request->get('to')){
             $from = date($request->get('from'));
             $to = date($request->get('to'));
            $card->whereBetween('issue_date', [$from, $to]);
        }

        $cards = $card->with('card')->orderBy('id','desc')->paginate(50);

         if($request->has('export')){
             return view('admin.cards.export', compact('cards','status'));
         }
        return view('admin.cards.list', compact('cards','status'));
    }

    public function cards($id, Request $request)
    {
        $design = $request->has('no_design') ? false : true;
       $p_card =  Card::wherePolicyNo($id)->first();
        if(!$p_card){
            return redirect()->back('error_message', 'Something went wrong');
        }
     $cards = Card::whereId($p_card->id)->orWhere('card_id',$p_card->id)->where('status','!=','draft')->get();

        if($request->has('download'))
        {
            $design = $request->has('no_design') ? false : true;
            $pdf = PDF::loadView('admin.cards.print_cards',compact('cards','design'));
            $pdf->setPaper(array(30,-30,450,240),'portrait');
            return $pdf->download($id.'.pdf');
        }


        return view('admin.cards.cards', compact('cards','design','id'));
    }

    public function deleteAllCards(){

        Card::truncate();
        return back()->with('success_message', 'All cards successfully deleted.');
    }

    public function cardOnline($id, Request $request)
    {
        $design = $request->has('no_design') ? false : true;
       $card =  Card::wherePolicyNo($id)->first();
//       $cards =  Card::wherePolicyNo($id)->get();
     $cards =  Card::wherePaid(1)->whereId($card->id)->orWhere('card_id',$card->id)->where('status','!=','pending')->get();
        if(!$card){
            return redirect()->route('check')->with('error_message', 'Something went wrong');
        }

        if($request->has('download'))
        {
            $design = $request->has('no_design') ? false : true;
            $pdf = PDF::loadView('admin.cards.print_cards',compact('cards','design'));
            $pdf->setPaper(array(30,-30,450,240),'portrait');
            return $pdf->download($id.'_online.pdf');
        }

        if($request->has('email'))
        {
            if($card->email && filter_var($card->email, FILTER_VALIDATE_EMAIL)) {
                Notification::route('mail', $card->email)->notify(new sendCard($card));
                $msg = 'Card successfully emailed to '. $card->email;
                return redirect()->back()->with('success_message', $msg);
            }else{
                return redirect()->back()->with('error_message', 'no valid email found went wrong');
            }
        }
        return view('cards', compact('card','cards','design'));
    }

    public function onlineSearch(Request  $request){
        $cpr = $request['cpr'];
        if($cpr){
            $card = Card::wherePaid(1)->where('cpr_no', $cpr)->first();
            if($card){
                $data['status'] = 1;
                $data['card'] = $card;
                return  $data;
            }else{
                $data['status'] = 0;
                return $data;
            }
        }else{
            $data['status'] = 0;
            return $data;
        }
    }


    public function printCards(Request $request){
//        $dompdf = new Dompdf();
        if(!$request->get('id')){
            return redirect()->back()->with('error_message', 'Pls select cards to print');
        }
        $ids = array();
        foreach($request['id'] as $value){
            $ids[] = (int)$value;
        }
        $cards = Card::whereIn('id', $ids)->get();
        $design = $request['design'];
        $pdf = PDF::loadView('admin.cards.print_cards',compact('cards','design'));
        $pdf->setPaper(array(30,-30,450,240),'portrait');
        return $pdf->download($ids[0].'.pdf');
    }




    public function printCard($id, Request $request)
    {
//        $cards = Card::whereId($id)->with('agent','cards')->get();

        $design = $request->has('no_design') ? false : true;


        $cards = Card::whereId($id)->orWhere('policy_no',$id)->orWhere('card_id',$id)->where('status','!=',null)->get();


        return view('admin.cards.print_cards', compact('cards','design'));
    }

    public function create()
    {
        $agent = $this->cardAgent();
        $agents = User::whereRoleIs(['agent'])->get();
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
        $status = ['draft', 'pending' ,'expired','done','paid','print'];
        $card_types =  ['sama healthsaver card'];
        $p_type = PackageType::all();

        return view('admin.cards.create', compact('agents','agent','card_types','p_methods','con_methods','p_type','status'));
    }

    public function importCards(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,txt'
        ]);
        Excel::import(new CardImport(),request()->file('import_file'));
        return back()->with('success_message', 'Cards was successfully imported.');
    }

    public function onlineStore(Request $request)
    {

            $data = $this->getData($request);

        $request->validate(['cpr_no' => 'required|string|unique:cards,cpr_no']);


        $data['price'] = $this->setPrice($data['package_type']);

        $data['expiry_date'] = $this->setExpiryDate($data['issue_date'], $data['period']);

        $data['agent_id'] = $this->publicAgent();

        $data['online'] = true;

            $card = Card::create($data);

        if($card->is_parent > 0){
            return response()->json($card);
        }else{
            $members = Card::whereCardId($card->card_id)->whereIsParent(0)->get();
            return response()->json($members);
        }



    }

    public function store(Request $request)
    {

            $data = $this->getData($request);

            $request->validate(['cpr_no' => 'required|string|unique:cards,cpr_no']);

            if($request->get('price')){
                $data['price'] = $request->get('price');
            }else{
                $data['price'] = $this->setPrice($data['package_type']);
            }

            $data['expiry_date'] = $this->setExpiryDate($data['issue_date'], $data['period']);

            $card = Card::create($data);

            if($request->has('more')){
                return redirect()->route('cards.edit', $card->id)
                    ->with('success_message', 'Card was successfully added, add more people.');
            }
            if($card->is_parent > 0){
                return redirect()->route('cards.edit', $card->id)
                    ->with('success_message', 'Card was successfully added, add more people.');
            }else{
//                return redirect()->route('cards.index')
//                    ->with('success_message', 'Card was successfully added.');

                $members = Card::whereCardId($card->card_id)->whereIsParent(0)->get();
                return response()->json($members);
            }

    }

    public function show($id)
    {
        $card = Card::with('agent','card')->findOrFail($id);

        return view('cards.show', compact('card'));
    }

    public function policyShow($p)
    {
        $card = Card::with('agent','card')->where('policy_no',$p)->firstOrFail();

        return redirect()->route('cards.edit',$card->id);

    }

    public function edit($id)
    {
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
        $status = ['draft', 'pending' ,'expired','done','paid','print'];
        $p_types = PackageType::all();
        $card_types =  ['sama healthsaver card'];
        $members = Card::whereCardId($id)->whereIsParent(0)->get();
        $card = Card::findOrFail($id);
        return view('admin.cards.edit', compact('card','card_types','p_types','con_methods','status','p_methods','members'));
    }

    public function publicAgent(){
        $agent = User::whereUsername('sama')->first();
        if($agent){
            return $agent->id;
        }else{
            return 1;
        }
    }

    public function cardAgent(){
        if(auth()->user()->hasRole(['admin','superadmin'])){
            $agent = User::whereUsername('sama')->first();
            if($agent){
                return $agent->id;
            }else{
                return 1;
            }
        }else{
            return Auth::id();
        }
    }

    private function setExpiryDate($date, $month){
        $newDate = new Carbon($date);
        return $newDate->addMonths($month);
    }
    private function setPrice($package){
        $p_type = PackageType::whereId($package)->first();
        if($p_type){
            return $p_type->price;
        }else{
            return 10;
        }
    }

    public function sendEmail(Request $request){
        $data = [];
        $card = Card::whereId($request['id'])->first();
        if(!$card){
            $data['status'] = 0;
        }
        if($card){
            if($card->email && filter_var($card->email, FILTER_VALIDATE_EMAIL)){
                $data['status'] = 1;
                Notification::route('mail', $card->email)->notify(new sendCard($card));
            }else{
                $data['status'] = 2;
            }
        }
        return response()->json($data);
    }

    public function update($id, Request $request)
    {


        $data = $this->getData($request);
            $card = Card::findOrFail($id);

            if($data['issue_date'] != $card->issue_date || $data['period'] != $card->period){
                $data['expiry_date'] = $this->setExpiryDate($data['issue_date'], $data['period']);
            }

            if($data['package_type'] != $card->package_type){
                $data['price'] = $this->setPrice($data['package_type']);
            }

//            if($data['price'] != $card->price){
//                $data['price'] = $data['price'];
//            }

            $card->update($data);
            $res = Card::findOrFail($id);
//        if($request->has('is_package')){
//            return response()->json($res);
//        }else
        if($request->has('is_online')){
            $members = Card::whereCardId($id)->whereIsParent(0)->get();
            return response()->json($members);
        }
           if($request->has('is_member')){
               $members = Card::whereCardId($card->card_id)->whereIsParent(0)->get();
               return response()->json($members);
            }else{
               return response()->json($res);
            }

    }

    public function destroy($id)
    {
      $members = Card::whereCardId($id)->whereIsParent(0);

      $count = Card::whereCardId($id)->whereIsParent(0)->count();

        if($count > 0){
            $members->delete();
        }

        $card = Card::findOrFail($id);

            $card->delete();

            return redirect()->back()
                ->with('success_message', 'Card was successfully deleted.');

    }

    public function delete($id)
    {
       $members = Card::whereCardId($id)->whereIsParent(0)->get();

        if(count($members) > 0){
            $members->delete();
        }

        $card = Card::findOrFail($id);
            $card->delete();
            return response()->json($card);
    }

    public function policy(){
        return (int) 222200000;
    }

    public function payments($id){
        $cards = Card::whereId($id)->orWhere('card_id',$id)->get();
        return response()->json($cards);
    }

    public function members($id){
        $members = Card::whereCardId($id)->whereIsParent(0)->get();
        return response()->json($members);
    }


    private function getPolicy(){
//       $card = Card::latest()->first();
       $card = Card::orderBy('policy_no', 'desc')->first();
        if($card){
            $policy = $card->policy_no + 1;
        }else{
            $policy = $this->policy() + 1;
        }
//        $validator = Validator::make(['policy_no' => $policy],['policy_no'=>'unique:cards,policy_no']);
//        if($validator->fails()){
//            return $this->getPolicy();
//        }
        return $policy;
    }
    protected function getData(Request $request)
    {
        $rules = [
                'full_name' => 'string|min:1|required',
            'gender' => 'string|nullable',
            'policy_no' => 'nullable',
            'cpr_no' => 'nullable',
            'mobile' => 'nullable',
            'mobile2' => 'nullable',
            'phone' => 'nullable',
            'photo' => 'nullable',
            'address' => 'nullable',
            'card_type' => 'nullable',
            'payment_method' => 'nullable',
            'contact_method' => 'nullable',
            'package_type' => 'nullable',
            'comment' => 'nullable',
            'period' => 'nullable',
            'status' => 'nullable',
            'issue_date' => 'nullable',
            'first_issue_date' => 'nullable',
            'email' => 'nullable',
            'price' => 'nullable',
            'paid' => 'nullable',
            'online' => 'nullable',
            'card_id' => 'nullable',
            'agent_id' => 'nullable',
            'is_parent' => 'boolean|nullable',
        ];

        $data = $request->validate($rules);

        $data['policy_no'] = $this->getPolicy();
        $data['card_type'] = $request->get('card_type') ?: 'sama healthsaver card';

        $data['issue_date'] = $request->get('issue_date') ?: Carbon::now();
        $data['status'] = $request->get('status') ?: 'pending';
        $data['paid'] = $request->get('paid') ?: 0;
        $data['package_type'] = $request->get('package_type') ?: PackageType::first()->id;
        $data['first_issue_date'] = $data['issue_date'];

        if($data['status'] == 'paid'){
            $data['paid'] = 1;
        }

        return $data;
    }

}
