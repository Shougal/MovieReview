<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <!-- Include CSS and other head elements -->
</head>
<body>
    <h1>Search Results</h1>
    <?php
    if (is_array($_SESSION['search_results'])) {
        foreach ($_SESSION['search_results'] as $movie) {
            
            echo "<div><h2>" . htmlspecialchars($movie['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($movie['description']) . "</p></div>";
        }
    } else {
        echo "<p>" . $_SESSION['search_results'] . "</p>";
    }
    ?>
</body>
</html>
