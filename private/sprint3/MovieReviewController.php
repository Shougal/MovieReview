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
            case "user_movies":
                $this->showUserMovies();
                break;
            case "recommendations":
                $this->showRecommendations();
                break;
            case "review":
                $this->showReview();
                break;
            case "search":
                $this->searchMovies();
                break;
            case "login":
                $this->showLogin();
                break;
            case "validate-login":
                $this->validateLogin();
                break;
            case "logout":
                $this->logout();
                break;
            case "account":
                $this->showAccount();
                break;
            case "api_get_movies":
                $this->getMoviesAsJson();
                break;
            case "db-destroy":
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
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/login.php");
        include("/opt/src/sprint3/templates/login.php");
    }
    function showAccount(){
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/account.php");
        include("/opt/src/sprint3/templates/account.php");
    }
    function showUserMovies(){
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/userMovies.php");
        include("/opt/src/sprint3/templates/userMovies.php");
        
    }
    function showRecommendations(){
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/userRecommendation.php");
        include("/opt/src/sprint3/templates/userRecommendation.php");
    }
    function showReview(){
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/review.php");
        include("/opt/src/sprint3/templates/review.php");
        
    }
    function showHome(){
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/home.php");
        include("/opt/src/sprint3/templates/home.php");
        
    }

    /** This shows all movies searched by the user based on query inputted */
    /** Sprint 3 Functionalities:
     * 1) Use of Arrays:
     *  Once the search query is executed using pg_execute, the results are fetched and stored in an array ($movies = [];
     *  2)  Use of Control Structures:
     *          Requirement Met: Employ loops for iterating through movie data and conditional statements for filtering search results based on user input.
     *          Implementation: The function uses conditional statements to check the validity of the user input and to handle the output based on whether the search results are empty or not. It also uses a loop (while ($movie = pg_fetch_assoc($result))) to iterate through each movie in the result set and display its details.
     *  3) Use of Built-in Functions:   
     *          trim() to remove whitespace from the user input.
     *          preg_match() to validate the input against a specific pattern.
     *          htmlspecialchars() to safely encode HTML special characters from the database output, preventing XSS (Cross-Site Scripting) attacks when displaying movie titles and descriptions.
     *  4) Form Submission and Handling:
     *          Requirement Met: Use $_GET for handling search queries submitted through a search form.
     *          Implementation: The search functionality is triggered by retrieving data sent via $_GET ($query = $this->input['query'] ?? '';
     *  5) Regular Expression:
     *          Requirement Met: Utilize regular expressions to validate and sanitize search inputs.
     *          Implementation: The function uses a regular expression (preg_match("/^[a-zA-Z0-9\s]*$/", $query)) to ensure that the search input only contains alphanumeric characters and spaces. 
     *  6) Secure Database Interaction:
     *           By preparing the SQL query with placeholders and executing it with actual parameters (pg_prepare and pg_execute), the function enhances security by separating data handling from SQL code execution, thereby preventing SQL injection attacks.
     */  
    private function searchMovies() {
    
        $query = isset($_GET['query']) ? $_GET['query'] : '';  // Get the search query from input, defaulting to an empty string if not set
        $query = trim($query);  // Trim whitespace
        
        
        // Validate the input
        if (!preg_match("/^[a-zA-Z0-9\s]*$/", $query)) {
            
            $_SESSION['search_results'] = "Invalid input. Only alphanumeric characters and spaces are allowed.";
            // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/Search.php");
            include("/opt/src/sprint3/templates/Search.php");
            return;
        }
    
        // $searchTerm = '%' . $query . '%';
        // echo $searchTerm;
        // SQL query
        $sql = 'SELECT * FROM movies_spr3 WHERE title ILIKE $1';
        $movies = $this->db->query($sql, $query);

        if (!empty($movies)) {
            $_SESSION['search_results'] = $movies;
        } else {
            $_SESSION['search_results'] = "No results found for '" . htmlspecialchars($query) . "'.";
        }
        // include("/students/xdq9qa/students/xdq9qa/private/sprint3/templates/Search.php");
        include("/opt/src/sprint3/templates/Search.php");
    }

    function validateLogin(){
        $_SESSION["message"] = "";
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
            if(strlen($_POST["username"])<4){
                $_SESSION["message"] = "Username must be at least 4 characters";
                include("/opt/src/sprint3/templates/login.php");
                return;
            } else if (!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/", $_POST["email"])) {
                $_SESSION["message"] = "Invalid Email";
                include("/opt/src/sprint3/templates/login.php");
                return;
            } else if (strlen($_POST["password"]<8)) {
                $_SESSION["message"] = "Password must be at least 8 characters";
                include("/opt/src/sprint3/templates/login.php");
                return;
            }

            $statement = "select * from users_spr3 where email = '" . $_POST["email"] . "';";
            $results = $this->db->query($statement);
            unset($statement);
            if (count($results) > 0) {
                if (!password_verify($_POST["password"], $results[0]["password"])) {
                    $_SESSION["message"] = "Incorrect Password!";
                    $this->showLogin();
                    return;
                }
            } else {
                $statement = "insert into users_spr3 (name, email, password) values ('".$_POST["username"]."', '". $_POST["email"]."','".password_hash($_POST["password"], PASSWORD_DEFAULT)."');";
                $this->db->query($statement);
                unset($statement);
            }
            //These will be displayed in navbar so creating a session variable for them will probably be easier
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["email"] = $_POST["email"];

            $statement = "select * from users_spr3 where name='".$_SESSION["username"]."';";
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

    // The following gets all movies as json
    public function getMoviesAsJson() {
        $movies = $this->db->query("SELECT * FROM movies_spr3");
        if(empty($movies)){
            echo "no movies";
        }
        header('Content-Type: application/json');
        echo json_encode($movies);
        exit;
    }
    
}