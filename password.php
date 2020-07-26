<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Password</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        <!-- <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div> -->
                                        <form action="store.php" name="change_password_form" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNewPassword"></label>
                                                <input type="text" name="password" class="form-control py-4" id="inputNewPassword" placeholder="Enter New Password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mb-0">
                                                <!-- <a class="small" href="login.php">Return to login</a> -->
                                                <input type="submit" name="submit_save_password" class="btn btn-primary" value="Save Password" />
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