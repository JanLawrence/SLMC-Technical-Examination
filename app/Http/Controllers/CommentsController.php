<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Comment;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
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
            // $comment = Comment::where('name', 'like' , '%'.$search.'%')->paginate(5);
            // return CommentResource::collection($comment);
            $comment = DB::table('comments')
                        ->join('posts', 'comments.postId', '=', 'comments.id')
                        ->select('posts.title as postId', 'comments.id', 'comments.name', 'comments.email', 'comments.body')
                        ->where('comments.name', 'like' , '%'.$search.'%')
                        ->paginate(5);
            return $comment;
        } else {
            // $comment = Comment::paginate(5);
            // return CommentResource::collection($comment);
            $comment = DB::table('comments')
                        ->join('posts', 'comments.postId', '=', 'posts.id')
                        ->select('posts.title as postId', 'comments.id', 'comments.name', 'comments.email', 'comments.body')
                        ->paginate(5);
            return $comment;
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
