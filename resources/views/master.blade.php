<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ximpletainment</title>

        <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/simple-sidebar.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/player-style.css') }}" type="text/css" rel="stylesheet">
    </head>
<body>
    
    <nav class="navbar-custom navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">Ximpletainment</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="">Music
                <span class="caret"></span></a>
                <ul class="dropdown-menu music-dropdown-menu">
                @if(!empty($audioGenres))
                  @foreach($audioGenres as $audio_genre)
                    <li><a href="{{ URL::to('music/'.$audio_genre->genre_name) }}">{{ $audio_genre->genre_name }}</a></li>
                  @endforeach
                  @if(!empty(Session::get('my_playlist.title')))
                    <li><a href="{{ url('musicplaylist') }}">{{ Session::get('my_playlist.title') }}</a></li>
                  @endif
                @else
                    <li><a href="#">Nothing on music.</a></li>
                @endif
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="">Movies
                <span class="caret"></span></a>
                <ul class="dropdown-menu movie-dropdown-menu">
                  @if(!empty($videoCategories))
                    @foreach($videoCategories as $video_category)
                      <li><a href="#">{{ $video_category->category_name }}</a></li>
                    @endforeach
                  @else
                    <li><a href="#">Nothing on movies.</a></li>
                  @endif
                </ul>
            </li>
            <li><a href="#">Settings</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>   
    <!-- /#wrapper -->
  
    @yield('content')
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.jplayer.js') }}"></script>
    <script src="{{ asset('js/ttw-music-player.js') }}"></script>
    @yield('js')
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>