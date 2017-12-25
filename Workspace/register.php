<?php include('./php/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 mt-5">
                    <header>
                        <h1>Registration</h1>
                    </header>
                    <form method = "post" action="register.php">
                        <?php include('./php/errors.php') ?>
                        <div class="form-group mt-2">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_1">
                        </div>
                        <div class="form-group mt-2">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_2">
                        </div>
                        <div class="col-md-6">
                            <button class="btn-outline-success btn btn-block mt-3" name="reg_user" 
                             style="width:75%">Sign Up</button>
                        </div><br>
                        <div class="ml-5">
                            <p>Already have account ? <a href="login.php">Sign in</a></p>
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