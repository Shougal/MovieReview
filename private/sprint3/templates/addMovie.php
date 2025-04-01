<!-- Only show if logged in -->
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
<form action="?command=add_movie" method="post">
    <input type="text" name="title" placeholder="Movie Title" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Add Movie</button>
</form>
<?php endif; ?>
