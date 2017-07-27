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
                	 @foreach ($video_list as $video)
	        
				    	<div class="row most-watched-list">
			                <div class="col-xs-12 col-md-4 col-sm-4 col-lg-4">
			                    <center><img class="img-responsive" src="{{ asset('images/defaultmovie.png') }}"></center>
			                </div>
			                <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
			                    <p class="movie-title" title="{{ basename($video['filename']) }}">{{ $video['filename'] }}</p>
			                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h6>
			                    <a href="{{ URL::to('watchvideo/'.$video['file_folder'].'/'.$video['filename'].''.$video['file_extension']) }}" class="btn btn-danger" role="button"><span class="fa fa-video-camera"></span> Watch Movie</a>
			                    
			                </div>
			            </div>  


				    @endforeach
                </div>
            </div>
	   

	    	<center><?php echo $video_list->render(); ?></center>

		</div>
		<div class="col-sm-2">
		</div>
	</div>


@endsection

@section('js')
<script>

$(document).ready(function(){
	var href = location.href;
	var vid_category = href.match(/([^\/]*)\/*$/)[1];

	$('#category-header').text(vid_category.slice(0,vid_category.lastIndexOf("?")));

	$('.pagination li a').each(function () {
	    var link = vid_category;
	    link = link.slice(0,link.indexOf("="));
	    var pageText = $(this).text();
	    var activePage = parseInt($('.pagination li.active span').text());
	    if (pageText.trim() == "«") {
	      pageText = activePage - 1;
	    } else if (pageText.trim() == "»") {
	      pageText = activePage + 1;
	    }
	    link = link+"="+pageText;
	    console.log(link);
	    $(this).attr('href', link);
	  });
	
});


      
</script>
@endsection