<!DOCTYPE html>
<html lang="en">
    <head>
        <Title>Login</Title>
        <meta name="author" content="Rob Keys">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:description" content="Login page for the Movie Recommendations website">
        <meta property="og:title" content="Login">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/login.css">
        <link rel="stylesheet" href="styles/shared.css">

        <script src="/qvh7fp/sprint4/js/mode.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>

<?php
            if(isset($_SESSION["message"])){
                echo '<div class="alert alert-danger" role="alert"> '.$_SESSION["message"].'</div>';
            }
        ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="card col-10 mt-5 mb-5">
                <div class="card-header" style="color: black !important;">
                    Create an Account
                </div>
                <div class="card-body">
                    <form action="?command=validate-login" method="post" class="row">
                        <div class="col-5">
                            <div class="row">
                                <label for="username" class="mr-3" style="color: black !important;">Username:</label>
                                <input type="text" placeholder="Username" name="username" id="username" minlength="3" required>
                            </div>
                            <div class="row">
                                <p class="ml-5"></p>
                                <p class="ml-5" style="font-size: 0.75rem;color: black !important;" >Must be at least 3 characters long</p>
                            </div>
                            <div class="row mb-4">
                                <label for="email" class="mr-5" style="color: black !important;">Email:</label>
                                <input type="email" placeholder="Email" name="email" id="email" required>
                            </div>
                            <div class="row">
                                <label for="password" class="mr-4" style="color: black !important;">Password:</label>
                                <input type="password" placeholder="Password" name="password" id="password" minlength="8" required>
                            </div>
                            <div class="row mb-2">
                                <p class="ml-5"></p>
                                <p class="ml-5" style="color: black !important;font-size: 0.75rem;">Must be at least 8 characters long</p>
                            </div>
                            <div class="row">
                                <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
                            </div>
                        </div>
                        <div class="col-5">
                            <p style="color: black !important;">Logging in gives you access to the majority of our wonderful site. You can only leave reviews if you have an account and are signed in. Recommendations are only available for logged in users as well. Without being logged in, we are just a movie search website.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>