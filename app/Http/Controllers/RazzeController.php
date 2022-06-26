<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Http;

class RazzeController extends BaseController
{
    public function razze(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        
        $username=User::find(Session::get('user_id'))->username;
        return view('razze')->with('username', $username);
    }

    public function api(){
        if( !Session::get('user_id'))
        {
            return redirect('login');
        }
        $username=Session::get('username');
        $apikey = env('API_KEY');
        $url = "https://api.thedogapi.com/v1/breeds?api_key='.$apikey.'&limit=30'";     
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        $json = json_decode($data, true);
        curl_close($curl);
        echo $data;
    }

    public function remove($breed) {
        if( !Session::get('user_id'))
        {
            return redirect('login');
        } 
        $session_id = session('user_id');
        Like::where('user_id', $session_id)->where('razza', $breed)->delete();
    }

    public function add(){
        $user = session('user_id');
        $username=User::find($user);
        $request = request();

        $post = Like::insert([
            'user_id' => $user,
            'username' => $username->username,
            'razza' => $request['breed'],
            'carica' => $request['img'],
            'name' => $request['un'],
        ]);
        
    }

}
