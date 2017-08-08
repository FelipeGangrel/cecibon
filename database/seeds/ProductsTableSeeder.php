<?php

use Illuminate\Database\Seeder;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class ProductsTableSeeder extends Seeder
{   
    protected $catRepo;
    protected $prodRepo;

    public function __construct(
        CategoryRepositoryInterface $catRepo,
        ProductRepositoryInterface $prodRepo
        )
    {
        $this->catRepo = $catRepo;
        $this->prodRepo = $prodRepo;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        entity(App\Entities\Product::class, 20)
            ->create()
            ->each(function($product){
                $catId = rand(1,10);
                $category = $this->catRepo->find($catId);
                $product->setCategory($category);
                $this->prodRepo->save($product);
            });
    }

}
