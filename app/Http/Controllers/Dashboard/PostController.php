<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        $posts = Post::paginate(3);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        echo view( 'dashboard.post.create', compact('categories', 'post'));


    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( StoreRequest $request ) {
       // $data = array_merge($request->all(), ['image' => '']);
        Post::create($request->validated());

        return to_route('post.index')->with('status', 'registro creado');

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */

    public function show( Post $post ) {
        return view('dashboard.post.show', compact('post'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */

    public function edit( Post $post ) {
        $categories = Category::pluck('id', 'title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */

    public function update( PutRequest $request, Post $post ) {

        $data = $request->validated();
        if ($data['image'])
        {
           $data['image'] = $filename = time().".".$data['image']->extension();
            $request->image->move(public_path('image'), $filename);
        }
        $post->update($request->validated());

        return to_route('post.index')->with('status', 'registro actualizado');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */

    public function destroy( Post $post ) {
        $post->delete();
        return to_route('post.index')->with('status', 'registro eliminado');
    }
}
