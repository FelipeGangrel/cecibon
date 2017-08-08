<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use Doctrine\Common\Util\Inflector;

class ApiController extends Controller
{
    protected $repo;
    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function userData()
    {
        $query = $this->repo->createQueryBuilder('u');

        $users = $query->getQuery()->getResult();

        $users = $this->repo->prepareToJson($users, ['id','name','email']);
        
        return response()->json($users);
            
    }

    
}
