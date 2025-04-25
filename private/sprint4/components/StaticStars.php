<?php
for ($i = 0; $i < $rating; $i++) {
    echo "<label style='color: gold'>&#9733;</label>";
}
for ($i = 0; $i < 5-$rating; $i++) {
    echo "<label style='color: grey'>&#9733;</label>";
}
?>