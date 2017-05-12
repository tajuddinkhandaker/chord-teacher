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

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">

        <script type='text/javascript' src='/js/midi.js'></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">

                <div class="title m-b-md">
                    MIDI Keypad
                </div>
                <main class="mdl-layout__content">
                  <div class="mdl-grid">
                    @each('includes.keys', $chords, 'chord')
                  </div>
                </main>

            </div>  

        </div>
        <script src="https://code.getmdl.io/1.3.0/material.min.js"></script> 
        <script src="{{ asset('/js/app.js') }}"></script> 
        <script type="text/javascript">
            $(document).ready(function() {
                var mdl_buttons = $('.mdl-button');
                $.each(mdl_buttons, function( index, value ) {
                    $('#' + value.id).click(function() {
                        var url = '/api/v1/midi/' + value.id;
                        $.ajax({
                          method: "GET",
                          url: url,
                          dataType: "json"
                        })
                        .done(function( data ) {
                            console.log('Now playing: ' + data.url );
                            MIDIjs.play(data.url);
                        })
                        .fail(function() {
                            console.log( "Failed to get url!" );
                        });
                    });
                });
            });
        </script>
    </body>
</html>