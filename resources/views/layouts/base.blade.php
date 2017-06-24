<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

 @include('layouts.header')

<body class="body1">

        @unless (Auth::guest())
            @include('layouts.navbar')
        @endunless
        
        <div class="container">
            

        @yield('content')
        </div>
        

</body>


</html>