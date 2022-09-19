<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        if($request->has('search')){
            $users = User::where('username','like', '%' . $request->search . '%')->orWhere('email','like', '%' . $request->search . '%')->get();
        }else{
            $users = User::all();
        }
        return view('users.index',compact('users'));
    }

    public function change_password(Request $request,User $user)
    {
        $request->validate([
           'password' => 'required',
           'confirm_password' => 'required|same:password'
        ]);

        $user->update([
           'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','Password Updated Successfully!');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message','User Registered Successfully!');
    }

   
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        User::where('id',$id)->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('message','User Updated Successfully!');
    }

    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            return redirect()->route('users.index')->with('error','You are deleting yourself!');
        }
        User::where('id',$id)->delete();
        return redirect()->route('users.index')->with('message','User Deleted Successfully!');
    }
}
