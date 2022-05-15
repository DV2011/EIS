<?php
//create logged in user session
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
