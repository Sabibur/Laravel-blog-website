<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', "DESC")->paginate(10);
        return view('admin.post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('admin.post.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => "image.jpg",
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/post/', $image_new_name);
            $post->image = '/images/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
