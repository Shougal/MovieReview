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
        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
        // include("/opt/src/sprint4/components/Navbar.php");
        ?>

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

        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
        // include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>