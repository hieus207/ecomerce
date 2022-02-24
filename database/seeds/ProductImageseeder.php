<?php

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<20;$i++){
            $img = new ProductImage();
            $img->product_id=$i+1;
            $img->name="tree.png";
            $product = Product::find($i+1);
            $product->ProductImage()->save($img);
        }
    }
}
