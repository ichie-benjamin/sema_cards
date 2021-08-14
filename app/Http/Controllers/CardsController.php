<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PackageType;
use App\Models\User;
use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use PDF;


class CardsController extends Controller
{

    public function index(Request $request)
    {
        $status = ['draft', 'renewal' ,'expired','done','paid','print'];
        $card = Card::whereIsParent(1)->with('agent','cards','package');
        if($request->get('cpr')){
            $card->where('cpr_no',$request->get('cpr'));
        }
         if($request->get('s')){
            $card->where('status',$request->get('s'));
        }
         if($request->get('from') && $request->get('to')){
             $from = date($request->get('from'));
             $to = date($request->get('to'));
            $card->whereBetween('issue_date', [$from, $to]);
        }

        $cards = $card->paginate(50);
        return view('admin.cards.list', compact('cards','status'));
    }

    public function cards($id, Request $request)
    {
        $p_card =  Card::wherePolicyNo($id)->first();
        if(!$p_card){
            return redirect()->back('error_message', 'Something went wrong');
        }
        $cards = Card::whereId($p_card->id)->orWhere('card_id',$p_card->id)->where('status','!=','draft')->get();

        if($request->has('download'))
        {
            $pdf = PDF::loadView('admin.cards.print_cards',compact('cards'));
            return $pdf->download($id.'.pdf');
        }

        return view('admin.cards.cards', compact('cards'));
    }
    public function printCards(Request $request){
        if(!$request->get('id')){
            return redirect()->back()->with('error_message', 'Pls select cards to print');
        }
        $ids = array();
        foreach($request['id'] as $value){
            $ids[] = (int)$value;
        }
        $cards = Card::whereIn('id', $ids)->get();
        $pdf = PDF::loadView('admin.cards.print_cards',compact('cards'));
        return $pdf->download($ids[0].'.pdf');
    }
    public function printCard($id)
    {
//        $cards = Card::whereId($id)->with('agent','cards')->get();

        $cards = Card::whereId($id)->orWhere('policy_no',$id)->orWhere('card_id',$id)->where('status','!=',null)->get();


        return view('admin.cards.print_cards', compact('cards'));
    }

    public function create()
    {
        $agent = $this->cardAgent();
        $agents = User::whereRoleIs(['agent'])->get();
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
        $status = ['draft', 'renewal' ,'expired','done','paid','print'];
        $card_types =  ['sama healthsaver card'];
        $p_type = PackageType::all();

        return view('admin.cards.create', compact('agents','agent','card_types','p_methods','con_methods','p_type','status'));
    }

    public function store(Request $request)
    {

            $data = $this->getData($request);

            $data['expiry_date'] = $this->setExpiryDate($data['issue_date'], $data['period']);

            $card = Card::create($data);

            if($request->has('more')){
                return redirect()->route('cards.edit', $card->id)
                    ->with('success_message', 'Card was successfully added, add more people.');
            }
            if($request->has('api')){
                $members = Card::whereCardId($card->card_id)->whereIsParent(0)->get();
                return response()->json($members);
            }else{
//                return redirect()->route('cards.index')
//                    ->with('success_message', 'Card was successfully added.');
                return redirect()->route('cards.edit', $card->id)
                    ->with('success_message', 'Card was successfully added, add more people.');
            }

    }

    public function show($id)
    {
        $card = Card::with('agent','card')->findOrFail($id);

        return view('cards.show', compact('card'));
    }

    public function edit($id)
    {
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
        $status = ['draft', 'renewal' ,'expired','done','paid','print'];
        $p_types = PackageType::all();
        $card_types =  ['sama healthsaver card'];
        $members = Card::whereCardId($id)->whereIsParent(0)->get();
        $card = Card::findOrFail($id);
        return view('admin.cards.edit', compact('card','card_types','p_types','con_methods','status','p_methods','members'));
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

    public function update($id, Request $request)
    {
            $data = $this->getData($request);
            $card = Card::findOrFail($id);

            if($data['issue_date'] != $card->issue_date || $data['period'] != $card->period){
                $data['expiry_date'] = $this->setExpiryDate($data['issue_date'], $data['period']);
            }
            $card->update($data);
            $res = Card::findOrFail($id);
            return response()->json($res);

    }

    public function destroy($id)
    {
        try {
            $card = Card::findOrFail($id);
            $card->delete();

            return redirect()->route('cards.card.index')
                ->with('success_message', 'Card was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function policy(){
        return (int) 333100001;
    }

    private function getPolicy(){
        $card = Card::latest()->first();
        if($card){
            return $policy = $this->policy() + $card->id + 1;
        }else{
            return $policy = $this->policy() + 1;
        }
    }
    protected function getData(Request $request)
    {
        $rules = [
                'full_name' => 'string|min:1|required',
            'gender' => 'string|min:1|nullable',
            'cpr_no' => 'nullable',
            'mobile' => 'required',
            'mobile2' => 'nullable',
            'phone' => 'nullable',
            'address' => 'required',
            'card_type' => 'nullable',
            'payment_method' => 'string|min:1|required',
            'contact_method' => 'string|min:1|required',
            'package_type' => 'numeric|required',
            'comment' => 'nullable',
            'period' => 'required',
            'status' => 'string|min:1|required',
            'issue_date' => 'nullable',
            'first_issue_date' => 'nullable',
            'email' => 'nullable',
            'paid' => 'nullable',
            'card_id' => 'nullable',
            'agent_id' => 'nullable',
            'is_parent' => 'boolean|nullable',
            'policy_no' => 'nullable',
        ];

        $data = $request->validate($rules);

        $data['policy_no'] = $this->getPolicy();
        $data['card_type'] = $request->get('card_type') ?: 'sama healthsaver card';

        $data['issue_date'] = $request->get('issue_date') ?: Carbon::now();
        $data['first_issue_date'] = $data['issue_date'];

        if($data['status'] == 'paid'){
            $data['paid'] = 1;
        }

        return $data;
    }

}
