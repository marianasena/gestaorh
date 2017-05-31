<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<section id="container" >
    @if (Auth::check())
        @include('menu_side')
    @endif

    @if (Auth::guest())
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header col-md-12">
                    <a class="navbar-brand" href="#">Gestão de RH</a>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li><a href="{{url('login')}}">Acessar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                @include('flash::message')

                @if (count($errors) > 0)
                    @include('layouts.error')
                @endif

                @yield('content')


            </section>
        </section>

</section>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!--Core js-->
<script src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/slimscroll.js') }}"></script>
<script src="{{ asset('js/nicescroll.js') }}"></script>

<!--common script init for all pages-->
<script src="{{ asset('js/scripts.js') }}"></script>

@yield('js_files')
<script type="text/javascript">
    $(document).ready(function(){

        /*active menu links*/
        //$('')

        @yield('js_doc_ready')
    });
</script>
@yield('scripts')
</body>
</html>
