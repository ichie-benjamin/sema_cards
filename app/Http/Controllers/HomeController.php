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

    public function check(Request $request){
        if($request->get('lang') == 'ar'){
            $lang = 'ar';
            $lan = $this->arLang();
        }else{
            $lang = 'en';
            $lan = $this->enLang();
        }
        return view('check',compact('lang','lan'));
    }
    public function apply(Request $request){
        if($request->get('lang') == 'ar'){
            $lang = 'ar';
        }else{
            $lang = 'en';
        }
        $p_methods = ['card','benefit','cash'];
        $con_methods = ['call','whatsapp','online'];
//        $status = ['draft', 'pending' ,'expired','done','paid','print'];
        $card_types =  ['sama healthsaver card'];
        return view('apply', compact('card_types','p_methods','con_methods','lang'));

    }
    public function dashboard()
    {
        $agent = User::whereUsername('sama')->first();
        $status = ['draft', 'pending' ,'done','paid','cancelled'];
        $agents = User::whereRoleIs('agent')->count();
        $cards = Card::query();
        $l_cards = $cards->with('agent','cards','package')->whereIsParent(1)->latest()->paginate(100);
        $agent_cards = Card::where('agent_id','!=',$agent->id)->count();
        $agent_cards_price = Card::where('agent_id','!=',$agent->id)->sum('price');
        $online = Card::whereOnline(1)->count();
        $paid = Card::wherePaid(1)->count();
        $paid_price = Card::wherePaid(1)->sum('price');
        $imported_cards = Card::whereImported(1)->count();
        $pending = Card::where('status','pending')->count();
        $pending_price = Card::where('status','pending')->sum('price');
        $done = Card::where('status','done')->count();
        $done_price = Card::where('status','done')->sum('price');
        $draft = Card::where('status','draft')->count();
        $draft_price = Card::where('status','draft')->sum('price');
//        $renewal = Card::where('status','renewal')->count();
        $today = Card::whereDate('issue_date', Carbon::today())->count();
        $today_price = Card::whereDate('issue_date', Carbon::today())->sum('price');
        $expired_cards = Card::where('expiry_date', '<=', Carbon::now())->count();
        $expired_cards_price = Card::where('expiry_date', '<=', Carbon::now())->sum('price');
        $renewal = Card::where('expiry_date', '<=', Carbon::now()->subDays(20))->count();
        $renewal_price = Card::where('expiry_date', '<=', Carbon::now()->subDays(20))->sum('price');
        $data['expired'] = $expired_cards;
        $data['online'] = $online;
        $data['done'] = $done;
        $data['renewal'] = $renewal;
        $data['pending'] = $pending;
        $data['today'] = $today;
        $data['paid'] = $paid;
        $data['draft'] = $draft;
        $users = User::whereRoleIs('user')->get();
        return view('admin.dashboard',compact('paid_price','today_price','renewal_price','expired_cards_price','draft_price','users','done_price','pending_price','agent_cards_price','data','l_cards','imported_cards','cards','agents','agent_cards','expired_cards','status'));
    }


    public function enLang(){
        $lang['bene_1'] = 'Immediate Usage';
        $lang['bene_2'] = 'Unlimited Usage';
        $lang['bene_3'] = 'Covered chronic Pre-existing Conditions';
        $lang['bene_4'] = 'Covered Bahraini';
        $lang['bene_4'] = 'Network Growing ';
        $lang['request_card'] = 'Request A Card';
        $lang['search_card'] = 'Search Card';
        $lang['hospital'] = 'Hospital Card';
        $lang['benefits'] = 'Benefit Of Sama Card';
        $lang['heading'] = 'Sama HealthSaver Card';
        $lang['enter_cpr'] = 'Enter your Cpr No to view and download your card';
        $lang['enter_cpr_policy'] = 'ENTER CPR NO OR POLICY NO';
        $lang['search_download'] = 'Search and download your card';
        $lang['sub_heading'] = 'A membership that entitle you to get an immediate discount in
        all medical services within a wide range of private hospital/clinic who’s contracted with Sama Bahrain Card';
        return $lang;
    }
    public function arLang(){
        $lang['enter_cpr'] = 'أدخل رقمك الشخصي او رقم البوليصة';
        $lang['enter_cpr_policy'] = 'أدخل رقمك الشخصي او رقم البوليصة';
        $lang['search_download'] = 'احصل على بطاقتك الإلكترونية';
        $lang['request_card'] = 'اطلب البطاقة';
        $lang['search_card'] = ' ابحث عن بطاقتك';
        $lang['bene_1'] = 'استخدام فوري';
        $lang['bene_2'] = 'عدد غير محدود من الاستخدام';
        $lang['bene_3'] = 'تغطي الأمراض المسبقة والمزمنة';
        $lang['bene_4'] = 'لجميع فئات المجتمع البحريني ، والمقيم والزائ';
        $lang['bene_5'] = 'شبكة متنامية';
        $lang['hospital'] = 'قائمة المستشفيات';
        $lang['benefits'] = 'مزايا بطاقة سما للرعاية الصحية';
        $lang['heading'] = 'بطاقة سما للرعاية الصحية';
        $lang['sub_heading'] = 'المستشفيات والعيادات الخاصة المتعاقدة مع سما بحرين كارد عضوية سنوية تمنحك خصومات فورية على معظم الخدمات الطبية والتجميلية من ضمن مجموعة واسعة من';
        return $lang;
    }
}
