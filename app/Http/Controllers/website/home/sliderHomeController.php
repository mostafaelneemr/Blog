<?php

namespace App\Http\Controllers\website\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sliderHomeController extends Controller
{
    public function index()
    {
        $sliders = slider::where('slider_type', 'home')->get();
        return view('admin.home.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.home.slider.create');
    }

    public function store(SliderRequest $request)
    {
        try {

            $filePath = "";
            if ($request->has('image_url')) {
                $filePath = uploadImage('slider', $request->image_url);
            }
            
            slider::create([
                'user_id' => Auth::id(),
                'image_url' => $filePath,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'slider_type' => 'home',
            ]);

            session()->flash('Add', 'done added slider in home page');
            return redirect()->route('slider-home.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $sliders = slider::findOrFail($id);
        return view('admin.home.slider.edit', compact('sliders'));
    }

    public function update(SliderRequest $req, $id)
    {
        try {
            $sliders = slider::findOrFail($id);
            if ($req->has('image_url')) {
                $filePath = uploadImage('slider', $req->image_url);
                $sliders->where('id', $id)->update([ 'image_url' => $filePath ]);
            }

            $sliders->update([
                'user_id' => Auth::id(),
                'title' => $req->title,
                'sub_title' => $req->sub_title,
            ]);

            session()->flash('edit', 'done updated slider on home page');
            return redirect()->route('slider-home.index');
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $req)
    {
        try {
            #$sliders = 
            return slider::findOrFail($req->slide_id);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
