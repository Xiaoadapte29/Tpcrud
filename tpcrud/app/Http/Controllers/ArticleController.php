<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'title' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_path' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $image_path= $request->file('image_path')->store('public/images');
        $file_path = $request->file('file_path')->store('public/files');

        Article::create([
            'title' => $request->title,
            'image_path' => $image_path,
            'file_path' => $file_path,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Article::findOrFail($id);
        return view('articles.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_path' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $article = Article::findOrFail($id);
    
        if ($request->hasFile('image_path')) {
            if (Storage::exists('public/' . $article->image_path)) {
                Storage::delete('public/' . $article->image_path);
            }
    
            $article->image_path = $request->file('image_path')->store('public/images');
        }
    
        if ($request->hasFile('file_path')) {
            if (Storage::exists('public/' . $article->file_path)) {
                Storage::delete('public/' . $article->file_path);
            }
    
            $article->file_path = $request->file('file_path')->store('public/files');
        }
    
        $article->title = $request->title;
    
        $article->save();
    
        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articles = Article::find($id);
        $articles->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
