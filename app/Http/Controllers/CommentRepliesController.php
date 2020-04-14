<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use App\CommentReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = CommentReply::latest()->paginate(4);
        return view('admin.comment.reply.index', compact('replies'));
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
        
    }


    public function createReply(request $request)
    {
        $user = Auth::User();

        $this->validate($request,[
            
            'body'       => 'required',
        ]); 

        $data = [

            'comment_id'   => $request->comment_id,
            'is_active'    => $user->is_active,
            'author'       => $user->name,
            'email'        => $user->email,
            'photo'        => $user->photo->file,
            'body'         => $request->body,
        ];

        CommentReply::create($data);

        Session::flash('comment_reply', 'Your Reply is submitted and is waiting moderation');

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
        $comments = Comment::findOrFail($id);

        $replies  = $comments->reply()->latest()->paginate(4);

        return view('admin.comment.reply.show', compact('replies'));
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
        CommentReply::findOrFail($id)->update($request->all());

        Session::flash('comment_reply', 'Your Reply Permission is updated');

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
        CommentReply::findOrFail($id)->delete();

        Session::flash('delete', 'Your Reply has been deleted');
        
        return redirect()->back();
    }
}
