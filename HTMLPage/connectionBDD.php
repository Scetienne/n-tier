<?php

$servername = "localhost";
$username = "etienne";
$password = "etienne";
$dbname = "demandesaprentissage";

// Create database



// Create connection
$bdd = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
if (!$bdd) {
    die("Connection failed: " . mysqli_connect_error());
}

?>