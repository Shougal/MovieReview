<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Movies</title>
        <meta name="author" content="Shoug Alharbi">

        <!-- Meta Tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta property="og:description" content="A page consisting of user's current movie selection" >
        <meta property="og:title" content="User Movies" >
        <meta property="og:type" content="userMovies.txt" >
        <!--TODO: Add open graph metadata url and image -->

        <!--BootStrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Custom CSS-->
        <link rel="stylesheet" href="styles/userMovies.css">
        <link rel="stylesheet" href="styles/shared.css">

        <!--Font awesome-->
        <script src="https://example.com/fontawesome/v6.6.0/js/fontawesome.js" data-auto-replace-svg="nest"></script>
        <script src="https://example.com/fontawesome/v6.6.0/js/solid.js"></script>
        <script src="https://example.com/fontawesome/v6.6.0/js/brands.js"></script>

    </head>
    <body>
        <!--HEADER-->
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

                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search All Movies" aria-label="Search">
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

          <!-- Hero Section-->
          <div class="container hero" >
            <!--TODO add a filter box-->
            <!-- First ROW-->
            <div class="row">
                <!-- TODO: within each card add star logo-->
              <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMTkxNTk1ODcxNl5BMl5BanBnXkFtZTcwMDI1OTMzOQ@@._V1_FMjpg_UX999_.jpg" alt="The Great Gatsby poster">
                    <div class="card-body">
                      <h5 class="card-title text-light">The Great Gatsby</h5>
                      <p class="card-text text-light">"The Great Gatsby" is a novel by F. Scott Fitzgerald that explores themes of decadence, idealism, and excess through the story of Jay Gatsby's tragic obsession with rekindling his lost love in the roaring 1920s.</p>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="card" >
                    <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_FMjpg_UY720_.jpg" alt="Lala land poster">
                    <div class="card-body">
                      <h5 class="card-title text-light">Lala Land</h5>
                      <p class="card-text text-light">"La La Land" is a vibrant and heartfelt musical film that follows the passionate and bittersweet love story of an aspiring actress and a jazz musician pursuing their dreams in Los Angeles.</p>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMWYzZTM5ZGQtOGE5My00NmM2LWFlMDEtMGNjYjdmOWM1MzA1XkEyXkFqcGc@._V1_FMjpg_UX878_.jpg" alt="Gladiator II poster">
                    <div class="card-body">
                      <h5 class="card-title text-light">Gladiator II</h5>
                      <p class="card-text text-light">"Gladiator II" is a sequel to the epic historical drama "Gladiator," where the story is expected to continue exploring the world of ancient Rome with new characters and a further look into the legacy of Maximus.</p>
                    </div>
                  </div>
              </div>

              <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BYjk1Y2U4MjQtY2ZiNS00OWQyLWI3MmYtZWUwNmRjYWRiNWNhXkEyXkFqcGc@._V1_FMjpg_UY720_.jpg" alt="Parasite poster">
                    <div class="card-body">
                      <h5 class="card-title text-light">Parasite</h5>
                      <p class="card-text text-light">"Parasite" is a South Korean dark comedy thriller directed by Bong Joon-ho that delves into class warfare, social inequality, and the disturbing dynamics between two families at opposite ends of the socioeconomic spectrum.</p>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="card bottom-card">
                    <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZDk2YjNhYzEtYzg2ZC00OWEwLWJhYzgtMGUzMWVjNDFmYzI5XkEyXkFqcGc@._V1_FMjpg_UY2664_.jpg" alt="The Hunger Games: The Ballad of Songbirds & Snakes Poster">
                    <div class="card-body">
                      <h5 class="card-title text-light">The Hunger Games: The Ballad of Songbirds & Snakes</h5>
                      <p class="card-text text-light">"The Hunger Games: The Ballad of Songbirds & Snakes" is a prequel to the popular Hunger Games series that focuses on the origin story of Coriolanus Snow, decades before he becomes the tyrannical President of Panem.</p>
                    </div>
                  </div>
              </div>
              
            </div>
            
          </div>

          <!--Footer-->
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
              <a href="userMovies.html" class="text-white">Your Movies</a>
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
              <a href="review.php" class="text-white">Review</a>
            </h6>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-5" >

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

        <!--BootStrap JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>