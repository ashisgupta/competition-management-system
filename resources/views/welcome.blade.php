<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Competition Management System</title>

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
                z-index: 999;
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

            #particles-js {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">
                                    <div class="top-right links">
                                          @if (Route::has('login'))
                                                
                                                    @auth
                                                        <a href="{{ url('/'.Auth::user()->role->name.'/home') }}">Home</a>
                                                    @else
                                                        <a href="{{ route('login') }}">Login</a> 
                                                        <a href="{{ route('register') }}">Register</a>
                                                    @endauth
                                                
                                            @endif                            
                                            </div>
                
                <div class="content container">
                    <div class="title m-b-md" style="font-size:8vw;">
                        Pre - competition Paper Submission
                    </div>
                    <img src='{{ asset("/image/teamscredriver.png") }}'  alt="User Image"   width="10%"  />
                    <div class="links">
                         <a href="https://www.teamscrewdrivers.com/" target="_blank">Powered by Teamscrew Drivers</a>
                    </div>
                </div>
            </div>

            <div id="particles-js"></div>


            <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            <script>
                /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
                    console.log('callback - particles.js config loaded');
                });
            </script>

</body>
</html>