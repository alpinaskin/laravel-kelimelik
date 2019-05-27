@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            @foreach ( $sorular as $soru)
            <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Soru {{$loop->iteration}} Aşağıdakilerden hangisi {{ $soru->kelime()->first()->anlami }} kelimesinin karşılığıdır?</span>
                    <br>
                            <p>
                                Cevabınız : {{$cevaplar[$loop->iteration - 1]}}
                            </p>
                            @if ($cevaplar[$loop->iteration - 1] == $soru->kelime()->first()->kelime_adi)
                                <h3 class="green accent-3">Doğru</h3>
                            @else
                                <h3 class="red accent-3">Yanlış</h3>   
                            @endif
                            
                        </div>
                    </div>        
                    @endforeach
        </div>
    </div>
</div>
@endsection