
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

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1>Login form</h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree">
                        <h2>Login</h2>
                        <form action="{{ route('do-login') }}" method="post">
                            @csrf
                            <input type="text" class="text" name="name" placeholder="User Name" required="" autofocus value="">
                            <input type="password" class="password" name="password" placeholder="User Password" required="" autofocus value="">
                            <button class="btn" type="submit" name="btn_login">Login</button>
                        </form>
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

</html>