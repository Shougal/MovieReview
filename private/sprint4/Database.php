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
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Inception','https://th.bing.com/th/id/R.b7943577d7dd857627dfc22b37258720?rik=HAvhLTK9EMjx9A&riu=http%3a%2f%2fimages2.fanpop.com%2fimage%2fphotos%2f12300000%2fInception-Wallpaper-inception-2010-12396931-1440-900.jpg&ehk=kGnhVejE1I3qWN7tfXRrJF05TnQmhfOmmZFPdIQ%2fmYU%3d&risl=&pid=ImgRaw&r=0','A mind-bending thriller about dreams.',4.4,1.6,4.55,4.35,1.25,2.0,4.45,4.2,4.1,4.5) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Dark Knight','https://www.themoviedb.org/t/p/original/eP5NL7ZlGoW9tE9qnCdHpOLH1Ke.jpg','A gripping superhero film with deep themes.',4.5,1.5,4.45,4.6,1.0,1.75,4.65,4.35,4.5,4.75) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Interstellar','https://th.bing.com/th/id/R.be5c4cacd23a891ba6d6095ede78b306?rik=Q6JWzUTKGfxnow&riu=http%3a%2f%2fwww.moviehdwallpapers.com%2fwp-content%2fuploads%2f2014%2f03%2fInterstellar-2014-Movie-Wallpapers.jpg&ehk=heLFvSzqNGUNmGH4ixG%2b6LdN8S5m%2by6%2b08mxsTk4REg%3d&risl=&pid=ImgRaw&r=0','A visually stunning space epic.',4.3,2.6,4.25,4.0,0.75,2.9,4.5,4.25,4.15,4.7) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Parasite','https://www.vintagemovieposters.co.uk/wp-content/uploads/2020/03/IMG_3746-scaled.jpeg','A dark comedy thriller about class divide.',4.45,2.0,4.5,4.25,1.1,1.9,4.55,4.4,4.2,4.65) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Whiplash','https://www.themoviedb.org/t/p/original/3XriEpTdnplQRzyphAC0cu3emns.jpg','A gripping drama about ambition and sacrifice.',4.35,1.9,4.1,4.3,0.9,1.25,4.75,4.45,4.05,4.6) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Get Out','https://explainedthis.com/wp-content/uploads/2023/03/Get-Out-Movie.jpg','A horror thriller with social commentary.',4.0,1.4,4.35,4.05,3.75,1.0,4.25,4.1,3.95,4.35) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Grand Budapest Hotel','https://www.themoviedb.org/t/p/original/eWdyYQreja6JGCzqHWXpWHDrrPo.jpg','A colorful and quirky comedy-drama.',4.05,3.6,3.0,2.75,0.5,3.75,4.2,3.9,4.25,4.45) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Mad Max: Fury Road','https://streamcoimg-a.akamaihd.net/000/958/725/958725-PosterArt-9c8a794585ccec6a2528eb23d07039ab.jpeg','A high-octane action-packed adventure.',4.2,1.5,3.9,4.65,1.0,1.25,4.35,4.55,4.0,4.5) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('The Social Network','https://brobible.com/wp-content/uploads/2020/10/the-social-network.jpg','A sharp drama about the rise of Facebook.',4.25,1.25,3.75,3.9,0.5,1.6,4.5,4.3,4.15,4.55) ON CONFLICT (title) DO NOTHING");
        $this->query("insert into movies_final (title,thumbnail_url,bio,avg_overall,avg_feel_good,avg_suspense,avg_thrill,avg_scare,avg_romance,avg_acting,avg_pacing,avg_rewatch,avg_cinema) values ('Her','https://wallup.net/wp-content/uploads/2016/08/08/108467-Film_posters-Her_movie-Spike_Jonze-Joaquin_Phoenix.jpg','A unique romance between man and AI.',3.4,3.25,3.0,2.5,0.6,4.5,4.4,4.05,3.95,4.4) ON CONFLICT (title) DO NOTHING");


    }
    public function dropTables() {
        $tables = [
            "DROP TABLE IF EXISTS reviews_final CASCADE;",
            "DROP TABLE IF EXISTS movies_final CASCADE;",
            "DROP TABLE IF EXISTS users_final CASCADE;"
        ];
        foreach ($tables as $sql) {
            $this->query($sql);
        }
        $sequences = [
            "DROP SEQUENCE IF EXISTS users_final_seq CASCADE;",
            "DROP SEQUENCE IF EXISTS movies_final_seq CASCADE;"
        ];
        foreach ($sequences as $sql) {
            $this->query($sql);
        }
    }

    private function createSequences() {
        $sequences = [
            "CREATE SEQUENCE IF NOT EXISTS users_final_seq;",
            "CREATE SEQUENCE IF NOT EXISTS movies_final_seq;"
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

            "CREATE TABLE IF NOT EXISTS movies_final (
                id INTEGER PRIMARY KEY DEFAULT nextval('movies_final_seq'),
                title TEXT NOT NULL unique,
                thumbnail_url TEXT default '',
                bio TEXT default '',
                avg_overall NUMERIC default 0,
                avg_feel_good NUMERIC default 0,
                avg_suspense NUMERIC default 0,
                avg_thrill NUMERIC default 0,
                avg_scare NUMERIC default 0,
                avg_romance NUMERIC default 0,
                avg_acting NUMERIC default 0, 
                avg_pacing NUMERIC default 0,
                avg_rewatch NUMERIC default 0,
                avg_cinema NUMERIC default 0
            );",

            "CREATE TABLE IF NOT EXISTS reviews_final (
                user_id INTEGER REFERENCES users_final(id) ON DELETE CASCADE,
                movie_id INTEGER REFERENCES movies_final(id) ON DELETE CASCADE,
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
                PRIMARY KEY (user_id,movie_id)
            );"
        ];

        foreach ($tables as $sql) {
            $this->query($sql);
        }
    }
}

?>