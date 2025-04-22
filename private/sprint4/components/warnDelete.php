<div class="card" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="card-header text-dark">
        <h2>Are you sure you want to delete your account?</h2>
    </div>
    <div class="card-body">
        <p class="text-dark">This action cannot be undone.</p>
        <form action="?command=delete-account" method="POST">
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
        <form action="?command=account" method="POST">
            <button type="submit" class="btn btn-secondary mt-3">Cancel</button>
        </form>
    </div>
</div>