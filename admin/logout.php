<?php
/**
 * Created by PhpStorm.
 * User: munis
 * Date: 7/8/17
 * Time: 2:26 PM
 */
session_start();
unset($_SESSION["session_id"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.php");
?>