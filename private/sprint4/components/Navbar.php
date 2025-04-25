<nav class="navbar navbar-expand-lg navbar-light ">
    <p class="navbar-brand ml-0 mt-0 mb-0 mr-4">
        <img src="images/MR.png" width="30" height="30" class="d-inline-block align-top" alt="">
                MovieReviews
    </p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="mynavlinks">
            <li class="nav-item">
                <form action="?command=home" method="post">
                    <button class="btn btn-link text-light" type="submit">Home</button>
                </form>
            </li>
            <?php
            if (isset($_SESSION["username"])){
                echo '<li class="nav-item">
                <form action="?command=user_movies" method="post">
                    <button class="btn btn-link text-light" type="submit">Your Movies</button>
                </form>
            </li>
            <li class="nav-item">
                <form action="?command=recommendations" method="post">
                    <button class="btn btn-link text-light" type="submit">Recommendations</button>
                </form>
            </li>
            <li class="nav-item active">
                                           <form action="?command=search" method="post">
                                                <input type="hidden" name="reviewing" value="true">
                                               <button class="btn btn-link text-light" type="submit">Review</button>
                                           </form>
                                         </li>';
            } else {
                echo '<li class="nav-item active">
                                           <form action="?command=login" method="post">
                                               <button class="btn btn-link text-light" type="submit">Login</button>
                                           </form>
                                         </li>';
            }
            ?>
        </ul>

        <form class="form-inline my-2 my-lg-0 mr-auto" method="get">
            <input type="hidden" name="command" value="search">
            <div class="d-flex flex-column" style="position: relative;">
                <input class="form-control mr-sm-2" type="search" placeholder="Search All Movies" aria-label="Search" name="query" id="search-bar">
                <div id="search-results" style="position: absolute; z-index: 1000; margin-top:3rem; background-color: white; color: black; border-radius: 50px;"></div>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div id="mode-toggle-container" style="cursor: pointer; top: 50px;">
        </div>
        <?php
        if(isset($_SESSION["username"])){
            echo '<form class="form-inline ml-2" action="?command=account" method="post">
                                       <button class="d-flex" style="background: none; border: none; cursor: pointer;" type="submit">
                                           <p class="mt-3 text-light">' . $_SESSION["username"] . '</p>
                                           <img src="images/'.$_SESSION["pfp"].'" alt="Profile photo for the active user" class="ml-2" id="pfp">
                                       </button>
                                     </form>';
        } else {
            echo '<form class="form-inline ml-2" action="?command=login" method="post">
                                       <button class="d-flex" style="background: none; border: none; cursor: pointer;" type="submit">
                                           <p class="mt-3 text-light"> Guest </p>
                                           <img src="images/defaultpfp.jpg" alt="Default profile photo for an anonymous user" class="ml-2" id="pfp">
                                       </button>
                                     </form>';
        }
        ?>
    </div>
</nav>