<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Posts = Post::all();
        return view("posts/index", ["Posts" => $Posts,"title"=>"Posts"]);
    }


    public function create()
    {
         Post::create([
            "post_content" => "Your application will be reviewed thoroughly and you will be alerted via email when it is processed.
Waiting times depend on the volume of applicants. We currently have 62357 applicants waiting.
You can also choose the  Fast Track option and get your application approved within 24hrs!",
            "post_author"=>"Moahmed Gawish"

        ]);
        return redirect("/posts");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
