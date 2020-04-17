<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $comments = Comment::latest()->paginate(5);
        return view('admin.comment.index', compact('comments'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createComment(request $request)
    {
        $user = Auth::User();

        $this->validate($request,[
            
            'body'       => 'required',
        ], [
                'body.required' => 'Comment should not be empty.',
            ]); 

        $data = [

            'post_id'   => $request->post_id,
            'is_active' => $user->is_active,
            'author'    => $user->name,
            'email'     => $user->email,
            'photo'     => $user->photo->file,
            'body'      => $request->body,
        ];

        Comment::create($data);

        Session::flash('comment_message', 'Your message is submitted and is waiting moderation');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comment()->latest()->paginate(5);

        return view('admin.comment.show', compact('comments'));
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
        Comment::findOrFail($id)->update($request->all());

         Session::flash('comment_message', 'Your comment permission has been updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

         Session::flash('delete', 'Your comment has been deleted');

        return redirect('/admin/comments');
    }
}
