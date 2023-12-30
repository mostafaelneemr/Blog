<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $pages = Post::orderBy('id', 'DESC')->where('post_type', 'page')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                "thumbnail" => 'image|mimes:png,jpg,jpeg',
                "title" => 'required|unique:posts',
                "details" => "required",
            ],
            [
                'thumbnail.required' => 'Enter thumbnail url',
                'title.required' => 'Enter title',
                'title.unique' => 'Title already exist',
                'details.required' => 'Enter details',
            ]); 

            $filePath = "";
            if ($request->has('thumbnail')) {
                $filePath = uploadImage('post', $request->thumbnail);};
    
            Post::create([
                'user_id' => Auth::id(),
                'thumbnail' => $filePath,
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'sub_title' => $request->sub_title,
                'details' => $request->details,
                'is_published' => $request->is_published,
                'post_type' => 'page',
            ]);
    
            Session()->flash('Add', 'Page created successfully');
            return redirect()->route('pages.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $page = Post::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($request->has('thumbnail')) {
                $filePath = uploadImage('post', $request->thumbnail);
                Post::where('id', $id)->update(['thumbnail' => $filePath,]);
            };

            $post->update([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'details' => $request->details,
                'is_published' => $request->is_published,
            ]);
    
            Session()->flash('Edit', 'updated page successfully');
            return redirect()->route('pages.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $page = Post::findOrFail($id);
        $page->delete();

        Session()->flash('Deleted', 'Page deleted successfully');
        return redirect()->route('pages.index');
    }
}
