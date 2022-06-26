@extends('layout.base')

    @section('title')
        <title>
            RegisterYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ url('css/registrazione.css' ) }}">
        <link rel="stylesheet" href="{{url('css/log_cont_reg.css')}}">
        <link rel="stylesheet" href="{{url('css/log_reg.css')}}">
    @endsection

    @section('js')
        <script src="{{url('js/registrazione.js')}}" defer></script>
    @endsection

    @section('text')
        <script>
            const REGISTER_URL = "{{route('register')}}";
        </script>
    @endsection

    @section('content')
    <header>
        <nav>
            <div id="flex-container1"> 
                                                
                <span class="flex-item">
                    <a href="{{ url('contatti')}}">
                        Chi Siamo
                    </a>
                </span>

                <span class="flex-item">
                    <a href="{{ url('login')}}">
                        Login
                    </a>
                </span>
                                                
            </div>        
        </nav>

        <h1> Benvenuto da YourDogs </h1>
    </header>

    <main>
        <form name ='registrazione' method='post' action="{{ route('register') }}">

            @csrf

            <p class="registrazione">Registrati:</p>

            <div class="nome">
                <label>Nome: <input type='text' name='nome' value= '{{old("nome")}}' class="ins"></label>    
            </div> 

            <div class="cognome">
                <label>Cognome: <input type='text' name='cognome' value= '{{old("cognome")}}' class="ins"></label>      
            </div>  
            
            <div class="email">    
                <label for= "email">E-mail: <input type='text' name='email' value= '{{old("email")}}' class="ins"></label> 
                <span>Email già in uso</span>    
            </div>

            <div class ="username" for= "username">
                <label>UserName: <input type='text' name='username' value= '{{old("username")}}' class="ins"></label> 
                <span>Username già in uso</span>    
            </div>

            <div class="indirizzo">
                <label>Indirizzo: <input type='text' name='indirizzo' value= '{{old("indirizzo")}}' class="ins"></label>
            </div>

            <div class="password">
                <label>Password: <input type='password' name='password' value= '{{old("password")}}' class="ins"></label>
            </div>

            <div class="verifica">
                <label>Verifica Password: <input type='password' name='verifica' value= '{{old("verifica")}}' class="ins"></label>  
            </div>
           

            <label>&nbsp;<input type='submit' value='Registrati'></label>

            @if($errors)
                <div class = 'errore'>
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
                </div>
            @endif

            <p id="link">Hai un account? <a href="{{ url('login')}}">Accedi</a></p>
        </form>
        
    </main> 
    @endsection