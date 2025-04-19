<?php
// Sources used: https://www.php.net/manual/en/
//               https://getbootstrap.com/docs/4.0/components/navs/
// Published Link: https://cs4640.cs.virginia.edu/qvh7fp/sprint3/
// Authors: Rob Keys, Shoug Alharbi

// DEBUGGING ONLY! Show all errors.
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Class autoloading by name.  All our classes will be in a directory
// that Apache does not serve publicly.  They will be in /opt/src/, which
// is our src/ directory in Docker.
spl_autoload_register(function ($classname) {
     include "/students/qvh7fp/students/qvh7fp/private/sprint3/$classname.php";
});

// Other global things that we need to do

// Instantiate the front controller
$controller = new MovieReviewController($_GET);

// Run the controller
$controller ->run();




