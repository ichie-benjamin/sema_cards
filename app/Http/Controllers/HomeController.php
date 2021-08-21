<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\PackageType;
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
//        $this->middleware('auth');
    }


    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function check(){
        return view('check');
    }
    public function apply(){
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
//        $status = ['draft', 'pending' ,'expired','done','paid','print'];
        $card_types =  ['sama healthsaver card'];
        $p_type = PackageType::all();
        return view('apply', compact('card_types','p_methods','con_methods','p_type'));

    }
    public function dashboard()
    {
        $agent = User::whereUsername('sama')->first();
        $status = ['draft', 'pending' ,'expired','done','paid','print'];
        $agents = User::whereRoleIs('agent')->count();
        $cards = Card::query();
        $l_cards = $cards->with('agent','cards','package')->whereIsParent(1)->latest()->paginate(100);
        $agent_cards = Card::where('agent_id','!=',$agent->id)->count();
        $online = Card::whereOnline(1)->count();
        $paid = Card::wherePaid(1)->count();
        $pending = Card::where('status','pending')->count();
        $done = Card::where('status','done')->count();
        $draft = Card::where('status','draft')->count();
        $renewal = Card::where('status','renewal')->count();
        $today = Card::whereDate('issue_date', Carbon::today())->count();
        $expired_cards = Card::where('expiry_date', '<=', Carbon::now())->count();
        $data['expired'] = $expired_cards;
        $data['online'] = $online;
        $data['done'] = $done;
        $data['renewal'] = $renewal;
        $data['pending'] = $pending;
        $data['today'] = $today;
        $data['paid'] = $paid;
        $data['draft'] = $draft;
        $users = User::whereRoleIs('user')->get();
        return view('admin.dashboard',compact('users','data','l_cards','cards','agents','agent_cards','expired_cards','status'));
    }
}
