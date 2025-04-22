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
    public function dropTables() {
        $tables = [
            "DROP TABLE IF EXISTS reviews_final CASCADE;",
            "DROP TABLE IF EXISTS users_final CASCADE;"
        ];
        foreach ($tables as $sql) {
            $this->query($sql);
        }
        $sequences = [
            "DROP SEQUENCE IF EXISTS users_final_seq CASCADE;"
        ];
        foreach ($sequences as $sql) {
            $this->query($sql);
        }
    }

    private function createSequences() {
        $sequences = [
            "CREATE SEQUENCE IF NOT EXISTS users_final_seq;"
        ];

        foreach ($sequences as $sql) {
            $this->query($sql);
        }
    }

    private function createTables() {
        $tables = [
            "CREATE TABLE IF NOT EXISTS users_final (
                id INTEGER PRIMARY KEY DEFAULT nextval('users_final_seq'),
                name TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                pfp INTEGER NOT NULL default 0
            );",

            'CREATE TABLE IF NOT EXISTS reviews_final (
                user_id INTEGER REFERENCES users_final(id) ON DELETE CASCADE,
                "imdbID" TEXT NOT NULL,
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
                cinema INT,
                PRIMARY KEY (user_id,"imdbID")
            );'
        ];

        foreach ($tables as $sql) {
            $this->query($sql);
        }
    }
}

?>