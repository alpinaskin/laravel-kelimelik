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
                 <th colspan="2">İşlemler</th>
              @endauth
          </tr>
        </thead>
    
        <tbody>

          @foreach ($kelimeler as $kelime)
          <tr>
              <td>{{$kelime->kelime_adi}}</td>
              <td>{{$kelime->anlami}}</td>
              <td>{{$kelime->cumle}}</td>
              <td>{{$kelime->kelime_turu()->first()->tur}}</td>

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
                    @else
                    
                    @if(!Auth::user()->ogrenilecekKelimeler()->where('kelime_id', $kelime->id)->exists())
                      <td>
                        <form action="{{ route('kelime.ogrenilecekKelimeKaydet', $kelime->id)}}" method="POST">
                            @csrf
                            <button class="waves-effect waves-light blue darken-4 btn-small" style="position:inherit" type="submit">Öğrenilecek Kelime Ekle</button>
                        </form>
                      </td>
                      @else
                      <td>
                        <form action="{{ route('kelime.ogrenilecekKelimeCikar', $kelime->id)}}" method="POST">
                            @csrf
                            <button class="waves-effect waves-light red darken-4 btn-small" style="position:inherit" type="submit">Kelime Çıkar</button>
                          </form>
                      </td>
                      @endif
                  @endif
              @endauth
              
            </tr>
          @endforeach
          
        </tbody>
      </table>

      <div class="col s12 center">
        {{$kelimeler->links('vendor.pagination.materializecss')}}
      </div>
</div>

@endsection