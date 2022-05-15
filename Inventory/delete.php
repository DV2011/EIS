<?php 
include_once('../Database/config.php');
$id = $_GET['id'];
$sql = "DELETE FROM inventory WHERE id = $id";
$result = $mysqli->query($sql);
if ($result) {
    header('location: inventory.php');
}