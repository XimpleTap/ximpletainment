@extends('master')
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
	
	<div id="create-playlist-modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        
	      	<div class="form-group">
		    	
		    	<input type="text" placeholder="Playlist name here..." class="form-control" id="playlist-name">
		  	</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-info" id="create-playlist">Create</button>
	      </div>
	    </div>

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

	getAllMusic(genre).then(function(data){
		if(data!=null){
				
			var musicCount = 0;
			for(musicCount=0; musicCount<data.length; musicCount++){

				musicPlaylist.push({
					mp3: "/ximpletainment_2/public/audio/"+genre+"/"+data[musicCount].filename,
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
			
			if(musicPlaylist.length!=0){
				$('#ximple-player').ttwMusicPlayer(musicPlaylist, {
			        autoPlay:true, 
			        isPlaylist : false,
			        description:"",
			        jPlayer:{
			            swfPath:"{{ asset('jquery-player') }}" //You need to override the default swf path any time the directory structure changes
			        }
			    },
		        {
		        	ad_file : "{{ asset('images/NoticeMe.png') }}"
		        });
			}else{

			}

			
		}
	});

	$(document).on('click','.add-to-playlist',function(){
		playlistIndex = $(this).parents('li').data('index');
		var musicData = musicPlaylist[playlistIndex];
		addToPlaylist(musicData).then(function(data){
			console.log(data);
			if(data==0){
				$('#create-playlist-modal').modal("show");
			}else{

				alert(musicData.title+" has been added to your playlist.");
			    
			}
		});
    });

    $('#create-playlist').click(function(){
    	var playlistName = $('#playlist-name').val();
    	var musicData = musicPlaylist[playlistIndex];
    	console.log(musicData);
    	if(playlistName==""){
    		alert("Please input your playlist name");
    	}else{
    		createPlaylist(playlistName,musicData).then(function(data){
    			$('#create-playlist-modal #playlist-name').val("");
    			$('#create-playlist-modal').modal("hide");
    		});
    	}
    });
});


function getAllMusic(genre){

	return $.ajax({
		url : "{{ url('fetchmusic') }}",
		type: "GET",
		data :{
			genre: genre
		}
	});
}

function addToPlaylist(music_data){

	return $.ajax({
		url : "{{ url('addtoplaylist') }}",
		type: "GET",
		data : {
			"music_data" : music_data
		}
	});
}

function createPlaylist(playlist_title, music_data){

	return $.ajax({
		url : "{{ url('createplaylist') }}",
		type : "GET",
		data : {
			"playlist_title" : playlist_title,
			"music_data" : music_data
		}
	});
}
      
</script>
@endsection