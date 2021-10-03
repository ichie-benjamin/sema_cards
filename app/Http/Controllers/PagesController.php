<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
