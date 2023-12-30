<?php

namespace App\Http\Controllers;

use App\Events\PageViewer;
use App\Mail\VisitorContact;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\slider;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'DESC')->where('is_published', '1')->get();
        // $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->paginate(10);
        $posts = Post::where('post_type', 'post')->where('is_published', '1')->latest()->paginate(10);
        $sliders = slider::where('slider_type', 'home')->get();
        $view = Viewer::first();
        event(new PageViewer($view));
        return view('website.index', compact('posts', 'categories', 'sliders','view'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();

        if($post) {
            return view('website.post', compact('post'));
        }else {
            return \response()->view('website.error-404', array(), 404);
        }
    }

    public function category($slug) 
    {
        $category = category::where('slug', $slug)->where('is_published', '1')->first();
        $posts = $category->posts()->orderBy('posts.id', 'DESC')->where('is_published', '1')->latest()->paginate(10);
        if ($category) {    
            return view('website.category', compact('category', 'posts'));
        } else {
            return "cant show this category";
        }
    }

    public function page($slug)
    {
        $page = Post::where('slug', $slug)->where('post_type', 'page')->where('is_published', '1')->first();

            return view('website.page', compact('page'));

    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        
        return view('website.gallery', compact('galleries'));
    }
    
    public function showContactForm(){
        $contacts = slider::where('slider_type', 'contact')->get();
        return view('website.contact', compact('contacts'));
    }

    public function  submitContactForm(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'message' => $request->message,
        ];
        
        Mail::to('mostafa@mail.com')->send(new VisitorContact($data));

        session()->flash('Add', 'send mail successfull');
        return redirect(route('contact.show'));
    }
}
