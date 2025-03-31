<?php
    $config = include('Config.php');

    $dbHandle = pg_connect("host={$config['host']} port={$config['port']} dbname={$config['database']} user={$config['user']} password={$config['pass']}");
    if ($dbHandle) {
        echo "Success connecting to database<br>\n";
    } else {
        die("An error occurred connecting to the database");
    }


    
    // Drop tables and sequences (that are created later)
    $res  = pg_query($dbHandle, "drop sequence if exists spr3_users_seq cascade;");
    $res  = pg_query($dbHandle, "drop sequence if exists spr3_reviews_seq cascade;");
    $res  = pg_query($dbHandle, "drop sequence if exists spr3_movies_seq cascade;");
    $res  = pg_query($dbHandle, "drop table if exists spr3_users cascade;");
    $res  = pg_query($dbHandle, "drop table if exists spr3_reviews cascade;");
    $res  = pg_query($dbHandle, "drop table if exists spr3_movies cascade;");
    
    // Create sequences
    $res  = pg_query($dbHandle, "create sequence spr3_users_seq;");
    $res  = pg_query($dbHandle, "create sequence spr3_reviews_seq;");
    $res  = pg_query($dbHandle, "create sequence spr3_movies_seq;");
    
    // Create tables
    //TODO: adding constraints like UNIQUE for email to prevent duplicate registrations.
    // Add NOT NULL 
    $res  = pg_query($dbHandle, "create table spr3_users (
            id int primary key default nextval('spr3_users_seq'),
            name text,
            email text,
            password text);");

        //TODO:  ensure uid (user ID) and mid (movie ID) are linked to their respective tables using foreign key constraints. 
    $res  = pg_query($dbHandle, "create table spr3_reviews (
            id int primary key default nextval('spr3_reviews_seq'),
            uid int,
            mid int,
            review text,
            overall int,
            feel_good int,
            suspense int,
            thrill int,
            scare int,
            romance int,
            acting int,
            pacing int,
            rewatch int,
            cinema int,);");

            //TODO: could include more metadata about movies, such as title, director, and release_date. 
    $res  = pg_query($dbHandle, "create table spr3_movies (
            id int primary key default nextval('spr3_movies_seq'),
            thumbnail_url text,
            description text,
            avg_overall numeric,
            avg_feel_good numeric,
            avg_suspense numeric,
            avg_thrill numeric,
            avg_scare numeric,
            avg_romance numeric,
            avg_acting numeric,
            avg_pacing numeric,
            avg_rewatch numeric,
            avg_cinema numeric,);");

    echo "Tables created<br>\n";