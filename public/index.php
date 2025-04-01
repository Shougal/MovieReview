<?php
// Sources used:
// Published Link:

// DEBUGGING ONLY! Show all errors.
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Class autoloading by name.  All our classes will be in a directory
// that Apache does not serve publicly.  They will be in /opt/src/, which
// is our src/ directory in Docker.
spl_autoload_register(function ($classname) {
//     include "/students/xdq9qa/students/xdq9qa/private/sprint3/$classname.php";
    include "/opt/src/sprint3/$classname.php";
    
});

// Other global things that we need to do

// Instantiate the front controller
$controller = new MovieReviewController($_GET);

// Run the controller
$controller ->run();




