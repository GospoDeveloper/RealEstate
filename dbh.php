<!-- conexiunea la baza de date -->
<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "proiectimobiliare";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}