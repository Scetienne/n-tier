<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demandesaprentissage";

// Create connection
$bdd = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$bdd) {
    die("Connection failed: " . mysqli_connect_error());
}

?>