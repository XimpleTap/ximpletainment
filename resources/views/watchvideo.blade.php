@extends('master')
@section('content')
	<div class="container-fluid">


		<div class="col-sm-2">
		</div>
		<div class="col-sm-8" id="video-player">
			<div class="panel">
                <div class="panel-heading">
                    <h3 id="category-header">Video Category Here</h3>
                </div>
                <div class="panel-body">
                	 <video width="400" controls>
					    <source src="{{ $video_file }}" type="video/mp4">
					    Your browser does not support HTML5 video.
					 </video>
                </div>
            </div>
	   

	    	

		</div>
		<div class="col-sm-2">
		</div>
	</div>


@endsection

@section('js')
<script>

$(document).ready(function(){
	
});


      
</script>
@endsection