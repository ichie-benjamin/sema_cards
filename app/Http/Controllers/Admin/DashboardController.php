<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $agents = User::whereRoleIs('agent')->count();
        $cards = Card::query();
        $users = User::whereRoleIs('user')->get();
        return view('admin.dashboard',compact('users','cards','agents'));
    }
    public function crudGUI(){
        return view('admin.crud');
    }
}
