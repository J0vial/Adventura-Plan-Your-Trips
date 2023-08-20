@extends('default_template')
@section('template')
    <link href="{{ asset('home_page/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('home_page/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{ asset('home_page/css/swiper.css')}}" rel="stylesheet">
	<link href="{{ asset('home_page/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{ asset('home_page/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('auth/auth.css') }}">
</head>
<body style="background-image: Radial-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)),url('home_page/images/header-background.jpg') ; background-size: fit">
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <h1 style="color:whitesmoke;font: 700 2.5rem/3rem "Montserrat", sans-serif;">ADVENTURA</h1>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" >
                    <a href="{{ route('trips') }}">
                        <button class="ghost" id="signUp" > GO BACK </button>
                    </a>
                </li>
            </ul>
        
        </div>
    </nav> <!-- end of navbar -->
    
    <div class="container" id="container" style="min-height: 500px;">
        
        <form action="{{ route('transactionTrip') }}" method="post">
            @csrf <!-- Include CSRF token -->

            <div class="form-group">
                <label for="exampleInputEmail1">Phone num to send bkash</label>
                <input type="text" class="form-control" name='num' id="num" aria-describedby="emailHelp" placeholder="Enter Phone num">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Transaction ID</label>
                <input type="text" class="form-control" name='transaction' id="transaction" aria-describedby="emailHelp" placeholder="Enter Transaction ID">
                <input type="hidden" class="form-control" name="id" id="id" value={{$id}}>
            </div>
            
            <button type="submit" class="btn-solid-lg page-scroll">Submit</button>
        </form>

    </div>
    <script type="text/javascript" src="{{ asset('js/auth/auth.js') }}"></script>
@endsection
