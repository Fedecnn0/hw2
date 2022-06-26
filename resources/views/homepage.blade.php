@extends('layout.base')

    @section('text')
        <script>
            const BASE_URL = "{{url('/')}}/";
        </script>
        <script>
            const csrf_token = "{{ csrf_token()}}";
        </script>
    @endsection

    @section('title')
        <title>
            ProfileYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/post_login.css')}}">
        <link rel="stylesheet" href="{{url('css/profile.css')}}">
    @endsection

    @section('js')
        <script src="{{url('js/homepage.js')}}" defer="true"></script>
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
                        <a href="{{url('home')}}">
                            Home 
                        </a>
                </span>

                <span class="flex-item lato">
                    <a href="{{url('contatti')}}">
                        Chi Siamo
                    </a>
                </span>

            </div>

            <article>
                <a href="{{url('condividi')}}" class="block"></a>
                <section id = 'posts'> </section>
                <section id='box-posts'> </section>
            </article>
        </section>

    @endsection