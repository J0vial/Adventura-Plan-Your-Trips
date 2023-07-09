@extends('default_template')
@section('template')

<link rel="stylesheet" href="{{ asset('auth/auth.css') }}">
</head>
<body style="background-image: url('auth/login_background.jpg'); background-size: 1450px">
    <div class="container" id="container" style="min-height: 680px;">
        
        <div class="form-container sign-in-container">
            <form action="{{route('login-user')}}" method='post'>
                @if(Session::has('success'))
                <div class = "alert alert-success">{{session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class = "alert alert-danger">{{session::get('fail')}}</div>
                @endif
                @csrf
                <h1>Sign in</h1>

                <input type="email" placeholder="Email" name = "email"  />
                <span class ='text-danger'>@error('email') {{$message}} @enderror</span>

                <input type="password" placeholder="Password" name = "pass" />
                <span class ='text-danger'>@error('pass') {{$message}} @enderror</span>


                <!-- <a href="#">Forgot your password?</a> -->
                
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Are you NEW!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp" onclick="location.href='/register'">Sign Up</button>
                    <p>OR</p>
                    <button class="ghost" id="signUp" style="margin-top:5px" onclick="location.href='/'">GO BACK TO HOMEPAGE</button>
                </div>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="{{ asset('js/auth/auth.js') }}"></script>
@endsection
