<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Recommendations</title>
        <meta name="author" content="Rob Keys, Shoug Alharbi">

        <!-- Meta Tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:description" content="A page consisting of user's current movie Recommendations">
        <meta property="og:title" content="User Recommendations">
        <meta property="og:type" content="userRecommendations.txt" >
        <!--TODO: Add open graph metadata url and image -->

        <!--BootStrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Custom CSS-->
        <link rel="stylesheet" href="styles/recommendation.css">
        <link rel="stylesheet" href="styles/shared.css">

        <!--Font awesome-->
        <script src="https://example.com/fontawesome/v6.6.0/js/fontawesome.js" data-auto-replace-svg="nest"></script>
        <script src="https://example.com/fontawesome/v6.6.0/js/solid.js"></script>
        <script src="https://example.com/fontawesome/v6.6.0/js/brands.js"></script>

    </head>
    <body>
        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
        // include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <div class="container-xxl m-3">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0 img-container">
                        <img class="fav-movie-img" src="images/dune.jpg" alt="Cover art for Dune">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0 text-light">
                                <h2>Dune</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="row align-items-center d-flex justify-content-end">
                                    <div class="recommendation-good mr-2">
                                        <p>98% Match</p>
                                    </div>
                                    <div class="deco-star-rating mb-2">
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-light">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button"> Where to Watch &rArr;</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">See Others' ratings</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl m-3">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0 img-container">
                        <img class="fav-movie-img" src="images/captamerica.jpg" alt="Cover art for Captain America">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0 text-light">
                                <h2>Captain America: Civil War</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="row align-items-center d-flex justify-content-end">
                                    <div class="recommendation-mid mr-2">
                                        <p>80% Match</p>
                                    </div>
                                    <div class="deco-star-rating mb-2">
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label class="unchecked">&#9733;</label>
                                        <label class="unchecked">&#9733;</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-light">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button"> Where to Watch &rArr;</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">See Others' ratings</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl m-3">
            <div class="card m-0 p-0 fav-movie-card">
                <div class="row align-items-center">
                    <div class="col-md-3 m-0 img-container">
                        <img class="fav-movie-img" src="images/fnaf.png" alt="Cover art for Five Nights at Freddy's">
                    </div>
                    <div class="col-md-9 pl-5 pr-5 pt-2 pb-2 d-flex flex-column">
                        <div class="row align-items-center">
                            <div class="container col-md-5 m-0 p-0 text-light">
                                <h2>Five Nights at Freddy's</h2>
                            </div>
                            <div class="container col-md-6 m-0 p-0">
                                <div class="row align-items-center d-flex justify-content-end">
                                    <div class="recommendation-bad mr-2">
                                        <p>56% Match</p>
                                    </div>
                                    <div class="deco-star-rating mb-2">
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label>&#9733;</label>
                                        <label class="unchecked">&#9733;</label>
                                        <label class="unchecked">&#9733;</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-light">
                            <p>Text about the movie lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                        </div>
                        <div class="row mt-auto mb-2">
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-primary fav-button"> Where to Watch &rArr;</button>
                            </div>
                            <div class="col-md-4 pl-0 ml-0">
                                <button type="button" class="btn btn-light fav-button">See Others' ratings</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
        //include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>