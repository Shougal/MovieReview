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
        <link rel="stylesheet" href="styles/home.css">
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
            <div class="row">
                <div class="card mx-auto mt-4 col-10" id="account-card">
                    <h2 class="card-title font-weight-bold">
                        Account Information
                    </h2>
                    <div class="card-body row">
                        <div class="col-5 d-flex flex-column align-items-center">
                            <?= "<img src='images/".$_SESSION["pfp"]."' alt='Profile photo for the active user' class='ml-2' id='pfp' style='height:200px; width:200px;'>" ?>
                            <?= "<p class='mt-3'>" . $_SESSION["username"] . "</p>" ?>
                            <form action="?command=set-pfp" method="POST">
                                <h4>Set your profile picture color</h4>
                                <div class="d-flex" style="gap: 5px;">
                                    <label for="blue">
                                        <input type="radio" id="blue" name="choice" value="0" required <?php if ($_SESSION["pfp"]==="bluepfp.jpg") { echo "checked";};?>> Blue
                                    </label>
                                    <br>
                                    <label for="green">
                                        <input type="radio" id="green" name="choice" value="1" <?php if ($_SESSION["pfp"]==="greenpfp.jpg") { echo "checked";};?>> Green
                                    </label>
                                    <br>
                                    <label for="orange">
                                        <input type="radio" id="orange" name="choice" value="2" <?php if ($_SESSION["pfp"]==="orangepfp.jpg") { echo "checked";};?>> Orange
                                    </label>
                                </div>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                        <div class="col-5 m-auto">
                            <?= "<p class='mt-3'>Username: " . $_SESSION["username"] . "</p>" ?>
                            <?= "<p class='mt-3'>Email: " . $_SESSION["email"] . "</p>" ?>
                            <?php 
                            $avg = 0;
                            foreach($_SESSION["user_reviews"] as $review){
                                $avg += $review["overall"];
                            }
                            $num_reviews = sizeof($_SESSION["user_reviews"]);
                            $avg = $num_reviews > 0 ? round($avg / $num_reviews,2) : 0;
                            ?>
                            <?= "<p class='mt-3'>Number of Reviews: " . $num_reviews . "</p>" ?>
                            <?= "<p class='mt-3'>Average Rating Given: " . $avg . " Stars</p>" ?>                            
                            <form action="?command=logout" method="post">
                                <button type="submit" class="btn btn-secondary mt-4"> Logout</button>
                            </form>
                            <form action="?command=warn-delete" method="POST">
                                <button type="submit" class="btn btn-danger mt-2"> Delete Account</button>
                            </form>
                        </div>
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