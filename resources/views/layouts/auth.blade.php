<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>    
        <div id="main" class="row" style="margin-top:5%;">
                @yield('content')
        </div>

        @yield('scripts')
</body>
</html>
