<?php

$severname = "localhost";
$username = "id17457870_test123";
$password = "Vedant@6403$";
$database = "id17457870_test";

$conn = mysqli_connect($severname, $username, $password, $database);
// echo "<br>";
if (!$conn) {

    die("Connection Failed<br>". mysqli_connect_error());
}

?>
