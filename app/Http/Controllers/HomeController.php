<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Like;

class HomeController extends BaseController
{
    public function contatti(){
        return view('contatti');
    }

    public function home(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        $username=User::find(Session::get('user_id'))->username;
        return view('home')->with('username', $username);
    }
}
