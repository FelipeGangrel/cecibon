<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

class ProductRepositoryTest extends TestCase
{
    protected $productRepo;
    protected $categoryRepo;
    protected static $product;

    public function setup()
    {
        parent::setup();
        $this->productRepo = \App::make(ProductRepositoryInterface::class);
        $this->categoryRepo = \App::make(CategoryRepositoryInterface::class);
    }

    public function testCreateAndSave()
    {      
        $category = $this->categoryRepo->find(1);
    
        $data = [
            'name' => 'foo',
            'category' => $category,
        ];
        
        $produto = $this->productRepo->create($data);
        self::$product = $this->productRepo->save($produto);

        $this->assertDatabaseHas('products', [
            'id' => self::$product->getId()
        ]);
    }

    public function testUpdateAndSave()
    {   
        
        $category = $this->categoryRepo->find(2);
        $data = [
            'name' => 'bar',
            'category' => $category,
        ];

        $produto = $this->productRepo->update($data, self::$product->getId());
        self::$product = $this->productRepo->save($produto);

        $this->assertEquals($data['name'],self::$product->getName());
    }

    
    public function testFindAll()
    {
        $products = $this->productRepo->findAll();
        $this->assertContainsOnlyInstancesOf(\App\Entities\Product::class, $products);
    }

    
    public function testDelete()
    {
        $product = $this->productRepo->find(self::$product->getId());
        $result = $this->productRepo->delete($product);
        $this->assertTrue($result);
    }
}
