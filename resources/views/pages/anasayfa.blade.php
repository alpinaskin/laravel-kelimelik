@extends('layouts.main')
@section('content')

<div class="container">

@auth
<div class="card-body">
    Giriş yapıldı
   @if (auth()->user()->isAdmin == 1)
       Adminsin
   @endif
</div>
@endauth

@auth

<div class="col s6">
    <div class="card red accent-1">
        <div class="card-title center">Öğrendiğin Kelimeler</div>
        <div class="card-content center">
            <h3>{{$ogrenilen}}</h3>
        </div>
    </div>
</div>

<div class="col s6">
    <div class="card blue accent-1">
        <div class="card-title center">
            Test Ekranına Git
        </div>
        <div class="card-content center">
            <h3><a href="{{route('test.index')}}" class="btn indigo accent-4">TEST</a></h3>
        </div>
    </div>
</div>

<div class="col s6">
    <div class="card orange accent-3">
        <div class="card-title center">
            Öğrenilecek Kelime Ekle
        </div>
        <div class="card-content center">
            <h3><a href="{{route('kelime.index')}}" class="btn indigo accent-4">EKLE</a></h3>
        </div>
    </div>
</div>
@endauth

</div>
@endsection