
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Đăng nhập app</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />    
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset('auth-assets/login') }}/css/style.css" type="text/css" media="all" />    
    <link rel="stylesheet" href="{{ asset('auth-assets/login') }}/css/font-awesome.min.css" type="text/css" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1>Login form</h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree form-container">
                        <h2>Login</h2>
                        <form action="{{ route('do-login') }}" method="post" data-register-url="{{ route('do-register') }}" data-login-url="{{ route('do-login') }}" class="form-login form-register">
                            @csrf
                            <input login-state register-state type="text" class="text" name="name" placeholder="User Name" required="" autofocus value="">
                            <input register-state type="text" class="text hidden" name="email" placeholder="User Email" required="" autofocus value="" disabled>
                            <input login-state register-state type="password" class="password" name="password" placeholder="User Password" required="" autofocus value="">
                            <input register-state type="password" class="password hidden" name="passwordConfirm" placeholder="User Confirm Password" required autofocus value="" disabled>
                            <button class="btn" type="submit" name="btn_login" login-state>Login</button>
                            <button class="btn hidden" type="submit" name="btn_register" register-state disabled>Register</button>
                        </form>
                        <p class="account" login-state>Don't have an account yet? <a class="a-change-to-register-state" href="#register">Register</a></p>
                        <p class="account hidden" register-state>Already have login and password? <a class="a-change-to-login-state"  href="#login" disabled>Login</a></p>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="{{ asset('auth-assets/login') }}/images/1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>        
    </section>
    <!-- //form section start -->
</body>
<script>
    $(function () {
        $(document).on('click','a.a-change-to-register-state', function(e){
            e.preventDefault();
            // hide all login state
            $('*[login-state]').map((_,_e)=>$(_e).addClass('hidden').attr('disabled', true));
            // show all register state
            $('*[register-state]').map((_,_e)=>$(_e).removeClass('hidden').attr('disabled', false));

            // change url action to
            let _form = $('form.form-login.form-register');
            let _newUrl = $(_form).data('register-url');
            $(_form).attr('action', _newUrl);
        }).on('click','a.a-change-to-login-state', function(e){
            e.preventDefault();
            // hide all register state
            $('*[register-state]').map((_,_e)=>$(_e).addClass('hidden').attr('disabled', true));
            // show all login state
            $('*[login-state]').map((_,_e)=>$(_e).removeClass('hidden').attr('disabled', false));

            // change url action to
            let _form = $('form.form-login.form-register');
            let _newUrl = $(_form).data('login-url');
            $(_form).attr('action', _newUrl);
        });
    });
</script>
</html>