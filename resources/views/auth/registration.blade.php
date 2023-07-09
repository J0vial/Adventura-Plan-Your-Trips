@extends('default_template')
@section('template')

<link rel="stylesheet" href="{{ asset('auth/auth.css') }}">
</head>
<body style="background-image: url('auth/login_background.jpg'); background-size: 1450px">
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
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Have an Account!</h1>
                    <p>To enter your login details press here </p>
                    <button class="ghost" id="signUp" onclick="location.href='/login'">Sign In</button>
                    <p>OR</p>
                    <button class="ghost" id="signUp" style="margin-top:5px" onclick="location.href='/'">GO BACK TO HOMEPAGE</button>
                </div>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="{{ asset('js/auth/auth.js') }}"></script>
@endsection