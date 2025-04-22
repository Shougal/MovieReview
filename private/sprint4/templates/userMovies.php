<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Movies</title>
        <meta name="author" content="Shoug Alharbi">

        <!-- Meta Tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta property="og:description" content="A page consisting of user's current movie selection" >
        <meta property="og:title" content="User Movies" >
        <meta property="og:type" content="userMovies.txt" >
        <!--TODO: Add open graph metadata url and image -->

        <!--BootStrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Custom CSS-->
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
            $sql = "SELECT id FROM  users_final WHERE email = '".$_SESSION["email"]."';";
            $user_id = $this->db->query($sql)[0]["id"];
            $sql =  "SELECT * FROM reviews_final where user_id = '".$user_id."';";
            $reviews =  $this->db->query($sql);
            foreach ($reviews as $review) {
                $imdbID = $review['imdbID'];
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/ReviewedMovie.php");
              ///include("/opt/src/sprint4/components/ReviewedMovie.php");
            }
        ?>

        <div class="container-xxl m-3">
            <div class="card fav-movie-card m-0 p-0">
                <div class="row align-items-center">
                    <div class="col-md-6 ml-5 mt-4 mb-1">
                        <p class="text-light">Want to review more movies? Find a movie to watch or leave a review now!</p>
                    </div>
                    <form class="col-md-2" action="?command=recommendations" method="POST">
                        <button type="submit" class="btn btn-light fav-button">Your Recommendations</button>
                    </form>
                    <form class="col-md-3" action="?command=search" method="POST">
                        <input type="hidden" name="reviewing" value="true">
                        <button type="submit" class="btn btn-primary fav-button">Leave a Review</button>
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