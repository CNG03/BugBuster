<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo2.png" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div style="margin-top: 20px;" class="container">
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
            margin-top: 80px;
            }
        </style>
        @if($errors->has('token_invalid'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        @if($errors->has('token_expired'))
            <div class="alert fixed-top-right" id="errorAlert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>{{ $errors->first() }}!</strong>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <input type="hidden" name="email" value="{{ $email }}">
    
                            <div class="form-group row">
                                <label for="token" class="col-md-4 col-form-label text-md-right">{{ __('Reset Code') }}</label>
    
                                <div class="col-md-6">
                                    <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" required autofocus>
    
                                    @error('token')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                    <a class="btn btn-danger ms-2" href="{{route('access')}}" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
</html>
