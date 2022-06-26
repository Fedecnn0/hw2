<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function login_form(){
        if(Session::get('user_id')){
            return redirect('home');
        }
        $error = Session::get('error');
        //elimina una variabile dalla sessione il forget
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login(){
        if(Session::get('user_id')){
            return redirect('home');
        }
        //validare i dati 
        if(strlen(request('username')) == 0 && strlen(request('password')) == 0)
        {
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }
        else if(strlen(request('username')) == 0 && strlen(request('password')) != 0)
        {
            Session::put('error', 'empty_username');
            return redirect('login')->withInput();
    
        }else if(strlen(request('username')) != 0 && strlen(request('password')) == 0)
        {
            Session::put('error', 'empty_password');
            return redirect('login')->withInput();    
        }
        else{

            $user = User::where('username', request('username'))->first();
            if(!$user || !password_verify(request('password'), $user->password)){
                Session::put('error', 'errore');
                return redirect('login')->withInput();
            }
        }

        Session::put('user_id', $user->id);
        return redirect('home');
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}
