<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostRessource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::posts();
    return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title_en' => 'required|min:3|max:255',
            'content_en' => 'required',
            'title_fr' => 'required_with:content_fr|nullable|min:3|max:255',
            'content_fr' => 'required_with:title_fr',
        ],[], [
        'title_en' => trans('lang.post_title_english'),
        'content_en' => trans('lang.post_content_english'),
        'title_fr' => trans('lang.post_title_french'),
        'content_fr' => trans('lang.post_content_french')
        ]);
       
        $title = array_filter([
            'en' => $request->title_en,
            'fr' => $request->title_fr
        ]);

        $content = array_filter([
            'en' => $request->content_en,
            'fr' => $request->content_fr
        ]);

        $student_id = Auth::user()->student->id;

        // dd($title, $content, $student_id);

        Post::create([
            'title' => $title,
            'content' => $content,
            'student_id' => $student_id
        ]);

        return redirect()->route('student.index')->with('success', trans('lang.message_success_create_post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
