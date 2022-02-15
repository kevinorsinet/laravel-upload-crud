<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoriesList = Category::all();
        return view('categories.index', compact(['categoriesList']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
            'name' => 'required|min:2|max:255'
        ]);
  
        $input = $request->all();
        // $input = {
            // name: "Oiseaux"
    
        // }
        /*
        //create the post
        $input =  Category::create([
            'name' => $request->name
        ]);
        */
        Category::create($input);
     
        return redirect()->route('categories.index')->with('success','Espèce correctement ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'min:2|max:255'
     
        ]);
  
        $input = $request->all();
        // $input = {
            // title: "Ukraine",
            // image: "53h4dh4fgh657hsdhiod"
        // }

        $category->update($input);
        return redirect()->route('categories.index')->with('success','Modification effectuée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')
        ->with('success','Espèce supprimée');
    }
}
