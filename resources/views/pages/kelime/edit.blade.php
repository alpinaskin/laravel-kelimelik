@extends('layouts.main')
@section('content')
    <div class="row card center-align container">
        <h4>Kelime Düzenle</h4>
        <form class="col s10"action="{{ route("") }}" method="PUT">
            <div class="row">
                <div class="input-field col s6">
                    <label for="">Kelime Adı</label>
                    <input type="text">
                </div>
    
                <div class="input-field col s6">
                    <label for="">Anlamı</label>
                    <input type="text">
                </div>
            </div>
            
                <div class="input-field col-s12">
                    <label for="">Açıklama</label>
                    <input type="text">
                </div>

            <div class="input-field col-s6">
                <label for="">Kelime Türü</label>
                <input type="text">
            </div>
            
            
            <input type="submit" value="gönder" class="btn">
        </form>
    </div>
@endsection