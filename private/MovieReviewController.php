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
        include("/opt/src/sprint3/userMovies.php");
    }
    function showRecommendations(){
        include("/opt/src/sprint3/userRecommendation.php");
    }
    function showReview(){
        include("/opt/src/sprint3/review.php");
    }
    function showHome(){
        include("/opt/src/sprint3/home.php");
    }
    function showLogin(){
        include("/opt/src/sprint3/login.php");
    }
    function showAccount(){
        include("/opt/src/sprint3/account.php");
    }
    function validateLogin(){
        $_SESSION["message"] = "";
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
            if(strlen($_POST["username"])<4){
                $_SESSION["message"] = "Username must be at least 4 characters";
                include("/opt/src/sprint3/login.php");
                return;
            } else if (!preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/", $_POST["email"])) {
                $_SESSION["message"] = "Invalid Email";
                include("/opt/src/sprint3/login.php");
                return;
            } else if (strlen($_POST["password"]<8)) {
                $_SESSION["message"] = "Password must be at least 8 characters";
                include("/opt/src/sprint3/login.php");
                return;
            }

            $results = pg_query($this->db, "select * from spr3_users where email = '" . $_POST["email"] . "';");
            if (pg_num_rows($results) > 0) {
                $row = pg_fetch_assoc($results);
                if (!password_verify($_POST["password"], $row["password"])) {
                    $_SESSION["message"] = "Incorrect Password!";
                    $this->showLogin();
                    return;
                }
            } else {
                pg_query($this->db, "insert into spr3_users (name, email, password) values ('".$_POST["username"]."', '". $_POST["email"]."','".password_hash($_POST["password"], PASSWORD_DEFAULT)."');");
            }
            //These will be displayed in navbar so creating a session variable for them will probably be easier
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["email"] = $_POST["email"];
            $pfp_case = pg_fetch_assoc(pg_query($this->db, "select pfp from spr3_users where name='".$_SESSION["username"]."';"))["pfp"];
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
}