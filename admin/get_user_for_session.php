<?php
include('../mysqli_connect.php');
session_start();
$id = (int) $_SESSION['session_id'];
$user_find = "SELECT * FROM `users` WHERE `id`='".$id."'";
$result_user = $mysqli->query($user_find);
function get_user() {
    global $result_user;
    foreach ($result_user as $item) {
        return $item;
    }
};
?>