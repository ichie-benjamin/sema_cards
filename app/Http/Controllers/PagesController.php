<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function home(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        $sliders = Slider::all();
        return view('pages.index',compact('lang','sliders'));
    }

    public function partnerPage(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        return view('pages.partner',compact('lang'));
    }

    public function hListing(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        $cat = $request->get('category') ?? '';
        $hospitals = Hospital::paginate('50');
        return view('pages.hospital-listing',compact('lang','hospitals','cat'));
    }

    public function hShow(Request $request, $id){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        $hospital = Hospital::with('services','contacts')->findOrFail($id);
        $services = $hospital->services;
        $contacts = $hospital->contacts;
        return view('pages.view-hospital',compact('lang', 'hospital','services','contacts'));
    }


    public function contact(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        return view('pages.contact',compact('lang'));
    }
    public function about(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        return view('pages.about',compact('lang'));
    }
}
