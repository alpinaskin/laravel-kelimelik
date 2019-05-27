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
            <th>Test Tarihi</th>
            <th>İşlem</th> 
            <th>Doğru Sayısı</th>
          </tr>
        </thead>
    
        <tbody>

        @foreach ($testler as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->created_at}}</td>
            <td><a href="{{route('test.show',$test->id)}}" class="btn orange darken-1">{{__('Sonucu Göster')}}</a></td>
            <td><span class="green-text">{{$test->dogru_sayisi}}</span></td>
        </tr>
        @endforeach
          
        </tbody>
      </table>
      <div class="col s12 center">
        {{$testler->links('vendor.pagination.materializecss')}}
      </div>
</div>
@endsection