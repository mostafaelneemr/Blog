<?php

namespace App\Http\Controllers\website\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sliderGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('post_type', 'gallery')->first();
        return view('admin.gallery.slider.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.slider.create');
    }

    public function store(Request $request)
    {
        try {
            $filePath = "";
            if ($request->has('image_url')) {
                $filePath = uploadImage('gallery', $request->image_url);
            };

            slider::create([
                'user_id' => Auth::id(),
                'image_url' => $filePath,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'post_type' => 'gallery',
            ]);

            session()->flash('Add', 'done added slider in gallery page');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        return view('admin.gallery.slider.edit', compact('galleries'));
    }

    public function update(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            if ($request->has('image_url')) {
                $filePath = uploadImage('gallery', $request->image_url);
                slider::where('id', $id)->update(['image_url'=> $filePath]);
            };

                $gallery->update([
                    'title' => $request->title,
                    'sub_title' => $request->sub_title,
                ]);

            session()->flash('Edit', '');
            return redirect()->route('');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
