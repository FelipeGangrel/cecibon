<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use App\Queries\GridQueries\Contracts\DataQuery;

class GridQuery
{
    public static function sendData(Request $request, DataQuery $query)
    {

        // configurando ordenação por coluna

        list($column, $direction) = static::setSort($request);

        // buscando por palavras chave com colunas ordenadas

        if($request->has('keyword')){
            return static::keywordFilter($request, $query, $column, $direction);
        }

        // retorna dados

        return static::getData($query, $column, $direction);

    }

    public static function setSort(Request $request)
    {
        // setando coluna e ordenação padrão
        $column = 'id';
        $direction = 'asc';

        if ($request->has('column')) {
            $column = $request->get('column');
        if ($column == 'Id') {
            $direction = $request->get('direction') == 1 ? 'asc' : 'desc';
            return [$column, $direction];
        } else {
            $direction = $request->get('direction') == 1 ? 'desc' : 'asc';
            return [$column, $direction];
            }
        }
        return [$column, $direction];
    }

    public static function keywordFilter(Request $request, $query, $column, $direction)
    {
        $keyword = $request->get('keyword');
        return response()->json($query->filteredData($column, $direction, $keyword));
    }

    public static function getData($query, $column, $direction)
    {
        return response()->json($query->data($column, $direction));
    }


}