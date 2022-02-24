<?php

use App\Models\Catalog;
use Illuminate\Database\Seeder;

class Catalogseeder extends Seeder
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
            $catalog = new Catalog();
            $catalog->title="Catalog thu ".$i;
            $catalog->save();
        }
    }
}
