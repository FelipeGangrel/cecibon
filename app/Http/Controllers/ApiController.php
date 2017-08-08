<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Doctrine\Common\Util\Inflector;

class ApiController extends Controller
{
    protected $userRepo;
    protected $productRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        ProductRepositoryInterface $productRepo
        )
    {
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
    }

    public function userData()
    {
        $query = $this->userRepo->createQueryBuilder('u')
                ->select('partial u.{id, name, email, createdAt}');

        $users = $query->getQuery()->getResult();
        $users = $this->userRepo->prepareToJson($users, ['id','name','email','password', 'createdAt']);
        
        return response()->json($users);
            
    }

    public function productData()
    {
        $query = $this->productRepo->createQueryBuilder('p')
                ->select('
                    partial p.{id, name, category}, 
                    partial c.{name}
                ')
                ->from('\App\Entities\Category', 'c');

        $products = $query->getQuery()->getResult();
        // $result = [];
        //     foreach($products as $product){
        //         $result[] = $product->exportTo('json');
        //     }
        dd($products);
        // $products = $this->productRepo->prepareToJson($products, ['id','name']);

        // dd($products);
        
        return response()->json($products);
    }

    
}


// $qb->select('c')
//     ->innerJoin('c.phones', 'p', 'WITH', 'p.phone = :phone')
//     ->where('c.username = :username');