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
        $this->input = $input;

        if(!isset($this->db)){
            $config = include('Config.php');
            $this->db = pg_connect("host={$config['host']} port={$config['port']} dbname={$config['database']} user={$config['user']} password={$config['pass']}");
        }
        if (!$this->db) {
            echo "Couldnt connect to DB\n";
        }
    }

    /**
     * Run the server
     *
     * Given the input (usually $_GET), then it will determine
     * which command to execute based on the given "command"
     * parameter.  Default is the welcome page.
     */
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
            case "home":
            default:
                $this->showHome();
                break;
        }
    }

    function showUserMovies(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/userMovies.php");
    }
    function showRecommendations(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/userRecommendation.php");
    }
    function showReview(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/review.php");
    }
    function showHome(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/home.php");
    }
    function showLogin(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/login.php");
    }
    function showAccount(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/account.php");
    }
    function validateLogin(){
        $_SESSION["message"] = "";
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
            if(strlen($_POST["username"])<4){
                $_SESSION["message"] = "Username must be at least 4 characters";
                $this->showLogin();
                return;
            } else if (!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/", $_POST["email"])) {
                $_SESSION["message"] = "Invalid Email";
                $this->showLogin();
                return;
            } else if (strlen($_POST["password"]<8)) {
                $_SESSION["message"] = "Password must be at least 8 characters";
                $this->showLogin();
                return;
            }
            //These will be displayed in navbar so creating a session variable for them will probably be easier
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["pfp"] = "check.png"; //TODO: Allow users to pick a pfp

            //TODO: Add users to db
        }
        $this->showHome();
    }
    function logout(){
        session_destroy();
        session_start();
        $this->showHome();
    }
}