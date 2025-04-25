<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class MovieReviewController {
    private $db;
    private $api_key;

    /**
     * Constructor
     */
    public function __construct($input) {
        session_start();
        $this->db = new Database();
        $this->input=$input;
        $this->api_key = Config::$private_api_key;
    }

    public function run() {
        $command = "home";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        //otherwise the message lingers a really long time even when its outdated
        if($command != "login" && $command != "home"){
            $_SESSION["message"] = "";
        }
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
            case "movie":
                $this->showMovie();
                break;
            case "validate-login":
                $this->validateLogin();
                break;
            case "logout":
                $this->logout();
                break;
            case "search":
                $this->searchMovies();
                break;
            case "set-pfp":
                $this->changePfp();
                break;
            case "api_get_movies":
                $this->api_get_movies();
                break;    
            case "api_get_reviews":
                $this->getReviewsAsJson();
                break;
            case "leave-review":
                $this->leaveReview();
                break;
            case "warn-delete":
                $this->warnDelete();
                break;
            case "delete-account":
                $this->deleteAccount();
                break;    
            case "db-destroy": //todo: remove
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
        session_destroy();
        session_start();
    }

    function showLogin(){
      ///include("/opt/src/sprint4/templates/login.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
    }
    function showAccount(){
        $sql = "SELECT * FROM users_final WHERE email = '".$_SESSION['email']."';";
        $user_id = $this->db->query($sql)[0]["id"];
        $sql = "SELECT * FROM reviews_final WHERE user_id = '".$user_id."';";
        $_SESSION["user_reviews"] =  $this->db->query($sql);
      ///include("/opt/src/sprint4/templates/account.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/account.php");
    }
    function showUserMovies(){
      ///include("/opt/src/sprint4/templates/userMovies.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/userMovies.php");
    }
    function showRecommendations(){
        if (!isset($_SESSION["email"])){
            $this->showLogin();
            return;
        }
        ///include("/opt/src/sprint4/templates/userRecommendation.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/userRecommendation.php");
    }
    function showReview(){
        if (!isset($_SESSION["email"])){
            $this->showLogin();
            return;
        }
      ///include("/opt/src/sprint4/templates/review.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/review.php");
        
    }
    function showHome(){
      ///include("/opt/src/sprint4/templates/home.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/home.php");
        
    }
    function showAddMovieForm() {
      ///include("/opt/src/sprint4/templates/addMovie.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/addMovie.php");
    }

    function showMovie() {
        if(!isset($_POST["imdbID"])){
            $this->showHome();
            return;
        }
      ///include("/opt/src/sprint4/templates/movie.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/movie.php");
    }
    function warnDelete(){
      ///include("/opt/src/sprint4/templates/account.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/account.php");
      ///include("/opt/src/sprint4/components/warnDelete.php");
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/components/warnDelete.php");
    }

    function validateLogin(){
        $_SESSION["message"] = "";
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
            if(strlen($_POST["username"])<3){
                $_SESSION["message"] = "Username must be at least 3 characters";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
              ///include("/opt/src/sprint4/templates/login.php");
                return;
            } else if (!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/", $_POST["email"])) {
                $_SESSION["message"] = "Invalid Email";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
              ///include("/opt/src/sprint4/templates/login.php");
                return;
            } else if (strlen($_POST["password"]<8)) {
                $_SESSION["message"] = "Password must be at least 8 characters";
                include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/login.php");
              ///include("/opt/src/sprint4/templates/login.php");
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
        session_destroy();
        session_start();
        $this->showHome();
    }

    private function searchMovies() {
        $query = isset($_GET['query']) ? trim($_GET['query']) : 'a';  // Get the search query from input, defaulting to an empty string if not set
        if(strlen($query) < 3){
            $_SESSION['search_results'] = "You must enter at least 3 characters to search";
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/Search.php");
          ///include("/opt/src/sprint4/templates/Search.php");
            return;
        }
        //
        // Validate the input
        if (!preg_match("/^[a-zA-Z0-9]*$/", $query)) {
            $_SESSION['search_results'] = "Invalid input. Only alphanumeric characters are allowed.";
            include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/Search.php");
          ///include("/opt/src/sprint4/templates/Search.php");
            return;
        }

        $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&s=".$query;
        $response = file_get_contents($apiUrl);
        $movies = json_decode($response, true);

        if ($movies['Response'] == "True") {
            $_SESSION['search_results'] = $movies["Search"];
        } else {
            $_SESSION['search_results'] = "No results found for '" . htmlspecialchars($query) . "'.";
        }
        include("/students/qvh7fp/students/qvh7fp/private/sprint4/templates/Search.php");
      ///include("/opt/src/sprint4/templates/Search.php");
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
        $this->showAccount();
    }
    public function getReviewsAsJson() {
        $reviews = $this->db->query("SELECT * FROM reviews_final;");
        header('Content-Type: application/json');
        if(empty($reviews)){
            echo "There are no reviews";
        } else {
            echo json_encode($reviews);
        }
    }
    private function get_rating($star1_isset, $star2_isset, $star3_isset, $star4_isset, $star5_isset) {
        if($star5_isset === true){
            return 5;
        }
        else if($star4_isset === true){
            return 4;
        }
        else if($star3_isset === true){
            return 3;
        }
        else if($star2_isset === true){
            return 2;
        }
        else if($star1_isset === true){
            return 1;
        }
        else {
            return 0;
        }
    }
    public function leaveReview() {
        if (!isset($_SESSION['email'])) {
            $this->showLogin();
            $_SESSION['message'] = "You are not logged in";
            return;
        }
        $sql = "SELECT id FROM users_final WHERE email = '".$_SESSION["email"]."';";
        $user_id = $this->db->query($sql)[0]["id"];
        $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&i=".$_POST['imdbID'];
        $response = file_get_contents($apiUrl);
        $movie = json_decode($response, true);
        $imdbID = $movie["imdbID"];
        $review = $_POST["review"];
        $overall =      $this->get_rating(isset($_POST["star0"]), isset($_POST["star1"]), isset($_POST["star2"]), isset($_POST["star3"]), isset($_POST["star4"]));
        $feel_good =    $this->get_rating(isset($_POST["star5"]), isset($_POST["star6"]), isset($_POST["star7"]), isset($_POST["star8"]), isset($_POST["star9"]));
        $suspense =     $this->get_rating(isset($_POST["star10"]), isset($_POST["star11"]), isset($_POST["star12"]), isset($_POST["star13"]), isset($_POST["star14"]));
        $thrill =       $this->get_rating(isset($_POST["star15"]), isset($_POST["star16"]), isset($_POST["star17"]), isset($_POST["star18"]), isset($_POST["star19"]));
        $scare =        $this->get_rating(isset($_POST["star20"]), isset($_POST["star21"]), isset($_POST["star22"]), isset($_POST["star23"]), isset($_POST["star24"]));
        $romance =      $this->get_rating(isset($_POST["star25"]), isset($_POST["star26"]), isset($_POST["star27"]), isset($_POST["star28"]), isset($_POST["star29"]));
        $acting =       $this->get_rating(isset($_POST["star30"]), isset($_POST["star31"]), isset($_POST["star32"]), isset($_POST["star33"]), isset($_POST["star34"]));
        $pacing =       $this->get_rating(isset($_POST["star35"]), isset($_POST["star36"]), isset($_POST["star37"]), isset($_POST["star38"]), isset($_POST["star39"]));
        $rewatch =      $this->get_rating(isset($_POST["star40"]), isset($_POST["star41"]), isset($_POST["star42"]), isset($_POST["star43"]), isset($_POST["star44"]));
        $cinema =       $this->get_rating(isset($_POST["star45"]), isset($_POST["star46"]), isset($_POST["star47"]), isset($_POST["star48"]), isset($_POST["star49"]));
        $sql = "INSERT INTO reviews_final (user_id, \"imdbID\",review,overall,feel_good,suspense,thrill,scare,romance,acting,pacing,rewatch,cinema)
                VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13) ON CONFLICT (user_id,\"imdbID\") DO UPDATE SET review=EXCLUDED.review, overall=EXCLUDED.overall,feel_good=EXCLUDED.feel_good,suspense=EXCLUDED.suspense,thrill=EXCLUDED.thrill,scare=EXCLUDED.scare,romance=EXCLUDED.romance,acting=EXCLUDED.acting,pacing=EXCLUDED.pacing,rewatch=EXCLUDED.rewatch,cinema=EXCLUDED.cinema;";
        $this->db->query($sql, $user_id,$imdbID,$review,$overall,$feel_good,$suspense,$thrill,$scare,$romance,$acting,$pacing,$rewatch,$cinema);
        $_SESSION["message"] = "Your review has been submitted";
        $this->showHome();
    }
    function deleteAccount(){
        $sql = "DELETE FROM users_final WHERE email = '".$_SESSION["email"]."';";
        $this->db->query($sql);
        session_destroy();
        session_start();
        $_SESSION["message"] = "Your account has been deleted";
        $this->showHome();
    }
    function api_get_movies(){
        $query = $_GET['title'];
        header('Content-Type: application/json');
        $apiUrl = "https://www.omdbapi.com/?apikey=".$this->api_key."&s=".$query;
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);
        echo json_encode($data['Search']);
    }
}
