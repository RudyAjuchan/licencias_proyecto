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
                        <a href="/registro" class="signup-image-link">Crea una cuenta</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar Sesión</h2>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="usuario"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="usuario" id="usuario" placeholder="Usuario"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Contraseña"/>
                            </div>
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