@extends('layouts.main')
@section('content')
<div class="container">
    <h4 class="center">Öğrenilecek Kelimelerin</h4>
   
      <div class="float right">
        <a href='{{route('kelime.index')}}' class="waves-effect waves-light blue darken-2 btn">Yeni Öğrenilecek Kelime Ekle</a>
      </div>      

    <table class="striped">
        <thead>
          <tr>
            <th>Kelime</th>
            <th colspan="">Anlamı</th>
            <th>Cümle</th>
            <th>Kelime Türü</th> 
          </tr>
        </thead>
    
        <tbody>

          @foreach ($kelimeler as $kelime)
            <tr>
              <td>{{$kelime->kelime_adi}}</td>
              <td>{{$kelime->anlami}}</td>
              <td>{{$kelime->cumle}}</td>
              <td>{{$kelime->tur_id}}</td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
@endsection