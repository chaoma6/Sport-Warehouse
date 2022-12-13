<?php
require_once "classes/Authentication.php";
session_start();

$title = "Login";
$pageHeading = "Login";
//the authentication class is static so there is no need to create an instance of the class
$message = "";

if (isset($_SESSION["theme"])) {
    $theme = $_SESSION["theme"] . ".css";
} else {
    $theme = "style.min.css";
}



if (isset($_POST["loginSubmit"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        //authenticate user
        $loginSuccess = Authentication::login($_POST["username"], $_POST["password"]);
        if (!$loginSuccess) {
            $message = "Username or password incorrect";
            $error = true;
        }
    }
}
//start buffer
ob_start();
//display create user form
$output = ob_get_clean();
include "templates/loginForm.html.php";

?>