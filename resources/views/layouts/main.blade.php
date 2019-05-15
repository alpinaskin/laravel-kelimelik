<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    

        <header class="row">
            @include('includes.header')
        </header>
    
        <div id="main" class="row">
    
                @yield('content')
    
        </div>
    
        <footer class="row">
            @include('includes.footer')
        </footer>

        @yield('scripts')
</body>
</html>
