<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tags;
use Illuminate\Http\Request;
use ProductTag;

class ProductController extends Controller
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
        $products=Product::paginate($page);
        return view('product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tags::all();
        $categories=Category::all();
        return view('product.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $tag_ids = $request->tags_id;
        $product = new Product();
        // $category->Catalog()->catalog_id=$request->catalog_id;
        $product->status=$request->status;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->specification=$request->specification;
        $product->price=$request->price;
        $product->quantity=$request->quantity;


        $product->tags()->sync($tag_ids);

        $category = Category::find($request->category_id);
        $category->Product()->save($product);

        $prodImg = new ProductImage;
        $productImgs=str_replace(['"','[',']'],'',explode(",",$request->image_list));

        foreach($productImgs as $img){
            $prodImg = new ProductImage;
            $prodImg->name = $img;
            $prodImg->product_id = $product->id;
            $product->ProductImage()->save($prodImg);
        }

        return redirect()->route('product.index')->with('msg',"them san pham thanh cong");
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

    public function CategoryShow($category_id){

        $show_page = config('constants.SHOW_PAGINATE');
        $products = Product::where('category_id',$category_id)->paginate($show_page);
        return view('product.showlist',compact('products'));
    }

    public function CatalogShow($catalog_id){

        $show_page = config('constants.SHOW_PAGINATE');
        $cate_id = Category::select('id')->where('catalog_id',$catalog_id)->get();
        $products = Product::whereIn('category_id',$cate_id)->paginate($show_page);
        return view('product.showlist',compact('products'));
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
        $categories = Category::all();
        $tags = Tags::all();
        $product = Product::find($id);
        $of_category = Category::find($product->category_id);
        return view('product.edit',compact('product','categories','of_category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag_ids = $request->tags_id;
        //
        $product = product::find($id);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->status=$request->status;
        $product->description=$request->description;
        $product->specification=$request->specification;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->save();
        $product->tags()->sync($tag_ids);

        if($request->input('image_list')){
            $productImgs=str_replace(['"','[',']'],'',explode(",",$request->image_list));
            // dd();
            foreach(ProductImage::where('product_id',$product->id)->get() as $img){
                // dd($img);
                if(!in_array($img->name,$productImgs)){
                    ProductImage::where('id',$img->id)->delete();
                }
            }
            foreach($productImgs as $img_name){
                // dd($product->ProductImage()->pluck('name')->toArray());
                if(!in_array($img_name,$product->ProductImage()->pluck('name')->toArray())){
                    $prodImg = new ProductImage;
                    $prodImg->name = $img_name;
                    $prodImg->product_id = $product->id;
                    $product->ProductImage()->save($prodImg);
                }
            }
        }
        else
        {
            ProductImage::where('product_id',$product->id)->delete();
        }
        return redirect(route('product.index'));
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
        $product = product::find($id);
        $product->delete();
        return redirect(route('product.index'));
    }
}
