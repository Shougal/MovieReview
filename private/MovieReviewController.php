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
            case "home":
            default:
                $this->showHome();
                break;
        }
    }

    function showUserMovies(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/userMovies.html");
    }
    function showRecommendations(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/userRecommendation.html");
    }
    function showReview(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/review.html");
    }
    function showHome(){
        include("/students/qvh7fp/students/qvh7fp/private/sprint3/home.html");
    }
}