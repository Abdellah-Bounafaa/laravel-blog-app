<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->limit(6)->get();
        // $techBlogs = Blog::inRandomOrder()->where('categorie_id', 1)->limit(2)->get();
        // $cultureBlog = Blog::inRandomOrder()->where('categorie_id', 2)->limit(2)->get();
        $technologyBlogs = Blog::inRandomOrder()->where('categorie_id', 1)->limit(8)->get();
        $cultureBlogs = Blog::inRandomOrder()->where('categorie_id', 2)->limit(8)->get();
        return view('blogs.index')
            ->with([
                'blogs' => $blogs,
                // "techBlogs" => $techBlogs,
                "technologyBlogs" => $technologyBlogs,
                // 'cultureBlog' => $cultureBlog,
                "cultureBlogs" => $cultureBlogs
            ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                "title" => "required|unique:blogs,title",
                'description' => "required",
                'categorie_id' => "required",
                'tags' => "required",
                'image1' => "required|image|mimes:svg,jpg,jpeg,png,gif",
                'image2' => "image|mimes:svg,jpg,jpeg,png,gif",
                'image3' => "image|mimes:svg,jpg,jpeg,png,gif",
            ]
        );
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->categorie_id = $request->categorie_id;
        $blog->tags = $request->tags;
        $path = "/blogs/images";
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }
        $new_image1_name = "UIMG" . uniqid() . "." .  $request->file('image1')->extension();
        if ($request->file('image2') != null) {
            $new_image2_name = "UIMG" . uniqid() . "." . $request->file('image2')->extension();
            $request->file('image2')->move(public_path($path), $new_image2_name);
            $blog->image2 = $new_image2_name;
        }
        if ($request->file('image3') != null) {
            $new_image3_name = "UIMG" . uniqid() . "." .  $request->file('image3')->extension();
            $request->file('image3')->move(public_path($path), $new_image3_name);
            $blog->image3 = $new_image3_name;
        }
        $request->file('image1')->move(public_path($path), $new_image1_name);
        $blog->image1 = $new_image1_name;
        $blog->save();
        return redirect()->route('blogs')->with("success", "successfuly updated");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $title)
    {
        // $blog = Blog::where("title", $title)->first();
        $blog = Blog::where("title", "LIKE", "%" . $title . "%")->first();
        // dd($blog);
        $randomBlogs = Blog::inRandomOrder()->limit(4)->get();
        $blogs = Blog::latest()->limit(3)->get();
        return view('blogs.show')->with(['blog' => $blog, "randomBlogs" => $randomBlogs, "blogs" => $blogs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            return view('blogs.edit')->with('blog', $blog);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                "title" => "required",
                'description' => "required",
                'categorie_id' => "required",
                'tags' => "required",
                'image1' => "required|image|mimes:svg,jpg,jpeg,png,gif",
                'image2' => "image|mimes:svg,jpg,jpeg,png,gif",
                'image3' => "image|mimes:svg,jpg,jpeg,png,gif",
            ]
        );
        $blog =  Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->categorie_id = $request->categorie_id;
        $blog->tags = $request->tags;
        $path = "/blogs/images";
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }
        $new_image1_name = "UIMG" . uniqid() . "." .  $request->file('image1')->extension();
        if ($request->file('image2') != null) {
            $new_image2_name = "UIMG" . uniqid() . "." .  $request->file('image2')->extension();
            $request->file('image2')->move(public_path($path), $new_image2_name);
            $blog->image2 = $new_image2_name;
        }
        if ($request->file('image3') != null) {
            $new_image3_name = "UIMG" . uniqid() . "." .  $request->file('image3')->extension();
            $request->file('image3')->move(public_path($path), $new_image3_name);
            $blog->image3 = $new_image3_name;
        }
        $request->file('image1')->move(public_path($path), $new_image1_name);

        $blog->image1 = $new_image1_name;
        $blog->save();
        return redirect()->route('blogs')->with("success", "successfuly updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
        }
        return redirect()->route('blogs')->with("error", "successfuly deleted");
    }
    public function category_blogs(string $title)
    {
        $category = Category::where('title', $title)->first();
        $blogs = Blog::where('categorie_id', $category->id)->paginate(5);
        return view('blogs.category')->with(['blogs' => $blogs, 'category' => $category]);
    }
    public function search_blog(Request $request)
    {
        $blogs = Blog::where('title', 'like', '%' . $request->title . '%')->get();
        if ($blogs) {
            return view('blogs.search')->with(['blogs' => $blogs, "title" => $request->title]);
        }
    }
}