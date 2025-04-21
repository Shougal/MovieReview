<!DOCTYPE html>
<html lang="en">
    <head>
        <Title>Login</Title>
        <meta name="author" content="Rob Keys">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:description" content="Movie page for the Movie Recommendations website">
        <meta property="og:title" content="Movie">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/movie.css">
        <link rel="stylesheet" href="styles/shared.css">

        <script src="/qvh7fp/sprint4/js/custom.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>
        <?php if(isset($_POST["title"])):
            $sql = "SELECT * FROM movies_final WHERE title='" . $_POST["title"] . "'";
            $movie = $this->db->query($sql)[0];
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 p-0 m-0 my-auto">
                                <img src="<?=$movie["thumbnail_url"]?>" alt="<?= $movie["title"] ?> thumbnail" style="width: 100%; max-height: 40rem; object-fit: cover; object-position: center;">
                            </div>
                            <div class="col-sm-6 d-flex flex-column align-items-center">
                                <h5 class="card-title text-light"><?= $movie["title"]?></h5>
                                <p class="card-text text-light"><?= $movie["bio"] ?></p>
                                <br>
                                <h3 class="text-light"> Average Community Ratings: </h3>
                                <p class="card-text text-light"><?= "Overall: " . $movie["avg_overall"] ?></p>
                                <p class="card-text text-light"><?= "Feel-Good: " .$movie["avg_feel_good"] ?></p>
                                <p class="card-text text-light"><?= "Suspense: " .$movie["avg_suspense"] ?></p>
                                <p class="card-text text-light"><?= "Thrill: " .$movie["avg_thrill"] ?></p>
                                <p class="card-text text-light"><?= "Scare: " .$movie["avg_scare"] ?></p>
                                <p class="card-text text-light"><?= "Romance: " .$movie["avg_romance"] ?></p>
                                <p class="card-text text-light"><?= "Acting: " .$movie["avg_acting"] ?></p>
                                <p class="card-text text-light"><?= "Pacing: " .$movie["avg_pacing"] ?></p>
                                <p class="card-text text-light"><?= "Rewatchability: " .$movie["avg_rewatch"] ?></p>
                                <p class="card-text text-light"><?= "Cinematography: " .$movie["avg_cinema"] ?></p>
                            </div>
                        </div>
                        <form action="?command=review" method="post" style="float: right;">
                            <?php
                            echo "<input type='hidden' name='title' value='" . $_POST['title'] . "'>";
                            ?>
                            <button type="submit" class="btn btn-primary">Review This Movie</button>
                        </form>
                    </div>
                </div>
        <?php endif?>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>