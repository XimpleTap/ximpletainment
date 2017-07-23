@extends('master')
@section('content')
	<div class="container-fluid">


		<div class="col-sm-2">
		</div>

		<div class="col-sm-8" id="ximple-player">
			<input type="hidden" id="playlist-data" data-playlist="{{ json_encode($playlist_data) }}">
			<!-- @if(isset($album_art)) 
				<img style="width: 100%; max-width: 500px;" class="img-responsive" id="album-art" src="{{ $album_art }}">
			@else
				<img style="width: 100%; max-width: 500px;" class="img-responsive" id="album-art" src="{{ asset('images/defaultmusic.jpg') }}">
			@endif
			



			<audio controls style="width: 100%; max-width: 500px;">
			  
			  <source src="{{ url('audio/Gonna Lose You.mp3') }}" type="audio/mpeg">
			  
				Your browser does not support the audio element.
			</audio> -->
		</div>
		<div class="col-sm-2">
		</div>
	</div>
	

@endsection

@section('js')
<script>

$(document).ready(function(){

	var musicPlaylist = [];
	var href = location.href;
	var genre = href.match(/([^\/]*)\/*$/)[1];
	var playlistIndex = 0;

	var playlistData = $('#playlist-data').data("playlist");
	console.log(playlistData['music']);

	$('#ximple-player').ttwMusicPlayer(playlistData['music'], {
        autoPlay:true, 
        isPlaylist : true,
        description:"",
        jPlayer:{
            swfPath:"{{ asset('jquery-player') }}" //You need to override the default swf path any time the directory structure changes
        }
    },
    {
    	ad_file : "{{ asset('images/NoticeMe.png') }}"
    });

	
});

      
</script>
@endsection