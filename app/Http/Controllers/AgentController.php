<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function agents(){
        $agents = User::whereRoleIs('agent')->get();
        return view('admin.agents',compact('agents'));
    }


    public function store(Request $request){
        $agent = Role::whereName('agent')->first();
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        $user->attachRole($agent);
        return redirect()->route('agents')
            ->with('success_message', 'Agent was successfully added.');
    }

    public function update($id, Request $request){
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$id],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,'.$id],
//            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user = User::findOrFail($id);
        $user->full_name = $request['full_name'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->phone = $request['phone'];
        if($request->get('password')){
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        return redirect()->route('agents')
            ->with('success_message', 'Agent was successfully updated.');
    }

    public function destroy($id)
    {

        $agent = User::findOrFail($id);

        $cards = Card::whereAgentId($id)->count();

        if($cards > 0){
            return redirect()->back()
                ->with('error_message', 'You cannot delete agent with multiple cards, pls delete cards before deleting agent');
        }

            $agent->delete();

        return redirect()->back()
            ->with('success_message', 'Agent was successfully deleted.');

    }

}
