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

        <script src="/qvh7fp/sprint4/js/mode.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>
        <?php if(isset($_POST["imdbID"])):
            $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&plot=full&i=".$_POST["imdbID"];
            $response = file_get_contents($apiUrl);
            $movie = json_decode($response, true);
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 p-0 m-0 my-auto">
                                <img class="ml-3" src="<?=$movie["Poster"]?>" alt="<?= $movie["Title"] ?> Poster" style="width: 90%;">
                            </div>
                            <div class="col-sm-5 d-flex flex-column align-items-center justify-content-center">
                                <h1 class="card-title text-light mb-5"><?= $movie["Title"]?></h1>
                                <p class="card-text text-light mb-5"><?= $movie["Plot"] ?></p>
                            </div>
                            <div class="col-sm-3 d-flex flex-column align-items-center justify-content-center">
                                <div class="card text-dark bg-light p-4">
                                    <h5 class="card-title ">Internet Ratings:</h5>
                                    <br>
                                    <?php foreach ($movie["Ratings"] as $rating): ?>
                                        <p class="card-text"><?= $rating["Source"] . ": " . $rating["Value"] ?></p>
                                    <?php endforeach ?>    
                                </div>
                            </div>
                        </div>
                        <form action="?command=review" method="post" style="float: right;">
                            <?php
                            echo "<input type='hidden' name='imdbID' value='" . $movie['imdbID'] . "'>";
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