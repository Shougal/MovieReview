<div class="container-xxl m-3">
    <?php
    $sql = "SELECT * FROM reviews_final ORDER BY overall DESC;";
    $review = $this->db->query($sql);
    $num_reviews =  sizeof($review);
    if ($num_reviews > $top_movie_index) {
        $imdbID = $review[$top_movie_index]["imdbID"];
        $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&i=".$imdbID;
        $response = file_get_contents($apiUrl);
        $movie = json_decode($response, true);
    } else {
        if (!isset($_SESSION["username"])) {
            $apiUrl = "https://www.omdbapi.com/?&apikey=".$this->api_key."&s=guest";
        } else {
            $apiUrl = "https://www.omdbapi.com/?&apikey=".$this->api_key."&s=".$_SESSION["username"];
        }
        $response = file_get_contents($apiUrl);
        $movies = json_decode($response, true);
        $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&i=".$movies["Search"][$top_movie_index]["imdbID"];
        $response = file_get_contents($apiUrl);
        $movie = json_decode($response, true);
    }
    ?>
    <div class="card m-0 p-0 fav-movie-card">
        <div class="row align-items-center">
            <div class="col-md-3 m-0 img-container">
                <img class="fav-movie-img" src="<?= $movie['Poster'] ?>" alt="Poster for <?= $movie['Title'] ?>">
            </div>
            <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                <div class="row align-items-center">
                    <div class="container col-md-5 m-0 p-0">
                        <h2 class="text-light"><?= $movie['Title'] ?></h2>
                    </div>
                    <div class="container col-md-6 m-0 p-0">
                        <div class="deco-star-rating pr-2" style="width: 9.5rem; float: right; border-radius: 50px;">
                            <?php
                                if($num_reviews > $top_movie_index) {
                                    $rating = round((int) $review[$top_movie_index]['overall']);
                                } else {
                                    $rating = round((int) $movie['imdbRating']/2);
                                }
                                
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
                <div class="row">
                    <p class="text-light"><?= $movie['Plot'] ?></p>
                </div>
                <div class="row mt-auto mb-2">
                    <form action="?command=review" method="post" class="col-md-4 pl-0 ml-0">
                        <?= "<input type='hidden' name='imdbID' value='" . $movie['imdbID'] . "'>" ?>
                        <button type="submit" class="btn btn-primary fav-button">View Your Rating Here</button>
                    </form>
                    <form class="col-md-4 pl-0 ml-0" action="?command=movie" method="post">
                        <?= "<input type='hidden' name='imdbID' value='" . $movie['imdbID'] . "'>" ?>
                        <button type="submit" class="btn btn-light fav-button">Learn About This Title</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>