<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        $categories = Category::paginate(3);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $category = new Category();

        echo view( 'dashboard.category.create', compact('category'));


    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( StoreRequest $request ) {
       // $data = array_merge($request->all(), ['image' => '']);
        Category::create($request->validated());

        return to_route('category.index')->with('status', 'registro creado');

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */

    public function show( Category $category ) {
        return view('dashboard.category.show', compact('category'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */

    public function edit( Category $category ) {

        echo view('dashboard.category.edit', compact('category'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */

    public function update( PutRequest $request, Category $category ) {


        $category->update($request->validated());

        return to_route('category.index')->with('status', 'registro actualizado');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */

    public function destroy( Category $category ) {
        $category->delete();
        return to_route('category.index')->with('status', 'registro eliminado');
    }
}
