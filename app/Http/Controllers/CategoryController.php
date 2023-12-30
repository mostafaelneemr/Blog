<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'thumbnail' => 'image|mimes:jpeg,png,jpg,',
                'name' => 'required|unique:categories|string',
            ],
            [
                'thumbnail.mimes' => 'image should be extension one of jpg , png or jpeg',
                'name.unique' => 'Category name already exist',
                'name.string' => 'name should be string',
            ]);

            if ($request->has('thumbnail')) {
                $image = $request->has('thumbnail');
                $name_gen = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
                Image::make($image)->save('upload/website/' .$name_gen);
                $save_url = 'upload/website/'. $name_gen;
            }

            Category::create([
                'thumbnail' => $save_url,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'is_published' => $request->is_published,
            ]);
            session()->flash('Add', 'category created successfuly');
            return redirect()->route('categories.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            $this->validate($request, [
                'thumbnail' => 'image|mimes:jpeg,png,jpg.',
                'name' => 'required|unique:categories,id',
            ],
            [
                'thumbnail.mimes' => 'picture should be extension one of jpg , png or jpeg',
                'name.required' => 'Enter Name url',
                'name.unique' => 'Category name already exist',
            ]);

            if ($request->has('thumbnail')) {
                $image = $request->has('thumbnail');
                $name_gen = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
                Image::make($image)->save('upload/website/' .$name_gen);
                $save_url = 'upload/website/'. $name_gen;
                category::where('id', $id)->update([ 'thumbnail' => $save_url ]);
            }

            $category->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'is_published' => $request->is_published,
            ]);

            session()->flash('Edit', 'category updated successfuly');
            return redirect()->route('categories.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $image = Str::after($category->thumbnail, 'image/');
        $image = public_path('image/' . $image);
        unlink($image);

        $category->delete();

        return redirect()->back()->with('Deleted', 'category deleted successful');
    }
}
