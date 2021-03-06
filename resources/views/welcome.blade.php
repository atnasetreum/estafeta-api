<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Estafeta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">

        <style>
            .card-1 {
              box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
              transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            }

            .card-1:hover {
              box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            }
        </style>

    </head>
    <body style="background: #E1E1E1">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="{{ url('/') }}">  {{ config('app.name', 'Laravel') }} </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">ENTRAR</a></li>
                            @else
                                <li><a href="{{ route('login') }}">INICIAR SESIÓN</a></li>
                                <li><a href="{{ route('register') }}">REGISTRO</a></li>
                            @endauth
                        @endif
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>


        <div class="container" style="margin-top: 10%; ">
            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <center>
                                <img src="img/estafeta_logo.png" class="img-responsive img-thumbnail card-1" alt="">
                            </center>
                    </div>
            </div>
        </div>



        <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
