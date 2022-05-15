<?php 
//Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "book";

$mysqli = new mysqli($host, $username, $password, $database);
if (!$mysqli) {
    die("Cannot connect to mysql");
}
//Reset id
mysqli_query($mysqli, "SET @autoid :=0;");
mysqli_query($mysqli, "UPDATE inventory SET id = @autoid:=(@autoid+1);");
mysqli_query($mysqli, "ALTER TABLE inventory AUTO_INCREMENT=1;");
mysqli_query($mysqli, "UPDATE users SET id = @autoid:=(@autoid+1);");
mysqli_query($mysqli, "ALTER TABLE users AUTO_INCREMENT=1;");