<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AudioController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if(Auth::user()->is_admin){
            return redirect('/dashboard');
        }

        if(Auth::user()->is_first_login){
            return redirect('/initial/preference');
        }

        $playlist = DB::table('playlists')
            ->select(DB::raw('name, playlistId, type, image'))
            ->groupBy('playlistId', 'name', 'type', 'image')
            ->get();
        
        $playlisttype = DB::table('playlist_types')->get();

        $histories = DB::table('history')
            ->select(DB::raw('playlists.name, playlists.playlistId, playlists.type, playlists.image'))
            ->join('playlists', 'playlists.playlistId', '=', 'history.playlistId')
            ->where('history.userId', '=', Auth::user()->id)
            ->orderBy('history.created_at', 'desc')
            ->groupBy('playlists.name', 'playlists.playlistId', 'playlists.type', 'playlists.image')
            ->get();

        if($request->ajax()) {
            return view('home.index')->with(['playlists' => $playlist, 'playlisttypes' => $playlisttype, 'histories' => $histories]);
        }
        return view('sublayouts.master')->with(['playlists' => $playlist, 'playlisttypes' => $playlisttype,  'histories' => $histories]);
    }

    public function getPlaylist(Request $request){
        $playlistId = $request->playlistId;
        $playlists = DB::table('playlists')
            ->join('songs', 'playlists.songId', '=', 'songs.songId')
            ->where('playlists.playlistId', $playlistId)
            ->get();

        if($request->ajax()) {
            return view('home.playlist')->with('playlists', $playlists);
        }
        return view('sublayouts.master')->with('playlists', $playlists);
    }

    public function getSongList(Request $request){
        $playlistId = $request->playlistId;
        $songlists = DB::table('playlists')
            ->join('songs', 'playlists.songId', '=', 'songs.songId')
            ->where('playlists.playlistId', $playlistId)
            ->get();
    
        return response()->json(array('success'=>true, 'songlists'=> $songlists));
    }

    public function playTrack(Request $request){
        $result = DB::table('songs')->where('songId', $request->songId)->first();
        $path = storage_path('audio/'.$result->file);
    
        $response = new BinaryFileResponse($path);
        BinaryFileResponse::trustXSendfileTypeHeader();
        return $response;
    }

    public function insertHistory(Request $request){
        $segments = explode('/' ,$request->url);
        $songId = $segments[sizeOf($segments)-1];
        $playlistId = $segments[sizeOf($segments)-2];
        $token = Str::random(60);
        $current_date = date('Y-m-d H:i:s');

        DB::table('history')->insert([
            'userId' => Auth::user()->id, 
            'songId' => $songId, 
            'time' => 0,
            'token' => $token,
            'playlistId' => $playlistId,
            'created_at' => $current_date
        ]);

        session()->put('token', $token);
        return response()->json(array('success'=>true));
    }

    public function downloadFile(Request $request){
        $result = DB::table('songs')->where('songId', $request->songId)->first();
        $path = storage_path('audio/'.$result->file);
        return response()->download($path);
    }

    public function getHistory(Request $request){
        $history = DB::table('history')
            ->where('userId', Auth::user()->id)->orderBy('id', 'desc')->first();
        
        if($history == null){
            return response()->json(array('success'=>true, 'playlistUrls'=> null, 'currentIndex'=> 0));
        }

        $playlistId = $history->playlistId;
        $songId = $history->songId;
        $timeline = $history->time;
            
        $data = DB::table('playlists')
            ->join('songs', 'playlists.songId', '=', 'songs.songId')
            ->where('playlists.playlistId', $playlistId)
            ->get();
            
        $currentIndex = 0;
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]->songId == $songId){
                $currentIndex = $i;
            }
        }
        
        $playlistUrls = array();
        for ($i=0; $i < count($data); $i++) { 
            $url = $data[$i]->playlistId.'/'.$data[$i]->songId;
            array_push($playlistUrls, $url); 
        }

        return response()->json(array('success'=>true, 'playlistUrls'=> $playlistUrls, 'currentIndex'=> $currentIndex, 'timeline' => $timeline));
    }
}
