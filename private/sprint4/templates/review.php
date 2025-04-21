<!DOCTYPE html>
<html lang="en">
    <head>
        <Title>Review</Title>
        <meta name="author" content="Rob Keys">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta property="og:description" content="Specific movie review page" >
        <meta property="og:title" content="Review" >
        <meta property="og:type" content="review.txt" >

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/review.css">
        <link rel="stylesheet" href="styles/shared.css">

        <script src="/qvh7fp/sprint4/js/custom.js"></script>
        <script src="/qvh7fp/sprint4/js/submitReview.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>
        <?php
            $sql = "SELECT * FROM movies_final WHERE title = '".$_POST["title"]."';";
            $movie = $this->db->query($sql)[0];
            $sql = "SELECT * FROM reviews_final WHERE movie_id = '".$movie['id']."';";
            $review = $this->db->query($sql);
            $review_found = false;
            if(sizeof($review) == 0 || isset($_POST['overwrite'])){
                $review = array(
                    "review" => "",
                    "overall" => -1,
                    "feel_good" => -1,
                    "suspense" => -1,
                    "thrill" => -1,
                    "scare" => -1,
                    "romance" => -1,
                    "acting" => -1,
                    "pacing" => -1,
                    "rewatch" => -1,
                    "cinema" => -1,
                );
            } else {
                $review_found = true;
                $review = $review[0];
            }
        ?>

        <div class="container-xxl">
            <div id="message"></div>
            <form class="row justify-content-between" action="?command=leave-review" id="review-form" method="post">
                <input type="hidden" value="<?= $movie['title']?> " name="title">
                <div class="col-xl-5 mx-auto">
                    <div class="row align-items-center justify-content-center mx-auto">
                        <h1>Movie Title</h1>
                        <div class="add-fav-heart ml-3 mt-1" id="favorite">
                            <input type="checkbox" id="fav"><label for="fav" class="d-flex align-items-center">&#9825; <span class="heart-txt ml-1">Favorite</span></label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <img src="<?= $movie['thumbnail_url']?>" alt="<?= $movie['title']?> thumbnail" style="width: 100%; max-height: 30rem; object-fit: cover; object-position: center;">
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-12 pr-4 text-light">
                            <h6><label for="review"> Leave a Review: </label></h6>
                            <textarea class="form-control mr-2" id="review" name="review" rows="7" placeholder="(Optional)"><?= $review["review"] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mx-auto">
                    <div class="overall-rating justify-content-center">
                        <div class="row justify-content-center mt-3">
                            <h2> Overall: </h2>
                        </div>
                        <div class="row justify-content-center">
                            <?php
                                $star = 0;
                                $category = $review['overall'];
                                include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                              ///include("/opt/src/sprint4/components/RatingStars.php");
                            ?>
                        </div>
                    </div>
                    <div class="mood-rating">
                        <div class="row justify-content-center mt-3">
                            <h2> Mood Ratings: </h2>
                        </div>
                        <div class="row align-items-center w-100 justify-content-around">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Feel Good:</p>
                                    <?php
                                        $star = 5;
                                        $category = $review['feel_good'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Suspense:</p>
                                    <?php
                                        $star = 10;
                                        $category = $review['suspense'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around d-flex flex-wrap">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Thrill:</p>
                                    <?php
                                        $star = 15;
                                        $category = $review['thrill'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Scare:</p>
                                    <?php
                                        $star = 20;
                                        $category = $review['scare'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around">
                            <div class="row align-items-center">
                                <p class="mr-2">Romance:</p>
                                <?php
                                    $star = 25;
                                    $category = $review['romance'];
                                    include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                  ///include("/opt/src/sprint4/components/RatingStars.php");
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="other-factors-rating">
                        <div class="row justify-content-center mt-3">
                            <h2> Other Factors: </h2>
                        </div>
                        <div class="row align-items center w-100">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Acting:</p>
                                    <?php
                                        $star = 30;
                                        $category = $review['acting'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Pacing:</p>
                                    <?php
                                        $star = 35;
                                        $category = $review['pacing'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Rewatchability:</p>
                                    <?php
                                        $star = 40;
                                        $category = $review['rewatch'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Cinematography:</p>
                                    <?php
                                        $star = 45;
                                        $category = $review['cinema'];
                                        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/RatingStars.php");
                                      ///include("/opt/src/sprint4/components/RatingStars.php");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mx-auto">
                        <?php
                            if($review_found){
                                echo "
                    </div>
                </div>
            </form>
            <form action='?command=review' method='post' style='float: right;'>
                <input type='hidden' name='title' value='" . $_POST['title'] . "'>
                <input type='hidden' name='overwrite' value='true'>
                <button type='submit' class='btn btn-primary mr-3'>Leave A New Review</button>
            </form>";
                            }
                            else {
                                echo '<button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </div>
            </form>';
                            }
                        ?>
        </div>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>