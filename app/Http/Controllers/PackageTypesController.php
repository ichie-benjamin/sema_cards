<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PackageType;
use Illuminate\Http\Request;
use Exception;

class PackageTypesController extends Controller
{

    public function index()
    {
        $types = PackageType::get();
        return view('admin.package_types', compact('types'));
    }

    public function create()
    {
        return view('package_types.create');
    }

    public function store(Request $request)
    {

            $data = $this->getData($request);

            PackageType::create($data);

            return redirect()->back()->with('success_message', 'Package Type was successfully added.');

    }

    public function show($id)
    {
        $packageType = PackageType::findOrFail($id);

        return view('package_types.show', compact('packageType'));
    }

    public function edit($id)
    {
        $packageType = PackageType::findOrFail($id);


        return view('package_types.edit', compact('packageType'));
    }

    public function update($id, Request $request)
    {

            $data = $this->getData($request);

            $packageType = PackageType::findOrFail($id);
            $packageType->update($data);

            return redirect()->back()
                ->with('success_message', 'Package Type was successfully updated.');

    }


    public function destroy($id)
    {
            $packageType = PackageType::findOrFail($id);
            $packageType->delete();

            return redirect()->back()->with('success_message', 'Package Type was successfully deleted.');
    }

    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
            'price' => 'required',
            'show_online' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
