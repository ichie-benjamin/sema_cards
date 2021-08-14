<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return redirect()->route('dashboard');
    }
    public function dashboard()
    {
        $agent = User::whereUsername('sama')->first();
        $agents = User::whereRoleIs('agent')->count();
        $cards = Card::query();
        $agent_cards = Card::where('agent_id','!=',$agent->id)->count();
        $expired_cards = Card::where('expired_date', '<=', Carbon::now())->count();
        $users = User::whereRoleIs('user')->get();
        return view('admin.dashboard',compact('users','cards','agents','agent_cards','expired_cards'));
    }
}
