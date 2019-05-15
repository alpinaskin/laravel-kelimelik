@extends('layouts.main')
@section('content')
    <div class="row center-align container">
        <div class="col s12 ">
        <h4>Kelime Oluştur</h4>
        <form action="{{ route('kelime.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="input-field col s6">
                    <label for="">Kelime Adı</label>
                    <input type="text" name="kelime">
                </div>
    
                <div class="input-field col s6">
                    <label for="anlam">Anlamı</label>
                    <input type="text" name="anlam">
                </div>
            </div>
            
            <div class="input-field col-s12">
                <label for="cumle">Örnek Cümle</label>
                <input type="text" name="cumle">
            </div>
        
            
            <div class="row">
                    <div class="input-field col s12">
                            <select name="kelime_tur">
                              <option value="1" selected>Fiil</option>
                              <option value="2">Sıfat</option>
                              <option value="3">İsim</option>
                              <option value="3">Zarf</option>
                            </select>
                            <label>Kelime Türü</label>
                    </div>
            </div>
            
            
            <input type="submit" value="gönder" class="btn">
        </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection