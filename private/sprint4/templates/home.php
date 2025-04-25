<!DOCTYPE html>
<!--Sources: https://getbootstrap.com/docs/4.6/components/alerts/ -->
<html lang="en">
    <head>
        <Title>MovieReview</Title>
        <meta name="author" content="Rob Keys">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:description" content="Home page for the Movie Recommendations website">
        <meta property="og:title" content="Home Page">
        <meta property="og:type" content="index.txt">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/home.css">
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
        if(isset($_SESSION["message"]) && (!empty($_SESSION["message"]))) {
            echo '<div class="alert alert-success" role="alert"> '.$_SESSION["message"].'</div>';
        }
        ?>

        <h1 class="mt-2 mb-4 ml-3"><?php
            if(isset($_SESSION["username"])){
                echo $_SESSION["username"];
            } else {
                echo 'Guest';
            }
            ?>'s Top Movies</h1>

        <?php
            $top_movie_index = "0";
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/FavMovie.php");
          ///include("/opt/src/sprint4/components/FavMovie.php");
        ?>

        <?php
        $top_movie_index = "1";
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/FavMovie.php");
      ///include("/opt/src/sprint4/components/FavMovie.php");
        ?>

        <?php
        $top_movie_index = "2";
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/FavMovie.php");
      ///include("/opt/src/sprint4/components/FavMovie.php");
        ?>

        <div class="container-xxl m-3">
            <div class="card fav-movie-card m-0 p-0">
                <div class="row align-items-center">
                    <div class="col-md-6 ml-5 mt-4 mb-1">
                        <p class="text-light">Looking to add to your top 3? Revise your ratings or search for new movies!</p>
                    </div>
                    <form class="col-md-2" action="?command=user_movies" method="POST">
                        <button type="submit" class="btn btn-light fav-button">Your Movies</button>
                    </form>
                    <form class="col-md-3" action="?command=recommendations" method="POST">
                        <button type="submit" class="btn btn-primary fav-button">View Your Recommendations -></button>
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