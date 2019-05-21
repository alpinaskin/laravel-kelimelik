@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
            <span class="card-title">1) Aşağıdakilerden hangisi {{ $kelime->kelime_adi }} kelimesinin karşılığıdır?</span>
            <br>
            <form action="">
                    <p>
                        <label class="white-text">
                            <input name="group" type="radio" checked="checked" />
                        <span>{{$kelime->anlami}}</span>
                        </label>
                    </h2>
                    <p>
                        <label class="white-text">
                            <input name="group" type="radio" />
                            <span>Soru 2</span>
                        </label>
                    </p>
                    <p>
                        <label class="white-text">
                            <input name="group" type="radio" />
                            <span>Soru 3</span>
                        </label>
                    </p>
                    <p>
                        <label class="white-text">
                            <input name="group" type="radio" />
                            <span>Soru 4</span>
                        </label>
                    </p>
            </form>
            
            </div>
            <div class="card-action">
            <a href="#">Geri</a>
            <a href="#">Sonraki</a>
            <a href="#">Bitir</a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection