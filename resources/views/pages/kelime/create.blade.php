@extends('layouts.main')
@section('content')
    <div class="row center-align container">
        <div class="col s12 ">
        <h4>Kelime Oluştur</h4>
        <form action="{{ route('kelime.store') }}" method="POST">
            
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
                <label for="">Örnek Cümle</label>
                <input type="text">
            </div>
        
            
            
            <div class="input-field col-s6">
                <label for="">Kelime Türü</label>
                <input type="text">
            </div>
            
            <input type="submit" value="gönder" class="btn">
        </form>
        </div>
    </div>
@endsection