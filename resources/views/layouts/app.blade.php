<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext"> --}}
    
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> 
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

        @yield('styles')
        <script src="{{asset('js/fonst.js')}}"></script>
    </head>
    <body class="">
        <div id='app'>
            <div class="page">
                <div class="page-main">
                    <div class="flex-fill">
                        @include('elements.header')
                        <div class="my-3 my-md-5">
                            <div class="container">
                                @if (Session::has('message'))
                                    <div class="alert alert-{{Session::get('message')['type']}} alert-dismissible fade show" role="alert">
                                        {{Session::get('message')['text']}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</html>