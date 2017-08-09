<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\ProductQuery;

class ApiController extends Controller
{


    public function userData()
    {
        return 'Meh';  
    }

    public function productData(Request $request)
    {
        return GridQuery::sendData($request, new ProductQuery);
    }

    
}