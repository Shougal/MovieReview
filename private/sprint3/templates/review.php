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
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <p class="navbar-brand ml-0 mt-0 mb-0 mr-4">
                <img src="images/MR.png" width="30" height="30" class="d-inline-block align-top" alt="">
                MovieReviews
            </p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="mynavlinks">
                    <li class="nav-item">
                        <form action="?command=home" method="post">
                            <button class="btn btn-link text-light" type="submit">Home</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="?command=user_movies" method="post">
                            <button class="btn btn-link text-light" type="submit">Your Movies</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="?command=recommendations" method="post">
                            <button class="btn btn-link text-light" type="submit">Recommendations</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="get">
                            <input type="hidden" name="command" value="add_movie">
                            <button class="btn btn-link text-light" type="submit">Add Movie</button>
                        </form>
                    </li>
                    <?php
                    if (isset($_SESSION["username"])){
                        echo '<li class="nav-item active">
                                                <form action="?command=review" method="post">
                                                    <button class="btn btn-link text-light" type="submit">Review</button>
                                                </form>
                                              </li>';
                    } else {
                        echo '<li class="nav-item active">
                                                <form action="?command=login" method="post">
                                                    <button class="btn btn-link text-light" type="submit">Login</button>
                                                </form>
                                              </li>';
                    }
                    ?>
                </ul>

                <form class="form-inline my-2 my-lg-0 mr-auto" method="get">
                    <input type="hidden" name="command" value="search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search All Movies" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php
                if(isset($_SESSION["username"])){
                    echo '<form class="form-inline ml-5" action="?command=account" method="post">
                                            <button class="d-flex" style="background: none; border: none; cursor: pointer;" type="submit">
                                                <p class="mt-3 text-light">' . $_SESSION["username"] . '</p>
                                                <img src="images/'.$_SESSION["pfp"].'" alt="Profile photo for the active user" class="ml-2" id="pfp">
                                            </button>
                                          </form>';
                } else {
                    echo '<form class="form-inline ml-5" action="?command=login" method="post">
                                            <button class="d-flex" style="background: none; border: none; cursor: pointer;" type="submit">
                                                <p class="mt-3 text-light"> Guest </p>
                                                <img src="images/defaultpfp.jpg" alt="Default profile photo for an anonymous user" class="ml-2" id="pfp">
                                            </button>
                                          </form>';
                }
                ?>
            </div>
        </nav>

        <div class="container-xxl">
            <div class="row justify-content-between">
                <div class="col-xl-5 mx-auto">
                    <div class="row align-items-center justify-content-center mx-auto">
                        <h1>Movie Title</h1>
                        <form action="#" method="POST">
                            <div class="add-fav-heart ml-3 mt-1">
                                <input type="checkbox" id="heart-btn"><label for="heart-btn" class="d-flex align-items-center">&#9825; <span class="heart-txt ml-1">Favorite</span></label>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                        <img src="images/darkknight.jpg" alt="Dark knight thumbnail" style="width: 100%;">
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-12 pr-4 text-light">
                            <h6><label for="review-text-area"> Leave a Review: </label></h6>
                            <textarea class="form-control mr-2" id="review-text-area" rows="7" placeholder="(Optional)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mx-auto">
                    <div class="overall-rating justify-content-center">
                        <div class="row justify-content-center mt-3">
                            <h2> Overall: </h2>
                        </div>
                        <div class="row justify-content-center">
                            <form action="#" method="POST">
                                <div class="star-rating">
                                    <input type="checkbox" id="star1"><label for="star1">&#9733;</label>
                                    <input type="checkbox" id="star2"><label for="star2">&#9733;</label>
                                    <input type="checkbox" id="star3"><label for="star3">&#9733;</label>
                                    <input type="checkbox" id="star4"><label for="star4">&#9733;</label>
                                    <input type="checkbox" id="star5"><label for="star5">&#9733;</label>
                                </div>
                            </form>
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
                                    <form action="#" method="POST" class="d-flex">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star6"><label for="star6">&#9733;</label>
                                            <input type="checkbox" id="star7"><label for="star7">&#9733;</label>
                                            <input type="checkbox" id="star8"><label for="star8">&#9733;</label>
                                            <input type="checkbox" id="star9"><label for="star9">&#9733;</label>
                                            <input type="checkbox" id="starA"><label for="starA">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Suspense:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="starB"><label for="starB">&#9733;</label>
                                            <input type="checkbox" id="starC"><label for="starC">&#9733;</label>
                                            <input type="checkbox" id="starD"><label for="starD">&#9733;</label>
                                            <input type="checkbox" id="starE"><label for="starE">&#9733;</label>
                                            <input type="checkbox" id="starF"><label for="starF">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around d-flex flex-wrap">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Thrill:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star10"><label for="star10">&#9733;</label>
                                            <input type="checkbox" id="star11"><label for="star11">&#9733;</label>
                                            <input type="checkbox" id="star12"><label for="star12">&#9733;</label>
                                            <input type="checkbox" id="star13"><label for="star13">&#9733;</label>
                                            <input type="checkbox" id="star14"><label for="star14">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Scare:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star15"><label for="star15">&#9733;</label>
                                            <input type="checkbox" id="star16"><label for="star16">&#9733;</label>
                                            <input type="checkbox" id="star17"><label for="star17">&#9733;</label>
                                            <input type="checkbox" id="star18"><label for="star18">&#9733;</label>
                                            <input type="checkbox" id="star19"><label for="star19">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around">
                            <div class="row align-items-center">
                                <p class="mr-2">Romance:</p>
                                <form action="#" method="POST">
                                    <div class="star-rating mb-2">
                                        <input type="checkbox" id="star1A"><label for="star1A">&#9733;</label>
                                        <input type="checkbox" id="star1B"><label for="star1B">&#9733;</label>
                                        <input type="checkbox" id="star1C"><label for="star1C">&#9733;</label>
                                        <input type="checkbox" id="star1D"><label for="star1D">&#9733;</label>
                                        <input type="checkbox" id="star1E"><label for="star1E">&#9733;</label>
                                    </div>
                                </form>
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
                                    <form action="#" method="POST" class="d-flex">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star1F"><label for="star1F">&#9733;</label>
                                            <input type="checkbox" id="star20"><label for="star20">&#9733;</label>
                                            <input type="checkbox" id="star21"><label for="star21">&#9733;</label>
                                            <input type="checkbox" id="star22"><label for="star22">&#9733;</label>
                                            <input type="checkbox" id="star23"><label for="star23">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Pacing:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star24"><label for="star24">&#9733;</label>
                                            <input type="checkbox" id="star25"><label for="star25">&#9733;</label>
                                            <input type="checkbox" id="star26"><label for="star26">&#9733;</label>
                                            <input type="checkbox" id="star27"><label for="star27">&#9733;</label>
                                            <input type="checkbox" id="star28"><label for="star28">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items center w-100 justify-content-around">
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Rewatchability:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star29"><label for="star29">&#9733;</label>
                                            <input type="checkbox" id="star2A"><label for="star2A">&#9733;</label>
                                            <input type="checkbox" id="star2B"><label for="star2B">&#9733;</label>
                                            <input type="checkbox" id="star2C"><label for="star2C">&#9733;</label>
                                            <input type="checkbox" id="star2D"><label for="star2D">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <p class="mr-2">Cinematography:</p>
                                    <form action="#" method="POST">
                                        <div class="star-rating mb-2">
                                            <input type="checkbox" id="star2E"><label for="star2E">&#9733;</label>
                                            <input type="checkbox" id="star2F"><label for="star2F">&#9733;</label>
                                            <input type="checkbox" id="star30"><label for="star30">&#9733;</label>
                                            <input type="checkbox" id="star31"><label for="star31">&#9733;</label>
                                            <input type="checkbox" id="star32"><label for="star32">&#9733;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mx-auto">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>

                </div>
            </div>
        </div>

        <footer class="text-center text-white">
            <!-- Grid container -->
            <div class="container">
                <!-- Section: Links -->
                <section class="mt-5">
                    <!-- Grid row-->
                    <div class="row text-center d-flex justify-content-center pt-5">
                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="home.php" class="text-white">Home</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="userMovies.php" class="text-white">Your Movies</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="userRecommendation.php" class="text-white">Recommendations</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="review.html" class="text-white">Review</a>
                            </h6>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row-->
                </section>
                <!-- Section: Links -->

                <hr class="my-5">

                <!-- Section: Text -->
                <div class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <!--TODO: Add user friendly description-->
                            <p>
                                This application allows users to rate and review movies. Ratings and reviews are stored in a database and reflected dynamically on the user interface. The app features a secure login system, personalized user pages, and a recommendation engine that suggests movies based on user preferences.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Section: Text -->

                <!-- TODO: Add Section: Social if we end up wanting to add github repo -->
                <!-- <section class="text-center mb-5">
                  <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                  </a>
                  <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                  </a>
                  <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                  </a>
                </section> -->
                <!-- Section: Social -->
            </div>
            <!-- Grid container -->

            <!-- TODO: Copyright: Change anchor text to domain name -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2025 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">ShougandRobMovieReviews.com</a>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>