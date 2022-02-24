<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class Productseeder extends Seeder
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
            $product = new Product();
            $product->name="product thu ".$i;
            $product->category_id=1;
            $product->quantity=50;
            $product->description="53454avb";
            $product->specification="vavbsgva";
            $product->price=56000;
            $product->save();
        }
    }
}
