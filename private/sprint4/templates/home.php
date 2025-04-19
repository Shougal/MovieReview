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
                                <h2 class="text-light">The Dark Knight Rises</h2>
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
                            <p class="text-light">Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
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
                                <h2 class="text-light">Forrest Gump</h2>
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
                            <p class="text-light">Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
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
                                <h2 class="text-light">The Emoji Movie</h2>
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
                            <p class="text-light">Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
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
                        <p class="text-light">Looking to add to your top 3? Revise your ratings or search for new movies!</p>
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

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
            // include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>