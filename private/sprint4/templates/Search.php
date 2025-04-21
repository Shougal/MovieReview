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

            <style id="theme"></style>
            <script src="/qvh7fp/sprint4/js/custom.js"></script>
        </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <div class="text-light ml-5">
            <?php
            if (isset($_POST['reviewing'])){
                echo "<h1 class='mt-2 mb-3'> Select A Movie To Review</h1>";
            } else {
                echo "<h1 class='mt-2 mb-3'> Search Results</h1>";
            }
            if (is_array($_SESSION['search_results'])) {
                echo "<div class='row'><div class='col-md-6'>";
                foreach ($_SESSION['search_results'] as $movie) {
                    echo "<div class='row'>
                            <form action='?command=". (isset($_POST['reviewing']) ? 'review' : 'movie') ."' method='post' style='width: 100%;'>
                                <div class='row' style='width: 100%;'>
                                    <input type='hidden' name='title' value='" . $movie['title'] . "'>
                                    <button type='submit' class='card btn btn-text ml-3 mt-1 mb-3 p-0' style='width: 100%;'>
                                        <div class='row'>
                                            <div class='col-sm-6'>
                                                <img src='". $movie['thumbnail_url'] . "' alt = 'Movie Thumbnail' style='width: 100%; height: 12rem; object-fit: cover;'>
                                            </div>
                                            <div class='col-sm-6 d-flex flex-column justify-content-center'>
                                                <h2 style='white-space: normal;'>" . $movie['title'] . "</h2>
                                                <p>" . $movie['bio'] . "</p>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </form>
                    </div>
                    ";
                }
            } else {
                echo "<p>" . $_SESSION['search_results'] . "</p>";
            }
            echo "</div><div class='col-md-6'><form action='?command=add_movie' method='post' class='mr-3' style='float: right;'>
                      Cant Find What You're Looking For?
                      <button type='submit'> Add a New Movie</button>
                  </form>
                  </div></div>";
            ?>
        </div>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>