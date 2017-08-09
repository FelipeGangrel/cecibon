<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class ProductQuery implements DataQuery
{
    public function data($column, $direction)
    {
        $rows = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.id as Id',
                             'products.name as Nome',
                             'categories.name as Categoria',
                              DB::raw('DATE_FORMAT(products.created_at,"%d/%m/%Y") as Criado'))
                    ->orderBy($column, $direction)
                    ->paginate(10);
                return $rows;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $rows = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.id as Id',
                         'products.name as Nome',
                         'categories.name as Categoria',
                          DB::raw('DATE_FORMAT(products.created_at,"%d/%m/%Y") as Criado'))
                ->where('products.name', 'like', '%' . $keyword . '%')
                ->orWhere('categories.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);
            return $rows;
    }

}