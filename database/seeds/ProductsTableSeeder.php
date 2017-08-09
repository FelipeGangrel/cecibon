<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{   

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        entity(App\Entities\Product::class, 10000)->create();
    }

}
