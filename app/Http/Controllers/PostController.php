<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id' , 'DESC')->where('post_type', 'post')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.create', compact('categories')); 
    }

    public function store(PostRequest $request)
    {
        try {

        $filePath = "";
        if($request->has('thumbnail')) { 
            $filePath = uploadImage('post', $request->thumbnail);};

        $post = Post::create([
            'user_id' => Auth::id(),
            'thumbnail' => $filePath,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'sub_title' => $request->sub_title,
            'is_published' => $request->is_published,
            'post_type' => 'post',
        ]);
        $post->categories()->sync($request->category_id, true);

        session()->flash('Add', 'Post created successfuly');
        return redirect()->route('posts.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    public function update(PostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

        if ($request->has('thumbnail')) {
            $filePath = uploadImage('post', $request->thumbnail);
            Post::where('id', $id)->update([ 'thumbnail' => $filePath ]);
        };    
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'sub_title' => $request->sub_title,
            'details' => $request->details,
            'is_published' => $request->is_published,
        ]);

        $post->categories()->sync($request->category_id, true);

        session()->flash('Edit', 'updated post successfuly');
        return redirect(route('posts.index'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image = Str::after($post->thumbnail, 'image/');
        $image = public_path('image/' . $image);
        unlink($image);
        $post->delete();

        session()->flash('Deleted', 'deleted post successfuly');
        return redirect(route('posts.index'));

    }
}
