<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class MusicController extends Controller{

	public function index($genre = ""){
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

		return view('music');
	}

	public function indexPlaylist(){	
		return view('playlist')->with('playlist_data',Session::get('my_playlist'));
	}

	public function fetchAllMusic(Request $request){

		$genre = $request->input('genre');

		$files = \File::allFiles(public_path('audio/'.$genre));

		$musicPlaylist = array();
		foreach ($files as $file)
		{
		    $remotefilename = public_path('audio/'.$genre.'/'.basename($file));
			$getID3 = new \getID3;
			$ThisFileInfo = $getID3->analyze($remotefilename);
			

			$picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];
	        //$picture = @$ThisFileInfo['comments']['picture'][0]['data'];
	        $type = @$ThisFileInfo['id3v2']['APIC'][0]['image_mime'];
	        
			$albumArt = !empty($picture) == true ? $base64 = 'data:' . $type . ';base64,' . base64_encode($picture) : NULL;

			if(!empty($ThisFileInfo['tags']['id3v2']['title']) && !empty($ThisFileInfo['tags']['id3v2']['artist'])){
				$fileMeta = [
					"filename" => basename($remotefilename),
					"music_title" => $ThisFileInfo['tags']['id3v2']['title'][0],
					"music_artist" => $ThisFileInfo['tags']['id3v2']['artist'][0],
					"music_duration" => $ThisFileInfo['playtime_string'],
					"album_art" => $albumArt
				];
				array_push($musicPlaylist,$fileMeta);
			}


			
		}
		return response()->json($musicPlaylist);
	}

	public function createPlaylist(Request $request){

		$playlistTitle = $request->input('playlist_title');

		if(empty(Session::get('my_playlist.title'))){
			$request->session()->flush();
			Session::put('my_playlist.title',$playlistTitle);
			Session::push('my_playlist.music',$request->input('music_data'));
			Session::save();
		}
	}

	public function addMusicToPlaylist(Request $request){
		
		if(!empty(Session::get('my_playlist.music'))){
			Session::push('my_playlist.music',$request->input('music_data'));
			Session::save();
			return 1;
		}else{
			return 0;
		}
	}

}