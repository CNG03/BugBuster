<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <title>Bug Buster</title>
    <style>
        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        }

        .alert2 {
        padding: 20px;
        background-color: #36f44f;
        color: white;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }
        .fixed-top-right {
        z-index: 1001;
        border-radius: 7px;
        position: fixed;
        gap: 5px;
        align-items: center;
        display: flex;
        width: 290px;
        top: 0;
        right: 0;
        margin: 20px;
        padding: 18px;
        }
    </style>
</head>

<body>

    <div class="container" id="container">
        @if($errors->has('gg_cancel'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        @if($errors->has('email_exit'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        @if($errors->has('invalidLogin'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        @if($errors->has('email_not_verified'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        @if(session('success'))
            <div class="alert2 fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-check"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{  session('success')  }}!</strong>
            </div>
        @endif
        @if(session('password_reset'))
            <div class="alert2 fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-check"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{  session('password_reset')  }}!</strong>
            </div>
        @endif
        <div class="form-container sign-up">
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a class="ggicon" href="{{route('google-auth')}}" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input name="name" type="text" placeholder="Name" value="{{ old('username') }}" required>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input name="email" type="email" placeholder="Email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input name="password" type="password" placeholder="Password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a class="ggicon" href="{{route('google-auth')}}" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                <input type="password" placeholder="Password" name="password">
                <div style="display: flex; flex-direction: row;width: 100%" >
                    <input style="position: relative; right: 18px; width: 51px; display: inline-block;" type="checkbox" id="gridCheck">
                    <label style="position: relative; right: 29px; top: 6px; display: inline-block;font-size: 13px;font-family: 'Montserrat', sans-serif;"  for="gridCheck">
                        Remember Me
                    </label>
                </div>
                <a href="{{route('password.forgot')}}">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                // Set a timeout to hide the alert after 15 seconds (15000 milliseconds)
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 15000);
            }
        });
    </script>
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>