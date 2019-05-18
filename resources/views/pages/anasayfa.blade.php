@extends('layouts.main')
@section('content')
@auth
<div class="card-body">
    Giriş yapıldı

   @if (auth()->user()->isAdmin == 1)
       Adminsin
   @endif
</div>
@endauth


@endsection