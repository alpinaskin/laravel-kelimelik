@extends('layouts.main')
@section('content')
<div class="container">
    <h4 class="center">Testler</h4>

    <div class="float right">
        <a href='{{route('test.create')}}' class="waves-effect waves-light blue darken-2 btn">Yeni Teste Başla</a>
    </div>  

    <table class="striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Tarih</th>
            <th colspan="2">İşlemler</th> 
          </tr>
        </thead>
    
        <tbody>

        @foreach (Auth::user()->test as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->created_at}}</td>
            <td>Göster</td>
            <td></td>
        </tr>
        @endforeach
          
        </tbody>
      </table>
</div>
@endsection