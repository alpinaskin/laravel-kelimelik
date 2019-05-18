@extends('layouts.main')
@section('content')
    
<div class="container">
    <h4 class="center">Kelimeler</h4>
    @auth
    @if(auth()->user()->isAdmin)
      <div class="float right">
        <a href='{{route('kelime.create')}}' class="waves-effect waves-light blue darken-2 btn">Yeni Kelime Ekle</a>
      </div>      
    @endif
  @endauth

    <table class="striped">
        <thead>
          <tr>
              <th>Kelime</th>
              <th>Anlamı</th>
              <th>Örnek Cümle</th>
              <th>Kelime Türü</th>
              @auth
                  @if(auth()->user()->isAdmin)
                    <th colspan="2">İşlemler</th>
                  @endif
              @endauth
          </tr>
        </thead>
    
        <tbody>

          @foreach ($kelimeler as $kelime)
          <tr>
              <td>{{$kelime->kelime_adi}}</td>
              <td>{{$kelime->anlami}}</td>
              <td>{{$kelime->cumle}}</td>
              <td>{{$kelime->tur_id}}</td>

              @auth
                  @if(auth()->user()->isAdmin)
                    <td><a href="{{ route('kelime.edit',$kelime->id)}}" class="waves-effect waves-light orange darken-2 btn-small">Düzenle</a></td>
                    <td>
                        <form action="{{ route('kelime.destroy', $kelime->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="waves-effect waves-light red darken-4 btn-small" type="submit">SİL</button>
                          </form>
                    </td>      
                  @endif
              @endauth
              
            </tr>
          @endforeach
          
        </tbody>
      </table>
</div>

@endsection