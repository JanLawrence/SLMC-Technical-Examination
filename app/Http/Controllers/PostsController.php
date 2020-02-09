<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
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
            // $post = Post::where('title', 'like' , '%'.$search.'%')->paginate(5);
            // return PostResource::collection($post);
            $post = DB::table('posts')
                    ->join('users', 'posts.userId', '=', 'users.id')
                    ->select('users.name as userId', 'posts.id', 'posts.title', 'posts.body')
                    ->where('posts.title', 'like' , '%'.$search.'%')
                    ->paginate(5);
            return $post;
        } else {
            // $post = Post::paginate(5);
            // return PostResource::collection($post);
            $post = DB::table('posts')
                    ->join('users', 'posts.userId', '=', 'users.id')
                    ->select('users.name as userId', 'posts.id', 'posts.title', 'posts.body')
                    ->paginate(5);
            return $post;
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
