<?php

namespace App\Http\Controllers;

use App\Imports\HospitalImport;
use App\Models\Card;
use App\Models\Contact;
use App\Models\Hospital;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HospitalController extends Controller
{

    public function index(Request $request)
    {
        $status = ['new','pending','done'];
        $hospital = Hospital::with('services');
//        $card = Card::whereIsParent(1)->with('agent','cards','package');
        if($request->get('cr')){
            $hospital->where('cpr_no',$request->get('cr'))
                ->orWhere('provider_name', 'like', '%'.$request->get('cr').'%')
                ->orWhere('contact', 'like', '%'.$request->get('cr').'%')
                ->orWhere('contact2', 'like', '%'.$request->get('cr').'%')
                ->orWhere('email', 'like', '%'.$request->get('cr').'%');
        }
        if($request->get('s')){
                $hospital->where('status',$request->get('s'));
        }
        if($request->has('online')){
            $hospital->where('online',1);
        }
        if($request->has('agent')){
            $agent = $this->cardAgent();
            $hospital->where('agent_id','!=',$agent);
        }
        if($request->has('today')){
            $hospital->whereDate('issue_date', Carbon::today())->wherePaid(1);
        }
        if($request->has('imported')){
            $hospital->where('imported', 1);
        }
        if($request->has('expired')){
            $hospital->where('expiry_date', '<=', Carbon::now());
        }
        if($request->has('renewal')){
            $hospital->where('expiry_date', '<=', Carbon::now()->subDays(20));
        }
        if($request->get('from') && $request->get('to')){
            $from = date($request->get('from'));
            $to = date($request->get('to'));
            $hospital->whereBetween('issue_date', [$from, $to]);
        }

        $hospitals = $hospital->orderBy('id','desc')->paginate(50);

        if($request->has('export')){
            return view('admin.hospital.export', compact('hospitals','status'));
        }
        return view('admin.hospital.list', compact('hospitals','status'));
    }


    public function create(){
        $categories = $this->h_cats();
        return view('admin.hospital.create', compact('categories'));
    }
    public function show($id){
        $hospital = Hospital::findOrFail($id);
        $services = Service::where('hospital_id', $id)->get();
        $contacts = Contact::where('hospital_id', $id)->get();
        return view('pages.view-hospital', compact('hospital', 'services','contacts'));
    }
    public function edit($id){
        $hospital = Hospital::findOrFail($id);
        $categories = $this->h_cats();
//        $services = Service::all();
        $services = Service::whereHospitalId($id)->get();
        $contacts = Contact::whereHospitalId($id)->get();
        return view('admin.hospital.edit', compact('hospital','services','contacts','categories'));
    }
    public function update(Request $request, $id){
        $hospital = Hospital::findOrFail($id);
        $data = $this->getData($request);
        $hospital->update($data);
        return back()->with('success','Data successfully update');
    }
    public function store(Request $request){

        $data = $this->getData($request);
//        $ru_data = $this->getRuData($request);

        $hospital = Hospital::create($data);

        return redirect()->route('hospital.edit', $hospital->id)->with('success', 'Hospital Successfully added, pls add services');

    }

    public function storeContact(Request $request){
        $data  = $this->getContactData($request);
        Contact::create($data);
        return redirect()->route('hospital.edit', $request['hospital_id'])->with('success', 'Hospital Contact Successfully added, pls add services');
    }

    public function importHospital(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,txt'
        ]);
        Excel::import(new HospitalImport,request()->file('import_file'));
        return back()->with('success_message', 'Hospital was successfully imported.');
    }


    public function updateContact(Request $request, $id){
        $con = Contact::findOrFail($id);
        $data  = $this->getContactData($request);
        $con->update($data);
        return redirect()->route('hospital.edit', $request['hospital_id'])->with('success', 'Hospital Contact Successfully added, pls add services');
    }

    protected function getContactData(Request $request)
    {
        $rules = [
            'hospital_id' => 'required',
            'name' => 'string|nullable',
            'email' => 'string|nullable',
            'mobile' => 'string|nullable',
            'position' => 'string|nullable',
        ];
        return $request->validate($rules);
            }

    protected function getData(Request $request)
    {
        $rules = [
            'provider_name' => 'string|nullable',
            'cpr_no' => 'string|nullable',
            'place' => 'string|nullable',
            'comment' => 'nullable',
            'contact' => 'string|nullable',
            'contact2' => 'string|nullable',
            'email' => 'string|nullable',
            'address' => 'string|nullable',
            'website' => 'string|nullable',
            'category' => 'string|nullable',
            'specialist' => 'string|nullable',
            'contract_file' => 'string|nullable',
            'contract_date' => 'string|nullable',
            'expiry_date' => 'string|nullable',
            'logo' => 'string|nullable',
            'image' => 'string|nullable',
            'description' => 'string|nullable',
            'ar_provider_name' => 'string|nullable',
            'ar_place' => 'string|nullable',
            'ar_address' => 'string|nullable',
            'ar_description' => 'string|nullable',
            'ar_comment' => 'string|nullable',
        ];
        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        return $data;
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();
        return redirect()->back()->with('success_message','Hospital successfully deleted');
    }


    public function destroyContact($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success_message','Contacted deleted');
    }

    protected function getRuData(Request $request)
    {
        $rules = [
            'ru_provider_name' => 'string|nullable',
            'ru_cpr_no' => 'string|nullable',
            'ru_contact' => 'string|nullable',
            'ru_contact2' => 'string|nullable',
            'ru_email' => 'string|nullable',
            'ru_address' => 'string|nullable',
            'ru_website' => 'string|nullable',
            'ru_category' => 'string|nullable',
            'ru_specialist' => 'string|nullable',
            'ru_contract_file' => 'string|nullable',
            'ru_contract_date' => 'string|nullable',
            'ru_expiry_date' => 'string|nullable',
            'ru_logo' => 'string|nullable',
            'ru_image' => 'string|nullable',
            'ru_description' => 'string|nullable',
        ];
        $data = $request->validate($rules);
        return $data;
    }
}
