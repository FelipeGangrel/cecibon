<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function home()
    {
        $homeSlides = [
            ['title' => 'Cecibón almofada multifuncional',
            'price'=> 250.00,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'],
            ['title' => 'Cecibón sling porta bebê',
            'price'=> 350.00,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'],
            ['title' => 'Trocador antirrefluxo',
            'price'=> 650.00,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'],
        ];

        return view('loja.home', compact('homeSlides'));
    }

    public function produtos()
    {   
        return view('loja.produtos');
    }

    public function sobre()
    {
        return view('loja.sobre');
    }

    public function blog()
    {
        return view('loja.blog');
    }

    public function contato()
    {
        return view('loja.contato');
    }
}
