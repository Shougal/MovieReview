<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class MovieReviewController {
    private $db;
    /**
     * Constructor
     */
    public function __construct($input) {
        session_start();
        $this->db = new Database();
        $this->input=$input;
    }

    public function run() {
        $command = "home";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        switch($command) {
            case "login":
                $this->showLogin();
                break;
            case "account":
                $this->showAccount();
                break;
            case "user_movies":
                $this->showUserMovies();
                break;
            case "recommendations":
                $this->showRecommendations();
                break;
            case "review":
                $this->showReview();
                break;
            case "validate-login":
                $this->validateLogin();
                break;
            case "logout":
                $this->logout();
                break;
            case 'add_movie':
                $this->addMovie();
                break;
            case "search":
                $this->searchMovies();
                break;
            case "set-pfp":
                $this->changePfp();
                break;
            case "api_get_movies":
                $this->getMoviesAsJson();
                break;
            case "db-destroy": //TODO: Take this out before publishing officially - dev tool only
                $this->destroyDB();
                break;
            case "home":
            default:
                $this->showHome();
                break;
        }
    }

    function destroyDB() {
        $this->db->dropTables();
    }

    function showLogin(){
        // include("/opt/src/sprint4/templates/login.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
    }
    function showAccount(){
        // include("/opt/src/sprint4/templates/account.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/account.php");
    }
    function showUserMovies(){
        // include("/opt/src/sprint4/templates/userMovies.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/userMovies.php");
    }
    function showRecommendations(){
        // include("/opt/src/sprint4/templates/userRecommendation.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/userRecommendation.php");
    }
    function showReview(){
        // include("/opt/src/sprint4/templates/review.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/review.php");
        
    }
    function showHome(){
        // include("/opt/src/sprint4/templates/home.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/home.php");
        
    }
    function showAddMovieForm() {
        // include("/opt/src/sprint4/templates/addMovie.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/addMovie.php");
    }

    function validateLogin(){
        $_SESSION["message"] = "";
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
            if(strlen($_POST["username"])<4){
                $_SESSION["message"] = "Username must be at least 4 characters";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
                // include("/opt/src/sprint4/templates/login.php");
                return;
            } else if (!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/", $_POST["email"])) {
                $_SESSION["message"] = "Invalid Email";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
                // include("/opt/src/sprint4/templates/login.php");
                return;
            } else if (strlen($_POST["password"]<8)) {
                $_SESSION["message"] = "Password must be at least 8 characters";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
                // include("/opt/src/sprint4/templates/login.php");
                return;
            }

            $statement = "select * from users_final where email = '" . $_POST["email"] . "';";
            $results = $this->db->query($statement);
            unset($statement);
            if (count($results) > 0) {
                if (!password_verify($_POST["password"], $results[0]["password"])) {
                    $_SESSION["message"] = "Incorrect Password!";
                    $this->showLogin();
                    return;
                }
            } else {
                $statement = "insert into users_final (name, email, password) values ('".$_POST["username"]."', '". $_POST["email"]."','".password_hash($_POST["password"], PASSWORD_DEFAULT)."');";
                $this->db->query($statement);
                unset($statement);
            }
            //These will be displayed in navbar so creating a session variable for them will probably be easier
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["email"] = $_POST["email"];

            //Flag that user is logged in:
            $_SESSION["logged_in"] = true;

            $statement = "select * from users_final where name='".$_SESSION["username"]."';";
            $pfp_case = $this->db->query($statement)[0]["pfp"];
            switch($pfp_case){
                case "0":
                    $_SESSION["pfp"] = "bluepfp.jpg";
                    break;
                case "1":
                    $_SESSION["pfp"] = "greenpfp.jpg";
                    break;
                case "2":
                    $_SESSION["pfp"] = "orangepfp.jpg";
                    break;
            }
        }
        $this->showHome();
    }

    function logout(){
        $_SESSION["logged_in"] = false;
        session_destroy();
        session_start();
        $this->showHome();
    }

    function addMovie() {
        if (!isset($_SESSION['email'])) {
           $this->showLogin();
           $_SESSION['message'] = "You are not logged in";
           return;
        }
        if (!(isset($_POST['title']) &&  isset($_POST['bio']))) {
            $this->showAddMovieForm();
            return;
        }

        $sql = "INSERT INTO movies_final (title, bio) VALUES ($1, $2) ON CONFLICT (title) DO NOTHING;";
        $this->db->query($sql, $_POST['title'], $_POST['bio']);
        $this->showHome();
        exit;
    }

    private function searchMovies() {
        $query = isset($_GET['query']) ? $_GET['query'] : '';  // Get the search query from input, defaulting to an empty string if not set
        $query = trim($query);  // Trim whitespace

        // Validate the input
        if (!preg_match("/^[a-zA-Z0-9\s]*$/", $query)) {
            $_SESSION['search_results'] = "Invalid input. Only alphanumeric characters and spaces are allowed.";
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/Search.php");
            // include("/opt/src/sprint4/templates/Search.php");
            return;
        }

        $sql = 'SELECT * FROM movies_final WHERE title ILIKE $1;';
        $movies = $this->db->query($sql, $query);

        if (!empty($movies)) {
            $_SESSION['search_results'] = $movies;
        } else {
            $_SESSION['search_results'] = "No results found for '" . htmlspecialchars($query) . "'.";
        }
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/Search.php");
        // include("/opt/src/sprint4/templates/Search.php");
    }

    function changePfp(){
        if(!isset($_POST["choice"])){
            $this->showAccount();
            return;
        }
        $pfp_choice = (int) $_POST["choice"];
        $statement = "UPDATE users_final SET pfp = ".$pfp_choice." WHERE email = '".$_SESSION["email"]."';";
        $this->db->query($statement);
        unset($statement);
        switch($pfp_choice){
            case "1":
                $_SESSION["pfp"] = "bluepfp.jpg";
                break;
            case "2":
                $_SESSION["pfp"] = "greenpfp.jpg";
                break;
            case "3":
                $_SESSION["pfp"] = "orangepfp.jpg";
                break;
        }
        $this->showAccount();
    }

    public function getMoviesAsJson() {
        $movies = $this->db->query("SELECT * FROM movies_final");
        if(empty($movies)){
            echo "no movies";
        }
        header('Content-Type: application/json');
        echo json_encode($movies);
        exit;
    }
}