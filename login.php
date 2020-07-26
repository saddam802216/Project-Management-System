<?php

session_start();

$message = '';
$success = true;

if(isset($_SESSION['register']) && !empty($_SESSION['register'])) {
    $obj = $_SESSION['register'];
    if(isset($obj->status) && $obj->status==true) {
        $message = $obj->message;
    }else if(isset($obj->status) && $obj->status==false) {
        $message = $obj->message;
        $success = false;
    }

    unset($_SESSION["register"]);
}

if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {
    $obj = $_SESSION['login'];
    if(isset($obj->status) && $obj->status==false) {
        $success = false;
        $message = $obj->message;
    }
    unset($_SESSION["login"]);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="background-image">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">

                                        <h6 class="<?=$success?'success-message':'error-message'?>" id="hideMe"><?=$message?></h6>
                                        <h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form name="login-form" action="store.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" value="<?=(isset($_COOKIE['remember_me']) && isset($_COOKIE['email']))?$_COOKIE['email']:''?>" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" value="<?=(isset($_COOKIE['remember_me']) && isset($_COOKIE['password']))?$_COOKIE['password']:''?>" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" name="remember" id="rememberPasswordCheck" type="checkbox" <?=(isset($_COOKIE['remember_me']))?'checked':''?> />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember Password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mb-0">
                                                <!-- <a class="small" href="password.php">Forgot Password?</a> -->
                                                <input type="submit" name="login" value="Login" class="btn btn-primary" href="index.php">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php require_once('footer.php') ?>
