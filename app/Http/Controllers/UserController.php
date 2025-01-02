<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DataEntry;


class UserController extends Controller
{
    public function create()
    {
        // $branchOffices = DataEntry::where('type', 'branch_office')->pluck('value');
        // return view('register-new-user.register-new-user', compact('branchOffices'));
    }
    

    public function check_email(){
        return view('auth.check-email');
    }
    public function reset_password(){
        return view('auth.reset-password');
    }

    public function reset_password_comp(){
        return view('auth.reset-password-complete');
    }

    public function store(StoreUserRequest $request) 
    {

        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'bpjs_ownership' => $request->bpjs_ownership,
        ]);
        // dd($request->all());
        $user->save();
    }
}