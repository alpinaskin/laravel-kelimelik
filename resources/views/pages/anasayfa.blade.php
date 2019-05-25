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

<div class="col s6">
    <div class="card blue-grey darken-1">
        <div class="card-title center lght-blue">Öğrendiğin Kelimeler</div>
        <div class="card-content">
            10
        </div>
    </div>
</div>

<div class="col s6">
    <div class="card blue-grey darken-1">
        <div class="card-title center blue">
            aa
        </div>
        <div class="card-content">
            TEST
        </div>
    </div>
</div>

<div class="col s6">
    <div class="card blue-grey darken-1">
        <h4></h4>
        <div class="card-content">
            KELİME
        </div>
    </div>
</div>

</div>
@endsection