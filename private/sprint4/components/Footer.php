<footer class="text-center text-white">
    <!-- Grid container -->
    <div class="container">
        <!-- Section: Links -->
        <section class="mt-5">
            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5">
                <!-- Grid column -->
                <div class="col-md-2">
                    <form action="?command=home" method="post">
                        <button class="btn btn-link text-light font-weight-bold" type="submit">HOME</button>
                    </form>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <?php
                if (isset($_SESSION["username"])){
                    echo '<div class="col-md-2">
                    <form action="?command=user_movies" method="post">
                        <button class="btn btn-link text-light font-weight-bold" type="submit">YOUR MOVIES</button>
                    </form>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                    <form action="?command=recommendations" method="post">
                        <button class="btn btn-link text-light font-weight-bold" type="submit">RECOMMENDATIONS</button>
                    </form>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2">
                    <form action="?command=search" method="post">
                        <input type="hidden" name="reviewing" value="true">
                        <button class="btn btn-link text-light font-weight-bold" type="submit">REVIEW</button>
                    </form>
                </div>
                <!-- Grid column -->';
                } else {
                    echo '<div class="col-md-2">
                    <form action="?command=login" method="post">
                        <button class="btn btn-link text-light font-weight-bold" type="submit">LOGIN</button>
                    </form>
                </div>';
                }
                ?>

            </div>
            <!-- Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="my-5">

        <!-- Section: Text -->
        <div class="mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <p>
                        This is a project made for the CS4640 course at the University of Virginia.
                        </p>
                        <p>
                         This application allows users to rate and review movies, and recieve recommendations. Ratings and reviews are stored in a database and reflected dynamically on the user interface. The app features a secure login system, personalized pages, and a recommendation engine that suggests movies based on user preferences.
                    </p>
                </div>
            </div>
        </div>
        <!-- Section: Text -->

        <!-- Social if we end up wanting to add github repo -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>