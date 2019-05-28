@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <form action="{{route('test.store')}}" method="POST">
                @csrf
                <input type="hidden" name="test_id" value="{{$test->id}}">
            @foreach ( $test->soru as $soru)
            <?php $random = rand(1,4); ?>
            <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">{{$loop->iteration}}) Aşağıdakilerden hangisi {{ $soru->kelime()->first()->anlami }} kelimesinin karşılığıdır?</span>
                    <br>
                            <p>
                                <label class="white-text">
                                    <input name="{{$loop->iteration}}" type="radio" checked="checked" value="{{$random === 1 ? $soru->cevap()->first()->dogru_cevap : $soru->cevap()->first()->yanlis4_cevap}}"/>
                                <span>@if ($random == 1)
                                    {{$soru->cevap()->first()->dogru_cevap}}
                                    @else
                                    {{$soru->cevap()->first()->yanlis4_cevap}}
                                @endif</span>
                                </label>
                            </h2>
                            <p>
                                <label class="white-text">
                                    <input name="{{$loop->iteration}}" type="radio" value="{{$random === 2 ? $soru->cevap()->first()->dogru_cevap : $soru->cevap()->first()->yanlis1_cevap}}"/>
                                    <span>
                                        @if ($random == 2)
                                            {{$soru->cevap()->first()->dogru_cevap}}
                                        @else
                                            {{$soru->cevap()->first()->yanlis1_cevap}}
                                        @endif</span>
                                </label>
                            </p>
                            <p>
                                <label class="white-text">
                                    <input name="{{$loop->iteration}}" type="radio" value="{{$random === 3 ? $soru->cevap()->first()->dogru_cevap : $soru->cevap()->first()->yanlis2_cevap}}"/>
                                    <span>
                                            @if ($random == 3)
                                            {{$soru->cevap()->first()->dogru_cevap}}
                                        @else
                                            {{$soru->cevap()->first()->yanlis2_cevap}}
                                        @endif</span>
                                </label>
                            </p>
                            <p>
                                <label class="white-text">
                                    <input name="{{$loop->iteration}}" type="radio" value="{{$random === 4 ? $soru->cevap()->first()->dogru_cevap : $soru->cevap()->first()->yanlis3_cevap}}"/>
                                    <span>
                                            @if ($random == 4)
                                            {{$soru->cevap()->first()->dogru_cevap}}
                                        @else
                                            {{$soru->cevap()->first()->yanlis3_cevap}}
                                        @endif
                                    </span>
                                </label>
                            </p>
                            
                        </div>
                    </div>        
                    @endforeach
                    <button type="submit" class="btn green">Gönder</button>
                </form>
                
        </div>
    </div>
</div>
@endsection