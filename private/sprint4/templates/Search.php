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
            <script src="/qvh7fp/sprint4/js/mode.js"></script>
            <script src="/qvh7fp/sprint4/js/search.js"></script>
        </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <div class="text-light ml-5">
            <?php
            if (isset($_POST['reviewing'])){
                echo "<h1 class='mt-2 mb-3'> Search for A Movie To Review</h1>";
            } else {
                echo "<h1 class='mt-2 mb-3'> Search Results</h1>";
            }
            echo "<div class='row'><div class='col-md-12'>";
            if (is_array($_SESSION['search_results'])) {
                $count = 0;
                echo "<div>";
                foreach ($_SESSION['search_results'] as $movie) {
                    if ($count % 3 ==0) {
                        echo "</div><div class='row'>";
                    }
                    $count++;
                    echo "<div class='col-md-4'>
                            <form action='?command=". (isset($_POST['reviewing']) ? 'review' : 'movie') ."' method='post' style='width: 100%;'>
                                <div class='row' style='width: 100%;'>
                                    <input type='hidden' name='imdbID' value='" . $movie['imdbID'] . "'>
                                    <button type='submit' class='card btn btn-text ml-3 mt-1 mb-3 p-0' style='width: 100%;'>
                                        <div class='row'>
                                            <div class='col-sm-6'>
                                                <img src='". $movie['Poster'] . "' alt = '".$movie['Title']." Poster' style='width: 100%; height: 12rem; object-fit: cover;'>
                                            </div>
                                            <div class='col-sm-6 d-flex flex-column justify-content-center'>
                                                <h2 style='white-space: normal;'>" . $movie['Title'] . "</h2>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    ";
                }
                echo "</div>";
            } else {
                if(isset($_POST['reviewing'])){
                    // <script src="/qvh7fp/sprint4/js/search.js"></script> //TODO;
                    echo '<form class="form-inline my-2 my-lg-0 mr-auto" method="get">
                                <input type="hidden" name="command" value="search">
                                <div class="d-flex flex-column" style="position: relative;">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search All Movies" aria-label="Search" name="query" id="search-bar-js">
                                    <div id="search-results-container" style="position: absolute; z-index: 1000; margin-top:3rem; background-color: white; color: black; border-radius: 50px;">
                                    </div>
                                </div>
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>';
                    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                } else {
                    echo "<p>" . $_SESSION['search_results'] . "</p>";
                }
            }
            ?>
        </div>
        </div>
        </div>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>