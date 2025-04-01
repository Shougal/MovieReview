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
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Inception','link1','A mind-bending thriller about dreams.',8.8,3.2,9.1,8.7,2.5,4.0,8.9,8.4,8.2,9.0)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Dark Knight','https://www.themoviedb.org/t/p/original/eP5NL7ZlGoW9tE9qnCdHpOLH1Ke.jpg','A gripping superhero film with deep themes.',9.0,3.0,8.9,9.2,2.0,3.5,9.3,8.7,9.0,9.5)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Interstellar','https://th.bing.com/th/id/R.be5c4cacd23a891ba6d6095ede78b306?rik=Q6JWzUTKGfxnow&riu=http%3a%2f%2fwww.moviehdwallpapers.com%2fwp-content%2fuploads%2f2014%2f03%2fInterstellar-2014-Movie-Wallpapers.jpg&ehk=heLFvSzqNGUNmGH4ixG%2b6LdN8S5m%2by6%2b08mxsTk4REg%3d&risl=&pid=ImgRaw&r=0','A visually stunning space epic.',8.6,5.2,8.5,8.0,1.5,5.8,9.0,8.5,8.3,9.4)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Parasite','https://www.vintagemovieposters.co.uk/wp-content/uploads/2020/03/IMG_3746-scaled.jpeg','A dark comedy thriller about class divide.',8.9,4.0,9.0,8.5,2.2,3.8,9.1,8.8,8.4,9.3)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Whiplash','https://www.themoviedb.org/t/p/original/3XriEpTdnplQRzyphAC0cu3emns.jpg','A gripping drama about ambition and sacrifice.',8.7,3.8,8.2,8.6,1.8,2.5,9.5,8.9,8.1,9.2)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Get Out','https://explainedthis.com/wp-content/uploads/2023/03/Get-Out-Movie.jpg','A horror thriller with social commentary.',8.0,2.8,8.7,8.1,7.5,2.0,8.5,8.2,7.9,8.7)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Grand Budapest Hotel','https://www.themoviedb.org/t/p/original/eWdyYQreja6JGCzqHWXpWHDrrPo.jpg','A colorful and quirky comedy-drama.',8.1,7.2,6.0,5.5,1.0,7.5,8.4,7.8,8.5,8.9)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Mad Max: Fury Road','https://streamcoimg-a.akamaihd.net/000/958/725/958725-PosterArt-9c8a794585ccec6a2528eb23d07039ab.jpeg','A high-octane action-packed adventure.',8.4,3.0,7.8,9.3,2.0,2.5,8.7,9.1,8.0,9.0)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Social Network','https://brobible.com/wp-content/uploads/2020/10/the-social-network.jpg','A sharp drama about the rise of Facebook.',8.5,2.5,7.5,7.8,1.0,3.2,9.0,8.6,8.3,9.1)");
        $this->query("insert into movies_spr3 (title,thumbnail_url,description,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Her','https://wallup.net/wp-content/uploads/2016/08/08/108467-Film_posters-Her_movie-Spike_Jonze-Joaquin_Phoenix.jpg','A unique romance between man and AI.',8.2,6.5,6.0,5.0,1.2,9.0,8.8,8.1,7.9,8.8)");

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
                password TEXT NOT NULL,
                pfp INTEGER NOT NULL default 0
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