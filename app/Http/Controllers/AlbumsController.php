<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Resources\AlbumResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('s');
        if($search){
            // $album = Album::where('title', 'like' , '%'.$search.'%')->paginate(5);
            // return AlbumResource::collection($album);
            $album = DB::table('albums')
                    ->join('users', 'albums.userId', '=', 'users.id')
                    ->select('users.name as userId', 'albums.id', 'albums.title')
                    ->where('albums.title', 'like' , '%'.$search.'%')
                    ->paginate(5);
            return $album;
        } else {
            // $album = Album::paginate(5);
            // return AlbumResource::collection($album);
            $album = DB::table('albums')
                        ->join('users', 'albums.userId', '=', 'users.id')
                        ->select('users.name as userId', 'albums.id', 'albums.title')
                        ->paginate(5);
            return $album;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
