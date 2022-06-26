<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Like;
use App\Models\Post;
use App\Models\Heart;
use Illuminate\Support\Facades\Http;

class ProfileController extends BaseController
{
    public function profile(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        $username=User::find(Session::get('user_id'))->username;
        return view('profile')->with('username', $username);
    }

    public function cuore(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        //$username=User::find(Session::get('user_id'))->username;
        $username=User::find(Session::get('user_id'));
        return $username->likes;
    }

    public function posts(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        //$username=User::find(Session::get('user_id'))->username;
        $username=User::find(Session::get('user_id'));
        return $username->posts;
    }

    public function controllo($breed) {
        if( !Session::get('user_id'))
        {
            return redirect('login');
        } 
        $session_id = session('user_id');
        $sel = Like::where('user_id', $session_id)->where('razza', $breed)->first();
        if ($sel != NULL) {
            $boolean = true;
        }else {
            $boolean = false;
        }
        return response()->json($boolean);
    }

    public function rem($cod) {
        if( !Session::get('user_id'))
        {
            return redirect('login');
        } 
        $user_id_post = Post::where('id', $cod)->first()->user_id;
        $session_id = session('user_id');
        if($session_id === $user_id_post){
            Post::where('user_id', $session_id)->where('id', $cod)->delete();
        }
    }

    
}
