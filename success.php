<?php
require_once "classes/Authentication.php";
session_start();

$title = "Login Success";
$pageHeading = "Login Successful";


if (isset($_SESSION["theme"])) {
    $theme = $_SESSION["theme"] . ".css";
} else {
    $theme = "style.min.css";
}


$loginName = $_SESSION["username"];
//start buffer
ob_start();
//display create user form
include "templates/success.html.php";
$output = ob_get_clean();
include "templates/adminLayout.html.php";
