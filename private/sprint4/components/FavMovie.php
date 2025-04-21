<div class="container-xxl m-3">
    <?php
    $sql = "SELECT * FROM reviews_final ORDER BY overall DESC;";
    $movie = $this->db->query($sql);
    $num_reviews =  sizeof($movie);
    if ($num_reviews > $top_movie_index) {
        $mid = $movie[$top_movie_index]["movie_id"];
        $sql = "SELECT * FROM movies_final WHERE id = '".$mid."';";
        $movie = $this->db->query($sql)[0];
    } else {
        $sql = "SELECT * FROM movies_final ORDER BY avg_overall DESC;";
        $movie = $this->db->query($sql)[$top_movie_index - $num_reviews];
    }
    ?>
    <div class="card m-0 p-0 fav-movie-card">
        <div class="row align-items-center">
            <div class="col-md-3 m-0 img-container">
                <img class="fav-movie-img" src="<?= $movie['thumbnail_url'] ?>" alt="Cover art for <?= $movie['title'] ?>">
            </div>
            <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                <div class="row align-items-center">
                    <div class="container col-md-5 m-0 p-0">
                        <h2 class="text-light"><?= $movie['title'] ?></h2>
                    </div>
                    <div class="container col-md-6 m-0 p-0">
                        <div class="deco-star-rating pr-2" style="width: 9.5rem; float: right; border-radius: 50px;">
                            <?php
                                $rating = round((int) $movie['avg_overall']);
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
                    <p class="text-light"><?= $movie['bio'] ?></p>
                </div>
                <div class="row mt-auto mb-2">
                    <form action="?command=review" method="post" class="col-md-4 pl-0 ml-0">
                        <?= "<input type='hidden' name='title' value='" . $movie['title'] . "'>" ?>
                        <button type="submit" class="btn btn-primary fav-button">View Your Rating Here</button>
                    </form>
                    <form class="col-md-4 pl-0 ml-0" action="?command=movie" method="post">
                        <?= "<input type='hidden' name='title' value='" . $movie['title'] . "'>" ?>
                        <button type="submit" class="btn btn-light fav-button">Learn About This Title</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>