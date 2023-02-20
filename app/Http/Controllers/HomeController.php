<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->limit('3')->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->limit('3')->get();
        $pages = Post::orderBy('id', 'DESC')->where('post_type', 'page')->limit('3')->get();
 
        return view('admin.dashboard', compact('categories', 'posts', 'pages'));
    }
}
