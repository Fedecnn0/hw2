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
            RazzeYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/post_login.css')}}">
        <link rel="stylesheet" href="{{url('css/razze.css')}}">
    @endsection
    
    @section('js')
        <script src="{{url('js/razze.js')}}" defer="true"></script>
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

            <div id="menu">
                <div id="line"></div>
                <div id="line"></div>
                <div id="line"></div>
            </div>

            <h1> Benvenuto  {{$username}} da YourDogs</h1>
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
            <div id = 'altro'>
                <div id="banner-message">
                    <p>Cerca la tua razza </p>

                    <select class="breed_select" id="selector">
                        <option>seleziona razza</option>
                    </select>
                </div>
                
                <div id="breed_data" class="razz invisibile">
                    <img id="breed_image" src="" />
                    <p id="info"> 
                        Dati sulla razza:
                    </p>
                    <div id="table">
                        <table id="breed_data_table">
                            <tr> 
                                <td>Nome: </td>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <td>Peso: </td>
                                <td id="weight"></td>
                            </tr>
                            <tr>
                                <td>Altezza: </td>
                                <td id="height"></td>
                            </tr>
                            
                            <tr>
                                <td>Allevato per: </td>
                                <td id="bred_for"></td>
                            </tr>
                            <tr>
                                <td>Gruppo di razza: </td>
                                <td id="breed_group"></td>
                            </tr>
                            <tr>
                                <td>Tempo di vita: </td>
                                <td id="life_span"></td>
                            </tr>
                            <tr>
                                <td>Temperamento: </td>
                                <td id="temperament"></td>
                            </tr>
                            <tr>
                                <td>Origine: </td>
                                <td id="origin"></td>
                            </tr>

                        </table>
                    </div>
                    <div id="preferiti">
                        <div id="bordo">
                            <img class="cuore" src="../img/like.svg"/>
                            <p>Preferiti</p>
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    @endsection