<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'image_url' => 'required',
            ],
            [
                'image_url.required' => 'select image',
            ],);
    
            $filePath = "";
            if ($request->has('image_url')) {
                $filePath = uploadImage('gallery', $request->image_url);
            };
    
            Gallery::create([
                'user_id' => Auth::id(),
                'image_url' => $filePath,
            ]);
            
            session()->flash('Add', 'image has add successfuly');
            return redirect()->route('galleries.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('image_url')) {
                $filePath = uploadImage('gallery', $request->image_url);
                Gallery::where('id', $id)->update(['image_url' => $filePath,]);
            };

            session()->flash('Edit', 'picture done updated');
            return redirect()->route('galleries.index');
        
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $image = Str::after($gallery->image_url, 'image/');
        $image = public_path('image/' . $image);
        unlink($image);
        $gallery->delete();

        session()->flash('Deleted', 'delete image successfuly');
        return redirect(route('galleries.index'));
    }
}
