<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {

        $data = $this->getData($request);

        Service::create($data);

        return redirect()->back()->with('success', 'Service Successfully added, add more services');

    }


    public function update(Request $request, $id){
        $service = Service::findOrFail($id);
        $data = $this->getData($request);
        $service->update($data);
        return back()->with('success','Data successfully updated');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'hospital_id' => 'required',
            'ar_name' => 'string|required',
            'name' => 'string|required',
            'price' => 'required',
            'discount' => 'nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }

    public function destroy($id)
    {
        $ser = Service::findOrFail($id);
        $ser->delete();
        return redirect()->back()->with('success_message','Service deleted');
    }


}
