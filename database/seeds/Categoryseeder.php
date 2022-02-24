<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<5;$i++){
            $category = new Category();
            $category->name="category thu ".$i;
            $category->catalog_id=1;
            $category->save();
        }
    }
}
