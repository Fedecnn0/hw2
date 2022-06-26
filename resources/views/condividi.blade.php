@extends('layout.base')

    @section('title')
        <title>
            CondividiinYourDog
        </title>
    @endsection

    @section('text')
        <script>
            const BASE_URL = "{{url('/')}}/";
        </script>
        <script>
            const csrf_token = "{{ csrf_token()}}";
        </script>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{url('css/post_login.css')}}">
        <link rel="stylesheet" href="{{url('css/condividi.css')}}">
    @endsection

    @section('js')
        <script src="{{url('js/condividi.js')}}" defer="true"></script>
    @endsection
  
    @section('content')
        <header>
            <h1> Benvenuto {{$username}} da YourDogs</h1>
        </header>

        <form name ="createpost" method = 'post' action = "{{route ('condividi') }}" enctype="multipart/form-data">
            @csrf
            
            <a href="{{url('profile')}}" class="block" id="torna"></a>
            
            <div class="post">
                <div id = "fuori">

                    <div class="immagine"></div>

                    <div id="boh">

                        <div class="fileupload">   
                            <input type='file' name='foto' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                            <div id="upload">
                                <div class="file_name">Seleziona un file...</div>
                                <div class="file_size"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="didascalia" id="post" type='text' name='post' value="Scrivi una didascalia...">    
            </div>
            <label>&nbsp;<input type='submit' value='Pubblica' id='pubblica'></label>
        </form>
    @endsection
