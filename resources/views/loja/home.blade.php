@extends('loja.layouts.master')

@section('title')
  <title>Cecibon</title>
@endsection

@section('content')
  
  <div id="home-slides">

    <div class="navigation">
      <div class="wrapper">
        <div class="wrapper2">
          <div class="wrapper3">
            <ul class="list-unstyled">
              <li><button></button></li>
              <li><button></button></li>
              <li><button></button></li>
            </ul> 
          </div>
        </div>
      </div>
    </div>

    @foreach($homeSlides as $slide)
      <div class="slide">
        <div class="wrapper">
          <h2>{{ $slide['title'] }}</h2>
          <span>R$ {{ $slide['price'] }}</span>
          <div class="buttons">
            <a href="#"><button class="button">detalhe</button></a>
            <a href="#"><button class="button">comprar</button></a>
          </div>
          <div class="description">
            {{ $slide['description'] }}
          </div>
        </div>
      </div>
    @endforeach

  </div>
  

  <div id="teste" style="height: 800px"></div>

@endsection