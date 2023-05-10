<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('css/mdb-icon-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('img/signin-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Crea una cuenta</a>
                    </div>

                    <div class="signin-form">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <h2 class="form-title">Iniciar Sesión</h2>
                        <form  method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="correo"/>                                
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Contraseña" required/>                                
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            @if (Route::has('password.request'))
                                <a class="text-dark" href="{{ route('password.request') }}">
                                    {{ __('¿Ha olvidado su contraseña?') }}
                                </a>
                            @endif
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Iniciar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>