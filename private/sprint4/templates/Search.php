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
        </head>
    <body>
        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
        // include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <div class="text-light">
            <h1>Search Results</h1>
            <?php
            if (is_array($_SESSION['search_results'])) {
                foreach ($_SESSION['search_results'] as $movie) {

                    echo "<div><h2>" . htmlspecialchars($movie['title']) . "</h2>";
                    echo "<p>" . htmlspecialchars($movie['bio']) . "</p></div>";
                }
            } else {
                echo "<p>" . $_SESSION['search_results'] . "</p>";
            }
            ?>
        </div>

        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
        // include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>