<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Post;
use App\Models\Heart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomePageController extends BaseController
{  

    public function homepage(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        $username=User::find(Session::get('user_id'))->username;
        return view('homepage')->with('username', $username);
    }
    
    public function getPost(){
        $posts = Post::all();

        $username=User::find(Session::get('user_id'))->username;

        return $posts;
    }

    public function more(){
        $user = session('user_id');
        $username=User::find(Session::get('user_id'))->username;
        $request = request();

        $post = Heart::insert([
            'user_id' => $user,
            'username' => $username,
            'post_id' => $request['post_id'],
        ]);    
    }

    public function giamipiace($post_id) {
        if( !Session::get('user_id'))
        {
            return redirect('login');
        } 
        $session_id = session('user_id');
        $sel = Heart::where('user_id', $session_id)->where('post_id', $post_id)->first();
        if ($sel != NULL) {
            $boolean = true;
        }else {
            $boolean = false;
        }
        return response()->json($boolean);
    }

    public function remlike($cod) {
        if( !Session::get('user_id'))
        {
            return redirect('login');
        } 
        $session_id = session('user_id');
        Heart::where('user_id', $session_id)->where('id', $cod)->delete();
    }

}