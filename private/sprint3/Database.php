<?php

/**
 * Database class for handling PostgreSQL database operations.
 */
class Database {
    private $dbConnector;

    public function __construct() {
        $host = Config::$db["host"];
        $user = Config::$db["user"];
        $database = Config::$db["database"];
        $password = Config::$db["pass"];
        $port = Config::$db["port"];

        $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
        if (!$this->dbConnector) {
            die('Failed to connect to database: ' . pg_last_error());
        }
        $this->initializeDatabase();
    }

    public function query($query, ...$params) {
        $res = pg_query_params($this->dbConnector, $query, $params);

        if ($res === false) {
            echo pg_last_error($this->dbConnector);
            return false;
        }

        return pg_fetch_all($res);
    } 

    private function initializeDatabase() {
        $this->createSequences();
        $this->createTables();
    }

    private function createSequences() {
        $sequences = [
            "CREATE SEQUENCE IF NOT EXISTS users_seq_spr3;",
            "CREATE SEQUENCE IF NOT EXISTS movies_seq_spr3;",
            "CREATE SEQUENCE IF NOT EXISTS reviews_seq_spr3;"
        ];

        foreach ($sequences as $sql) {
            $this->query($sql);
        }
    }

    private function createTables() {
        $tables = [
            "CREATE TABLE IF NOT EXISTS users_spr3 (
                id INTEGER PRIMARY KEY DEFAULT nextval('users_seq_spr3'),
                name TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL
            );",

            "CREATE TABLE IF NOT EXISTS movies_spr3 (
                id INTEGER PRIMARY KEY DEFAULT nextval('movies_seq_spr3'),
                title TEXT NOT NULL,
                thumbnail_url TEXT,
                description TEXT,
                avg_overall NUMERIC,
                avg_feel_good NUMERIC,
                avg_suspense NUMERIC,
                avg_thrill NUMERIC,
                avg_scare NUMERIC,
                avg_romance NUMERIC,
                avg_acting NUMERIC,
                avg_pacing NUMERIC,
                avg_rewatch NUMERIC,
                avg_cinema NUMERIC
            );",

            "CREATE TABLE IF NOT EXISTS reviews_spr3 (
                id INTEGER PRIMARY KEY DEFAULT nextval('reviews_seq_spr3'),
                user_id INTEGER REFERENCES users_spr3(id) ON DELETE CASCADE,
                movie_id INTEGER REFERENCES movies_spr3(id) ON DELETE CASCADE,
                review TEXT,
                overall INT,
                feel_good INT,
                suspense INT,
                thrill INT,
                scare INT,
                romance INT,
                acting INT,
                pacing INT,
                rewatch INT,
                cinema INT
            );"
        ];

        foreach ($tables as $sql) {
            $this->query($sql);
        }
    }
}

?>
