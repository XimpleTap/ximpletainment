@extends('master')
@section('content')
    <div class="container-fluid">  
        <div class="col-sm-9">
            <div class="panel">
                <div class="panel-body">
                    <div class="featured-movie row">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <img src="{{ asset('images/featuremovie.jpg') }}" id="featured-movie-poster" class="img-responsive img-thumbnail">
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            
                            <h1>Iron Man <span class="label label-warning">9.4</span></h1>
                            <br/>
                            <h5>2008 | Science fiction film/Thriller | 2h 6m</h5>
                            <p>A billionaire industrialist and genius inventor, Tony Stark (Robert Downey Jr.), is conducting weapons tests overseas, but terrorists kidnap him to force him to build a devastating weapon. Instead, he builds an armored suit and upends his captors. Returning to America, Stark refines the suit and uses it to combat crime and terrorism.</p>
                            <button class="btn btn-lg btn-danger"><span class="fa fa-video-camera"></span> Watch Movie</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Most Played Music</h3>
                </div>
                <div class="panel-body">
                    <div class="row most-played-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmusic.jpg') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Music Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-played-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmusic.jpg') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Music Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-played-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmusic.jpg') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Music Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-played-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmusic.jpg') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Music Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-played-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmusic.jpg') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Music Title</a></h4></center>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3>Most Watched Videos</h3>
                </div>
                <div class="panel-body">
                    <div class="row most-watched-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Movie Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-watched-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Movie Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-watched-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Movie Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-watched-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Movie Title</a></h4></center>
                        </div>
                    </div>
                    <div class="row most-watched-list">
                        <div class="col-xs-12 col-md-4 col-sm-12 col-lg-4">
                            <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-8">
                            <center><h4><a>Movie Title</a></h4></center>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
@endsection