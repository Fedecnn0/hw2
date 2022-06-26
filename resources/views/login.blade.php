@extends('layout.base')

    @section('title')
        <title>
            LoginYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/log_cont_reg.css')}}">
        <link rel="stylesheet" href="{{url('css/log_reg.css')}}">
        <link rel="stylesheet" href="{{url('css/login.css')}}">
    @endsection

    @section('content')
        <header>
            <nav>
                <div id="flex-container1"> 

                    <span class="flex-item">
                        <a href="{{url('contatti')}}">
                            Chi Siamo
                        </a>
                    </span>

                    <span class="flex-item">
                        <a href="{{url('register')}}">
                            Registrati
                        </a>
                    </span>
                                                                                
                </div>        
            </nav>

            <h1> Benvenuto da YourDogs</h1>
            
        </header>

        <main class="login">

            <form name='login' method='POST'>
            @csrf
                <p class="login">Accedi:</p>

                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' value = "{{old('username')}}" class="ins"></div>
                </div>

                @if($error == 'empty_username')
                <section class='error'>Inserisci username</section>
                @endif

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' value = "{{old('password')}}" class="ins"></div>
                </div>

                @if($error == 'empty_password')
                <section class='error'>Inserisci password</section>
                @endif

                <label>&nbsp;<input type='submit' value='Accedi'></label>

                @if($error == 'empty_fields')
                <section class='error'>Compilare i campi.</section>
                @elseif($error == 'errore')
                <section class='error'>Credenziali non valide.</section>
                @endif

                <p id='link'>Non hai un account? <a href="{{url('register')}}">Registrati</a></p>
            </form>
        </main> 
    @endsection
