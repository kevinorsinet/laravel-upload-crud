<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsList = Post::latest()->paginate(3);
        // $categories = $postsList->jointureCategory->name;

        return view('toto.index', compact(['postsList']))
        ->with('i', (request()->input('page', 1) - 1) * 3);
        // $postsList = Post::all();
        // return view('toto.index', compact('postsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('toto.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //MAJ de la méthode store()
        $request->validate([
            'title' => 'required|min:2|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
  
        $input = $request->all();
        // $input = {
            // title: "Ukraine",
            // image: "53h4dh4fgh657hsdhiod"
        // }
        /*
        //create the post
        $input =  Post::create([
            'title' => $request->title,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);
        */
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage"; // $input['image'] = "20221502.jpeg";
        }
    
        Post::create($input);
     
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $category = $post->category->name;
        return view('toto.edit', compact(['post', 'category']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
  
        $input = $request->all();
        // $input = {
            // title: "Ukraine",
            // image: "53h4dh4fgh657hsdhiod"
        // }
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage"; // $input['image'] = "20221502.jpeg";
        } else {
            unset($input['image']);
        }
    
        $post->update($input);
        return redirect()->route('posts.index')->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success','Post deleted successfully');
    }
}
