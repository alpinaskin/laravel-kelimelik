@extends('layouts.main')
@section('content')
    <div class="row center-align container">
        <div class="col s12">
        <h4>Kelime Düzenle</h4>
    <form class="col s10"action="{{ route("kelime.update", $kelime->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="input-field col s6">
                    <label for="kelime">Kelime Adı</label>
                <input type="text" name="kelime" value="{{ $kelime->kelime_adi}}">
                </div>
    
                <div class="input-field col s6">
                    <label for="anlam">Anlamı</label>
                <input type="text" name="anlam" value="{{ $kelime->anlami}}">
                </div>
            </div>
            
            <div class="input-field col-s12">
                <label for="aciklama">Örnek Cümle</label>
            <input type="text" name="cumle" value="{{ $kelime->cumle}}">
            </div>

            <div class="row">
                <div class="input-field col s12">
                        <select name="kelime_tur">
                            <option value="1"  {{$kelime->tur_id === 1 ? 'selected': ''}}>Fiil</option>
                            <option value="2" {{$kelime->tur_id === 2 ? 'selected': ''}}>Sıfat</option>
                            <option value="3" {{$kelime->tur_id === 3 ? 'selected': ''}}>İsim</option>
                            <option value="4" {{$kelime->tur_id === 4 ? 'selected': ''}}>Zarf</option>
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