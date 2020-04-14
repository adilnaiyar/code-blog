<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts      = Post::latest()->paginate(2);

        $categories = Category::all();

        return view('front.home', compact('posts', 'categories'));
    }

    public function post($slug)
    {
        $posts      = Post::whereSlug($slug)->firstOrFail();

        $comments   = $posts->comment()->get();

        $categories = Category::all();

        return view('front.post', compact('posts', 'comments', 'categories'));

    }

    public function categories($id)
    {
        $categories = Category::all();

        $category   = Category::findOrFail($id);

        $posts      = $category->post()->latest()->paginate(2);

        return view('front.categories', compact('posts', 'categories', 'category'));
    }
}
