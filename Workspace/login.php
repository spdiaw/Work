<?php include('./php/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <meta name="google-signin-client_id" content="133603259910-eilbjjoea19ctcvk1m29rv65fab4bpek.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 mt-5">
                    <header>
                        <h1>Login</h1>
                    </header>
                    <form  method = "post" action="login.php">
                    <?php include('./php/errors.php') ?>
                        <div class="form-group mt-2">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        <div class="col-md-6">
                            <button class="btn-outline-success btn btn-block mt-3" name="login_user"
                            style="width:75%">Sign In</button>
                        </div><br>
                        <div class="ml-5">
                            <p>Not have an account ? <a href="register.php">Sign Up</a></p>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
</body> 
</html>