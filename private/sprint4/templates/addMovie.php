<!-- Only show if logged in -->
<?php if (isset($_SESSION['email'])): ?>
<form action="?command=add_movie" method="post">
    <label> Movie Title
        <input type="text" name="title" id="title" placeholder="Title" required>
    </label>
    <label> Description of Movie
        <textarea name="bio" id="bio" placeholder="Description"></textarea>
    </label>
    <button type="submit">Add Movie</button>
</form>
<?php endif; ?>
