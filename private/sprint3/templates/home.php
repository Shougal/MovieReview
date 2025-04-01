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

        <h1 class="mt-2 mb-4 ml-3">User's Top Movies</h1>

        <div class="container-xxl m-3" id="movie1">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0 img-container">
                        <img class="fav-movie-img" src="images/darkknight.jpg" alt="Cover art for the Dark Knight">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0">
                                <h2>The Dark Knight Rises</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="deco-star-rating">
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button">View Your Rating Here</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">Learn About This Title</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl m-3" id="movie2">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0 img-container">
                        <img class="fav-movie-img" src="images/forrestgump.jpg" alt="Cover art for Forrest Gump">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0">
                                <h2>Forrest Gump</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="deco-star-rating">
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button">View Your Rating Here</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">Learn About This Title</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl m-3" id="movie3">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0">
                        <img class="fav-movie-img" src="images/emojiemovie.jpg" alt="Cover art for the Emoji Movie">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0">
                                <h2>The Emoji Movie</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="deco-star-rating">
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label>&#9733;</label>
                                    <label class="unchecked">&#9733;</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button">View Your Rating Here</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">Learn About This Title</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl m-3">
            <div class="card fav-movie-card m-0 p-0">
                <div class="row align-items-center">
                    <div class="col-md-6 ml-5 mt-4 mb-1">
                        <p>Looking to add to your top 3? Revise your ratings or search for new movies!</p>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-light fav-button">Your Movies</button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary fav-button">View Your Recommendations -></button>
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
                                <a href="home.html" class="text-white">Home</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="userMovies.html" class="text-white">Your Movies</a>
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="userRecommendation.html" class="text-white">Recommendations</a>
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