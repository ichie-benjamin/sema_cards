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

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->back()->with('success_message', 'Slider was successfully deleted.');

    }


    public function store(Request $request)
    {

        $data = $this->getData($request);

        Slider::create($data);

        return redirect()->back()->with('success_message', 'Slider was successfully added.');

    }

    public function update(Request $request, $id)
    {

        $data = $this->getData($request);

        $slider = Slider::findOrFail($id);

        $slider->update($data);

        return redirect()->back()->with('success_message', 'Slider was successfully updated.');

    }

    protected function getData(Request $request)
    {
        $rules = [
            'head_en' => 'string|min:1|max:255|nullable',
            'head_ar' => 'string|min:1|max:255|nullable',
            'status' => 'boolean',
            'sub_head_en' => 'string|min:1|max:255|nullable',
            'sub_head_ar' => 'string|min:1|max:255|nullable',
            'img' => 'nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }

}
