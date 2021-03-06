<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Category; 
use Illuminate\Http\Request;

class AdminController extends Controller
{ 
	/**
	 * Display a count of the resource.
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
    	$countUser           = User::count();
    	$countPost           = Post::count();
    	$countComment        = Comment::count();
    	$countCategories     = Category::count();
    	 
    	return view('admin.index', compact('countUser', 'countPost', 'countComment', 'countCategories'));
    }
}
