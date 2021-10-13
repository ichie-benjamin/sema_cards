<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function home(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        return view('pages.index',compact('lang'));
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
        $hospitals = Hospital::all();
        return view('pages.hospital-listing',compact('lang','hospitals'));
    }

    public function hShow(Request $request){
        $lang = 'en';
        if($request->get('lang')){
            $lang = $request->get('lang');
        }
        return view('pages.view-hospital',compact('lang'));
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
