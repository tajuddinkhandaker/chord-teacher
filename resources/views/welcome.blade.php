<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- 
        <script type='text/javascript' src='//www.midijs.net/lib/midi.js'></script>
 -->
        <script type='text/javascript' src='js/midi.js'></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="javascript:void(0)" onclick="play()">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a><!-- 

                    <a href="#" onClick="MIDIjs.play('/audio/Guitar-3-Chord-A7.mid');">Play hinematov.mid</a>
                    <a href="#" onClick="MIDIjs.stop();">Stop MIDI Playback</a> -->
                    
                </div>
<!--                 <button id="arraybuffer">Download arraybuffer</button> 
                <audio controls>
                  <source src="/audio/Guitar-3-Chord-A7.mid" type="audio/x-midi">
                    Your browser does not support the audio element.
                </audio>
                <input id="audio_file" type="file" accept="audio/*" />
                <audio id="audio_player" /> -->
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/shared.js') }}"></script>
        <script src="{{ asset('js/audio-tag-sample.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
        audio_file.onchange = function(){
            var files = this.files;
            var file = URL.createObjectURL(files[0]); 
            audio_player.src = file; 
            audio_player.play();
        };

        function play()
        {
            try
            {
                // // Create a instance of AudioContext interface
                // window.AudioContext = window.AudioContext||window.webkitAudioContext||window.mozAudioContext;
                // var context = new AudioContext();

                // var source = context.createBufferSource(); //this represents the audio source. We need to now populate it with binary data.

                // //now retrieve some binary audio data from <audio>, ajax, input file or microphone and put it into a audio source object.
                // //here we will retrieve audio binary data via AJAX
                // var request = new XMLHttpRequest();
                // request.open('GET', '/audio/Guitar-3-Chord-A7.mid', true);
                // // request.headers = {'Content-Type':'audio/x-midi','X-Requested-With':'XMLHttpRequest'},
                // request.responseType = 'arraybuffer'; //This asks the browser to populate the retrieved binary data in a array buffer
                // request.contentType = 'audio/x-midi';
                // request.onload = function(){
                //     //populate audio source from the retrieved binary data. This can be done using decodeAudioData function.
                //     //first parameter of decodeAudioData needs to be array buffer type. So from wherever you retrieve binary data make sure you get in form of array buffer type.
                //     context.decodeAudioData(request.response).then(function(buffer) {
                        
                //         // console.log(buffer);
                //         // source.buffer = buffer;

                //         // //now we got context, audio source.
                //         // //now lets connect the audio source to a destination(hardware to play sound).
                //         // source.connect(context.destination);//destination property is reference the default audio device
                //         // source.loop = true;
                //         // /*
                //         //     If we wanted to add any audio nodes then we need to add them in between audio source and destionation anytime dynamically.
                //         // */

                //         // //now play the sound.
                //         // source.start(0);

                //     }, function(e){ console.log("Error with decoding audio data" ); });
                // }
                // request.send();

                var input = document.querySelector('input');
                var sample = new AudioTagSample();

                sample.play('/audio/Guitar-3-Chord-A7.mid');
            }
            catch(e) 
            {
                alert("Web Audio API not supported");
            }
        }
        </script>


    </body>
</html>
