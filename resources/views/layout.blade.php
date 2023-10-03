<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- @if(!empty($SettingData)) -->
    <title>
        App
        <!-- {{ $SettingData->site_name }} -->

    </title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($SettingData->fav_icon)}}">
    <!-- @endif -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm/jquery-confirm.min.css') }}">
    <link href="{{ asset('css/jquery-ui.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/Timepicker/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/jquery.dataTables.min.css') }}">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet"> -->
        
    <!-- multi select css -->
    <link href="{{ asset('css/multiselect_dropdown/bootstrap-multiselect.css')}}" rel="stylesheet" />
    <!-- End multi select css -->
        
    <!-- <link rel="stylesheet" href="{{asset('js/jstree/dist/themes/default/style.min.css')}}" type="text/css"/> -->

    @if(env('ALP_SERVER')=='localhost')
    <link href="{{ asset('css/backend-style.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/backend-style.min.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('css/admin_dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}"/>
    <link href="{{asset('css/jquery.timepicker.min.css')}}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery/3.4.1/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.cookie.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>        
        var BASE_URL = "{{ URL::to('/') }}";
        var CSRF_TOKEN = "{{ csrf_token() }}";
        var APP_ENV = "{{env('APP_ENV','local')}}";
        var ALP_SERVER = "{{env('ALP_SERVER')}}";
        var APP_LANGUAGE = "{{app()->getLocale()}}";
    </script>

    <!-- Start Load language js file -->
    @if(app()->getLocale() == 'en')
        @if(env('ALP_SERVER')=='localhost')
        <script type="text/javascript" src="{{ asset('js/languages/language_en.js')}}"></script>
        @else
        <script type="text/javascript" src="{{ asset('js/languages/language_en.min.js')}}"></script>
        @endif
    @endif
    @if(app()->getLocale() == 'ch')
        @if(env('ALP_SERVER')=='localhost')
        <script type="text/javascript" src="{{ asset('js/languages/language_ch.js')}}"></script>
        @else
        <script type="text/javascript" src="{{ asset('js/languages/language_ch.min.js')}}"></script>
        @endif
    @endif
    <!-- End Load language js file -->
    
</head>
<body>
    <!-- <div class="loader"></div> -->
    <!-- <div id="cover-spin"></div> -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')

    <!--  JS File -->
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" ></script>
	
    <!-- js for multiselect Start -->
    <script src="{{ asset('js/multiselect_dropdown/bootstrap-multiselect.js') }}"></script>
    <!-- js for multiselect End -->

    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/Timepicker/jquery.timepicker.min.js') }}"></script> 
        
    <!-- Start For Searchable Dropdown -->
    <script src="{{asset('js/select2.min.js')}}"></script>
    <!-- End For Searchable Dropdown -->

    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/moment.js') }}"></script>
    <script src="{{ asset('js/datatables/datetime-moment.js') }}"></script>

    {{-- for inpt mask --}}
    <script src="{{ asset('js/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('js/input-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/input-mask/input_mask_validation.js') }}"></script>

    <script src="{{asset('js/jquery.timepicker.min.js')}}"></script>

    {{-- @if(env('ALP_SERVER')=='localhost') --}}
    <script src="{{ asset('js/script.js') }}" defer></script>
    {{-- @else
    <script src="{{ asset('js/script.min.js') }}" defer></script>
    @endif --}}
    <script href="{{ asset('js/admin_dashboard.js') }}" defer></script>
    <script src="{{ asset('js/scroll.js') }}" defer></script>
</body>
</html>
