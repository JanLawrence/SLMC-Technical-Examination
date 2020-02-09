<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
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
            // $photo = Photo::where('title', 'like' , '%'.$search.'%')->paginate(5);
            // return PhotoResource::collection($photo);
            $photo = DB::table('photos')
                    ->join('albums', 'photos.albumId', '=', 'albums.id')
                    ->select('albums.title as albumId', 'photos.id', 'photos.title', 'photos.url', 'photos.thumbnailUrl')
                    ->where('photos.title', 'like' , '%'.$search.'%')
                    ->paginate(5);
            return $photo;
        } else {
            // $photo = Photo::paginate(5);
            // return PhotoResource::collection($photo)
            $photo = DB::table('photos')
                    ->join('albums', 'photos.albumId', '=', 'albums.id')
                    ->select('albums.title as albumId', 'photos.id', 'photos.title', 'photos.url', 'photos.thumbnailUrl')
                    ->paginate(5);
            return $photo;
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
