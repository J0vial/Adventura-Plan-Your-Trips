@extends('default_template')
@section('template')

<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
</head>
<body>
    <div class="container" id="container" style="min-height: 650px;">
        
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
                <div class="social-container">
                    <a href="#" class="fa fa-facebook"></a>
                </div>
                <span>or use your account</span>

                <input type="email" placeholder="Email" name = "email"  />
                <span class ='text-danger'>@error('email') {{$message}} @enderror</span>

                <input type="password" placeholder="Password" name = "pass" />
                <span class ='text-danger'>@error('pass') {{$message}} @enderror</span>


                <a href="#">Forgot your password?</a>
                
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Are you NEW!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp" onclick="location.href='/register'">Sign Up</button>
                </div>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="{{ asset('js/auth/auth.js') }}"></script>
@endsection
