<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class VideoController extends Controller
{
    	public function index($category = ""){

    	$files = array();
    	
    	if($category!=""){
    		$files = \File::allFiles(public_path('movies/'.$category));
    		$videoFiles = array();
    		foreach ($files as $file)
			{
				$path_parts = pathinfo($file);
				$getID3 = new \getID3;
				$ThisFileInfo = $getID3->analyze($file);
				$ThisFileInfo['filename'] = $path_parts['filename'];
				$ThisFileInfo['file_extension'] = '.'.$path_parts['extension'];
				$ThisFileInfo['file_folder'] = $category;
				array_push($videoFiles, $ThisFileInfo);

			}
    		//Get current page form url e.g. &page=6
	        $currentPage = LengthAwarePaginator::resolveCurrentPage();

	        //Create a new Laravel collection from the array data
	        $collection = new Collection($videoFiles);

	        //Define how many items we want to be visible in each page
	        $perPage = 5;

	        //Slice the collection to get the items to display in current page
	        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
	         

	        //Create our paginator and pass it to the view
	        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

	        return view('video', ['video_list' => $paginatedSearchResults]);
    	}
		
		/*$remotefilename = public_path('audio/Gonna Lose You.mp3');
		$getID3 = new \getID3;
		$ThisFileInfo = $getID3->analyze($remotefilename);

        //$ThisFileInfo = $getID3->analyze($localtempfilename);
       	
        $picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];
        //$picture = @$ThisFileInfo['comments']['picture'][0]['data'];
        $type = @$ThisFileInfo['id3v2']['APIC'][0]['image_mime'];

		if ($fp_remote = fopen($remotefilename, 'rb')) {
		    $localtempfilename = tempnam('/tmp', 'getID3');
		    if ($fp_local = fopen($localtempfilename, 'wb')) {
		        while ($buffer = fread($fp_remote, 8192)) {
		            fwrite($fp_local, $buffer);
		        }
		        fclose($fp_local);
		        // Initialize getID3 engine
		        $getID3 = new \getID3;
		        $ThisFileInfo = $getID3->analyze($localtempfilename);
		       	
		        $picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];
		        //$picture = @$ThisFileInfo['comments']['picture'][0]['data'];
		        $type = @$ThisFileInfo['id3v2']['APIC'][0]['image_mime'];
		        // Delete temporary file

		        unlink($localtempfilename);
		    }
		    fclose($fp_remote);
		}

		if(!empty($picture)){
			return view('music',['album_art' => $base64 = 'data:' . $type . ';base64,' . base64_encode($picture)]);
		}else{
			return view('music',['album_art' => null]);
		}*/

		return view('video')->with('video_list',$files);
	}

	public function watchVideo($category ="",$filename="") // default 1 is needed here 
	{
	   return view('watchvideo')->with('video_file',public_path('movies/'.$category.'/'.$filename));
	}

}
