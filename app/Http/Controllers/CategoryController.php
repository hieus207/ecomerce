<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatalogRequest;

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
        $page = config('constants.PAGINATE');
        $categories=Category::paginate($page);
        return view('category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $catalogs=Catalog::all();
        return view('category.create',compact('catalogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalogRequest $request)
    {
        //
        $category = new Category();
        // $category->Catalog()->catalog_id=$request->catalog_id;
        $category->name=$request->name;
        $category->description=$request->description;
        $catalog = Catalog::find($request->catalog_id);
        $catalog->Category()->save($category);
        return redirect()->route('category.index')->with('msg',$catalog->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $catalogs = Catalog::all();

        $category = Category::find($id);
        $of_catalog = Catalog::find($category->catalog_id);
        return view('category.edit',compact('category','catalogs','of_catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCatalogRequest $request, $id)
    {
        //
        $category = Category::find($id);
        $category->catalog_id=$request->catalog_id;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return redirect(route('category.index'));
    }
}
