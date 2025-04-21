<div class="container-xxl m-3">
    <?php
    $sql = "SELECT * FROM reviews_final where user_id = $user_id AND movie_id = $movie_id;";
    $review = $this->db->query($sql)[0];
    $sql = "SELECT * FROM movies_final where id= $movie_id";
    $movie = $this->db->query($sql)[0];
    ?>
    <div class="card m-0 p-0 fav-movie-card">
        <div class="row align-items-center">
            <div class="col-md-3 m-0 img-container">
                <img class="fav-movie-img" src="<?= $movie['thumbnail_url'] ?>" alt="Cover art for <?= $movie['title'] ?>" style="height: 30rem;">
            </div>
            <div class="col-md-9 pl-5 pr-5 m-0 d-flex flex-column" style="height: 100%">
                <div class="row mt-3">
                    <div class="col-md-5 pt-2 my-auto pb-5">
                        <h2 class="text-light"><?= $movie['title'] ?></h2>
                        <p class="text-light"><?= $movie['bio'] ?></p>
                        <form class="pl-0 ml-0" action="?command=movie" method="post">
                            <input type="hidden" name="title" value="<?= $movie['title'] ?>">
                            <button type="submit" class="btn btn-light fav-button">Learn About This Title</button>
                        </form>
                    </div>
                    <div class="col-md-7 container m-0 p-0">
                        <h3 class="text-center mb-4"> Your Ratings: </h3>
                        <div class="row d-flex justify-content-center align-items-center mb-2">
                            <h4> Overall: </h4>
                            <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                <?php
                                    $rating = (int) $review['overall'];
                                    include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                  ///include("/opt/src/sprint4/components/StaticStars.php");
                                ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-1">
                            <div>
                                <div class="row align-items-center">
                                    <h5> Feel Good: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['feel_good'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row align-items-center">
                                    <h5> Suspense: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['suspense'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-1">
                            <div>
                                <div class="row align-items-center">
                                    <h5> Thrill: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['thrill'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row align-items-center">
                                    <h5> Scare: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['scare'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-1">
                            <div>
                                <div class="row align-items-center">
                                    <h5> Romance: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['romance'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row align-items-center">
                                    <h5> Acting: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['acting'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-1">
                            <div>
                                <div class="row align-items-center">
                                    <h5> Pacing: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['pacing'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row align-items-center">
                                    <h5> Rewatchability: </h5>
                                    <div class="deco-star-rating pr-2 ml-1"  style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['rewatch'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-4">
                            <div>
                                <div class="row align-items-center">
                                    <h5> Cinematography: </h5>
                                    <div class="deco-star-rating pr-2 ml-1" style="width: 9.5rem; border-radius: 50px;">
                                        <?php
                                        $rating = (int) $review['cinema'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/StaticStars.php");
                                      ///include("/opt/src/sprint4/components/StaticStars.php");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="?command=review" method="post" class="col-md-4 pl-0 ml-0 mb-3 float-right">
                            <?= "<input type='hidden' name='title' value='" . $movie['title'] . "'>
                             <input type='hidden' name='overwrite' value='true'>" ?>
                            <button type="submit" class="btn btn-primary fav-button">Change Your Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>