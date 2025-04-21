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
        <link rel="stylesheet" href="styles/home.css">

        <script src="/qvh7fp/sprint4/js/custom.js"></script>
        <style id="theme"></style>
    </head>
    <body>
        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Navbar.php");
          ///include("/opt/src/sprint4/components/Navbar.php");
        ?>

        <?php
        $sql = "SELECT * FROM movies_final;"; //TODO: Recommendation algorithm
        $recommendations = $this->db->query($sql);
        ?>

        <?php
        $movie = $this->db->query($sql)[0];
        $recQuality = 98;
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Recommendation.php");
      ///include("/opt/src/sprint4/components/Recommendation.php");
        ?>
        <?php
        $movie = $this->db->query($sql)[1];
        $recQuality = 80;
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Recommendation.php");
      ///include("/opt/src/sprint4/components/Recommendation.php");
        ?>
        <?php
        $movie = $this->db->query($sql)[2];
        $recQuality = 54;
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Recommendation.php");
      ///include("/opt/src/sprint4/components/Recommendation.php");
        ?>

        <?php
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/Footer.php");
          ///include("/opt/src/sprint4/components/Footer.php");
        ?>
    </body>
</html>