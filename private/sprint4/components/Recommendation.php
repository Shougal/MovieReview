<?php
    $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&plot=full&i=".$imdbID;
    $response = file_get_contents($apiUrl);
    $movie = json_decode($response, true);
?>
<div class="container-xxl m-3">
    <div class="card m-0 p-0 fav-movie-card">
        <div class="row align-items-center">
            <div class="col-md-3 m-0 img-container">
                <img class="fav-movie-img" src="<?= $movie['Poster'] ?>" alt="Poster for <?= $movie['Title'] ?>">
            </div>
            <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                <div class="row align-items-center">
                    <div class="container col-md-5 m-0 p-0 text-light">
                        <h2><?= $movie['Title'] ?></h2>
                    </div>
                    <div class="container col-md-6 m-0 p-0">
                        <div class="row align-items-center d-flex justify-content-end">
                            <?php
                                if ($recQuality > 90){
                                    $color = "good";
                                } else if ($recQuality > 70){
                                    $color = "mid";
                                } else {
                                    $color = "bad";
                                }
                            ?>
                            <div class="recommendation-<?= $color ?> mr-2">
                                <p><?= $recQuality ?>% Match</p>
                            </div>
                            <div class="deco-star-rating pr-2" style="width: 9.5rem; border-radius: 50px;">
                                <?php
                                $rating = round((int) $movie['imdbRating']/2);
                                for ($i = 0; $i < $rating; $i++) {
                                    echo "<label style='color: gold'>&#9733;</label>";
                                }
                                for ($i = 0; $i < 5-$rating; $i++) {
                                    echo "<label style='color: grey'>&#9733;</label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-light">
                    <p><?= $movie['Plot'] ?></p>
                </div>
                <div class="row mt-auto mb-2">
                    <div class="col-md-4 pl-0 ml-0">
                        <button type="button" class="btn btn-primary fav-button where-to-watch" id="<?= $movie['Title']?>"> Where to Watch &rArr;</button>
                    </div>
                    <form action="?command=movie" method="post" class="col-md-4 pl-0 ml-0">
                        <input type="hidden" name="imdbID" value="<?= $movie['imdbID'] ?>">
                        <button type="submit" class="btn btn-light fav-button">See Community Ratings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>