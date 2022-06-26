@extends('layout.base')

    @section('title')
        <title>
            HomeYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/post_login.css')}}">
        <link rel="stylesheet" href="{{url('css/home.css')}}">
    @endsection

    @section('content')
        <header>
            <nav>
                <div id="flex-container1">

                    <span class="flex-item">
                        <a href="{{url('logout')}}">
                            Logout
                        </a>
                    </span>
                                                    
                </div>        
            </nav>

            <h1> Benvenuto {{$username}} da YourDogs</h1>
        </header>

        <section>
            <div id='barra'>
    
                <span class="flex-item lato">
                    <a href="{{url('profile')}}">
                        Profilo
                    </a>
                </span>

                <span class="flex-item lato">
                    <a href="{{url('contatti')}}">
                        Chi Siamo
                    </a>
                </span>
           
            </div>
            
            <main>

                <a href="{{url('homepage')}}" class="block" id="condividi">
                    <div class="post">
                        <span class="testo">Scopri cosa hanno condiviso</span>
                    </div>
                </a>
                
                <a href="{{url('razze')}}" class="block" id="acquista">
                    <div class="scelta">
                        <span class="testo">Scopri di più sulla razza che ti piace</span>
                    </div>
                </a>
            
            </main>
        </section>
    @endsection
