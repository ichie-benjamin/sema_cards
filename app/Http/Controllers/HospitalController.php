<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Service;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function create(){
        return view('admin.hospital.create');
    }
    public function edit($id){
        $hospital = Hospital::findOrFail($id);
        $services = Service::all();
//        $services = Service::whereHospitalId($id)->get();
        return view('admin.hospital.edit', compact('hospital','services'));
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

//        $hospital->setLocale('ru');
//        $hospital->address = $ru_data['ru_address'];
//        $hospital->provider_name = $ru_data['ru_provider_name'];
//        $hospital->cpr_no = $ru_data['ru_cpr_no'];
//        $hospital->contact = $ru_data['ru_contact'];
//        $hospital->contact2 = $ru_data['ru_contact2'];
//        $hospital->email = $ru_data['ru_email'];
//        $hospital->address = $ru_data['ru_address'];
//        $hospital->website = $ru_data['ru_website'];
//        $hospital->category = $ru_data['ru_category'];
//        $hospital->contract_file = $ru_data['ru_contract_file'];
//        $hospital->image = $ru_data['ru_image'];
//        $hospital->description = $ru_data['ru_description'];
//        $hospital->specialist = $ru_data['ru_specialist'];
//        $hospital->save();

        return redirect()->route('hospital.edit', $hospital->id)->with('success', 'Hospital Successfully added, pls add services');

    }

    protected function getData(Request $request)
    {
        $rules = [
            'provider_name' => 'string|nullable',
            'cpr_no' => 'string|nullable',
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
        ];
        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        return $data;
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
