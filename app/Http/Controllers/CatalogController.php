<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatalogRequest;


class CatalogController extends Controller
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
        $catalogs=Catalog::paginate($page);
        return view('catalog.list',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalog.create');
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
        $catalog = new Catalog;
        $catalog->title=$request->title;
        $catalog->content=$request->content;
        $catalog->save();
        // return redirect(route('catalog.create'));
        return redirect()->route('catalog.index')->with('msg','Dang bai thanh cong');
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
        $catalog = Catalog::find($id);
        return view('catalog.edit',compact('catalog'));
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
        $catalog = Catalog::find($id);
        $catalog->title=$request->title;
        $catalog->content=$request->content;
        $catalog->save();
        return redirect(route('catalog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();
        return redirect(route('catalog.index'));
    }


}
