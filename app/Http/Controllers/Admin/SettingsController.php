<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
    public function home(){
        return view('admin.settings.home');
    }
    public function mails(){
        return view('admin.settings.mails');
    }
    public function networks(){
        return view('admin.settings.network');
    }

    public function store(Request $request){
        setting($request->except('_token'))->save();
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
