<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    

        <header class="row">
            @include('includes.header')
        </header>
    
        <div id="main" class="row" style="margin-bottom:5%;">
    
                @yield('content')
    
        </div>
    
        <footer class="page-footer" style="bottom:0;position:fixed;width:100%">
            @include('includes.footer')
        </footer>

        @yield('scripts')
</body>
</html>
