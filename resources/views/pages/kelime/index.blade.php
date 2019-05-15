@extends('layouts.main')
@section('content')
    
<div class="container">
    <h4 class="center">Kelimeler</h4>

    <table class="striped">
        <thead>
          <tr>
              <th>Kelime</th>
              <th>Anlamı</th>
              <th>Örnek Cümle</th>
              <th>Kelime Türü</th>
              <th>İşlemler</th>
          </tr>
        </thead>
    
        <tbody>
          <tr>
            <td>Car</td>
            <td>Araba</td>
            <td>He bought a car</td>
            <td>İsim</td>
            <td>
                <a class="waves-effect waves-light orange darken-4 btn-small">Düzenle</a>
                <a class="waves-effect waves-light red darken-4 btn-small">Sil</a></td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td></td>
            <td>
                <a class="waves-effect waves-light orange darken-4 btn-small">Düzenle</a>
                <a class="waves-effect waves-light red darken-4 btn-small">Sil</a>
            </td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
            <td></td>
            <td>Düzenle Sil</td>
          </tr>
        </tbody>
      </table>
</div>

@endsection