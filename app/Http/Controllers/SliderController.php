<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('package_types.create');
    }

    public function store(Request $request)
    {

        $data = $this->getData($request);

        Slider::create($data);

        return redirect()->back()->with('success_message', 'Package Type was successfully added.');

    }

    protected function getData(Request $request)
    {
        $rules = [
            'head_en' => 'string|min:1|max:255|nullable',
            'head_ar' => 'string|min:1|max:255|nullable',
            'sub_head_en' => 'string|min:1|max:255|nullable',
            'sub_head_ar' => 'string|min:1|max:255|nullable',
            'price' => 'required',
            'show_online' => 'nullable',
            'ar' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
