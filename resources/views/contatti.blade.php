@extends('layout.base')

    @section('title')    
        <title>
            ContattiYourDog
        </title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/log_cont_reg.css')}}">
        <link rel="stylesheet" href="{{url('css/contatto.css')}}">
    @endsection

    @section('content')
        <header>
            <nav>
                <div id="flex-container1"> 
                                                    
                    <span class="flex-item">
                        <a href="{{url('home')}}">
                            Home 
                        </a>
                    </span>
                    
                    <span class="flex-item">
                        <a href="{{url('profile')}}">
                            Profilo
                        </a>
                    </span>
                                                    
                    <span class="flex-item">
                        <a href="{{url('login')}}">
                            Login
                        </a>
                    </span>
                                                    
                </div>        
            </nav>

            <h1> Benvenuto da YourDogs</h1>
        </header>

        <main class='contatto'>
            <form>
                <p id='testo'>Benvenuti in YourDogs. YourDogs è un nuovo sito che permette agli amanti di cani di postare
                     i momenti più belli con i loro cuccioli e condividerli con altre persone. 
                     Esso, inoltre, offre la possibilità di scoprire nuove razze o di chiarire i tuoi dubbi o ricevere delucidazioni, attraverso la ricerca per razza, così da ottenere maggiori informazioni 
                     per quanto riguarda il temperamento o la taglia. Vieni a scoprire quale cane fa al caso tuo! </p>
                <p>In caso di problemi scrivere a:</p>
                <p id='email'>cnnfrc00l44h163n@studium.unict.it</p>
            </form>
        </main> 
    @endsection
