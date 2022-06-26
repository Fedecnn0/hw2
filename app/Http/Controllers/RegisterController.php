<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    public function index() {
        return view('register');
    } 

    public function register_form(){
        if(Session::get('user_id')){
            return redirect('home');
        }
        //riceve il form
        $request = request();
        //lo invia alla funzione do_register che farà i controlli 
        //e mi ridarrà un array con gli eventuali errori
        $error = $this->do_register($request);
        //conto se questo array è vuoto, in caso registro
        if(count($error) == 0){
            $user = new User;
            $user->nome = request('nome');
            $user->cognome = request('cognome');
            $user->email = request('email');
            $user->username = request('username');
            $user->indirizzo = request('indirizzo');
            $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
     
            $user->save();
      
            Session::put('user_id', $user->id);
            return redirect('home');
        }//caso contrario ritorno alla view register con i dati inseriti e gli errori;
        else{
            return redirect('register')->withErrors($error)->withInput();
        }
    }

    public function do_register($data){
        $error = array();
        if(Session::get('user_id')){
            return redirect('home');
        }
        //validare i dati 
        if(strlen($data['nome']) == 0 || strlen($data['cognome']) == 0 || strlen($data['email']) == 0 || strlen($data['username']) == 0
         && strlen($data['indirizzo']) == 0 || strlen(request('password')) == 0 || strlen(request('verifica')) == 0)
        {
            $error[] = 'Riempire tutti i campi';            
        }else{
            
            if(!filter_var( request('email'), FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Email non valida';
            }

            if(User::where('username', request('username'))->first()){
                $error[] = 'Username non disponibile';
            }else if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username'))){
                $error[] = 'Username non valido';
            }

            if(request('password') != request('verifica') ){
                $error[] = 'Le password non coincidono';
            }     
        }
        return $error;
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }
}
