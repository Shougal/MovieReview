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
            case "search":
                $this->searchMovies();
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
        $query = $this->input['query'] ?? '';  // Get the search query from input, defaulting to an empty string if not set
        $query = trim($query);  // Trim whitespace
    
        // Validate the input to ensure it only contains letters, numbers, and spaces
        if (!preg_match("/^[a-zA-Z0-9\s]*$/", $query)) {
            echo "Invalid input. Only alphanumeric characters and spaces are allowed.";
            return;
        }
    
        // SQL query to search the movies table. Use parameterized queries to prevent SQL injection
        $result = pg_prepare($this->db, "search_query", 'SELECT * FROM spr3_movies WHERE title ILIKE $1 OR description ILIKE $1');
        $result = pg_execute($this->db, "search_query", array("%$query%"));
    
        if ($result) {
            $found = pg_num_rows($result);
            if ($found > 0) {
                echo "<h1>Search Results</h1>";
                while ($movie = pg_fetch_assoc($result)) {
                    echo "<div><h2>" . htmlspecialchars($movie['title']) . "</h2>";
                    echo "<p>" . htmlspecialchars($movie['description']) . "</p></div>";
                }
            } else {
                echo "No results found for '" . htmlspecialchars($query) . "'.";
            }
        } else {
            echo "An error occurred with the search.";
        }
    }
    
}