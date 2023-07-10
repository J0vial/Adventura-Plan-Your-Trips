@extends('default_template')
@section('template')

<link rel="stylesheet" href="{{ asset('auth/auth.css') }}">
</head>
<body style="background-image: Radial-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)),url('home_page/images/header-background.jpg'); background-size: fit">
    


    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <h1 style="color: whitesmoke; position:relative; left:190px;">ADVENTURA</h1>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault" style="position:relative; right:190px;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" >
                    <a href="/">
                        <button class="ghost" id="signUp" style="margin-top:30px" >  GO BACK TO HOMEPAGE</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <div class="container" id="container" style="min-height: 680px;">
        <div class="form-container sign-in-container">
            <form action="{{route('register-user')}}" method="post">
                @if(Session::has('success'))
                <div class = "alert alert-success">{{session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class = "alert alert-danger">{{session::get('fail')}}</div>
                @endif

                @csrf 
                <h1>Create Account</h1>

                <input type="text" placeholder="Name" name = "name" />
                <span class ='text-danger'>@error('name') {{$message}} @enderror</span>

                <input type="email" placeholder="Email" name = "email" />
                <span class ='text-danger'>@error('email') {{$message}} @enderror</span>
                
                <input type="number" placeholder="PhoneNumber" name = "phone_num" />
                <span class ='text-danger'>@error('phone_num') {{$message}} @enderror</span>

                <input type="text" placeholder="Adress" name = "adress" />

                <input type="password" placeholder="Password" name = "pass"/>
                <span class ='text-danger'>@error('pass') {{$message}} @enderror</span>
                

                <button style="margin-top:5px" onclick="location.href='/login'">Sign Up</button>
                

            </form>
        </div>
        <div class="overlay-container" >
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Have an Account!</h1>
                    <p>To enter your login details press here </p>
                    <button class="ghost" id="signUp" onclick="location.href='/login'">Sign In</button>
                    
                </div>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="{{ asset('js/auth/auth.js') }}"></script>
@endsection