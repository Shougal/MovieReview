<!DOCTYPE html>
<html lang="en">
    <head>
        <Title>Account</Title>
        <meta name="author" content="Rob Keys">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:description" content="Account page for the Movie Recommendations website">
        <meta property="og:title" content="Account">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/addMovie.css">
        <link rel="stylesheet" href="styles/shared.css">

        <script src="/qvh7fp/sprint4/js/mode.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <?php if (isset($_SESSION['email'])): ?>
            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="card col-8">
                    <div class="card-header">
                        Add a Movie
                    </div>
                    <div class="card-body">
                        <form action="?command=add_movie" method="post" class="d-flex flex-column align-items-start">
                            <label class="d-flex align-items-start">
                                Movie Title*
                                <input type="text" name="title" id="title" placeholder="Title" class="ml-3" required>
                            </label>
                            <label class="d-flex align-items-start">
                                Description of Movie
                                <textarea name="bio" id="bio" placeholder="Description" class="ml-3"></textarea>
                            </label>
                            <label class="d-flex align-items-start">
                                Cover Art URL*
                                <input type="text" name="url" id="url" placeholder="Link" class="ml-3" required>
                            </label>
                            <button type="submit" class="mt-3">Add Movie</button>
                            <p class="mt-2 mb-0 pb-0"> * = required field</p>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
      ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>