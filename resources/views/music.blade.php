@extends('index')
@section('content')
	<div class="container-fluid">


		<div class="col-sm-2">
		</div>
		<div class="col-sm-8" id="ximple-player">
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

	var myPlaylist = [];

	$.ajax({

		url : "{{ url('fetchmusic') }}",
		type: "GET",
		data :{
			genre: "various"
		},success : function(data){

			if(data!=null){
				console.log(data);
				var musicCount = 0;
				for(musicCount=0; musicCount<data.length; musicCount++){

					myPlaylist.push({
						mp3: "/ximpletainment/public/audio/various/"+data[musicCount].filename,
				        oga:"",
				        title: data[musicCount].music_title,
				        artist: data[musicCount].music_artist,
				        rating:4,
				        buy:'',
				        price:'',
				        duration: data[musicCount].music_duration,
				        cover: data[musicCount].album_art == null ? "{{ asset('images/defaultmusic.jpg') }}" :  data[musicCount].album_art
					});
				}
				$('#ximple-player').ttwMusicPlayer(myPlaylist, {
			        autoPlay:true, 
			        description:"",
			        jPlayer:{
			            swfPath:"{{ asset('jquery-player') }}" //You need to override the default swf path any time the directory structure changes
			        }
			    },
		        {
		        	ad_file : "{{ asset('images/NoticeMe.png') }}"
		        });
			}
		}
	});

    
});

      
</script>
@endsection