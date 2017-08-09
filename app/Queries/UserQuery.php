<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class UserQuery implements DataQuery
{
     public function data($column, $direction)
     {
        $rows = DB::table('users')
                ->select('id as Id', 
                         'name as Nome',
                    DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as Criado'))
                ->orderBy($column, $direction)
                ->paginate(10);
        return $rows;
     }

     public function filteredData($column, $direction, $keyword)
     {
        $rows = DB::table('users')
                ->select('id as Id',
                         'name as Nome',
                    DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as Criado'))
                ->orderBy($column, $direction)
                ->where('users.name', 'like', '%' . $keyword . '%')
                ->paginate(10);
        return $rows;
     }
}