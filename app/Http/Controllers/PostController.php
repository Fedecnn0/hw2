<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends BaseController
{   
    public function condividi(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        
        $username=User::find(Session::get('user_id'))->username;
        return view('condividi')->with('username', $username);
    }

   
    public function createFoto(){

        $request = request();

        $propic = $request->file('carica');
        $name = $request['path'];
        $destinationPath = 'images/'; 
        $propic->move($destinationPath, $name);
        $ris= 'images/'.$name;  
        Session::put('ris', $ris);
    }

    public function createPost()
    {
        $request = request();
        $ris = session('ris');
        $user = session('user_id');
        $username=User::find(Session::get('user_id'))->username;

        $newPost = Post::insert([
            'user_id' => $user,
            'username' => $username,
            'carica' => $ris,
            'scritta' => $request['post'],
        ]);

        return redirect('profile');
    }

}
