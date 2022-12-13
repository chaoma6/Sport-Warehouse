<?php

require_once "classes/Authentication.php";
session_start();

Authentication::protect();

//read stylesheet theme from session
if (isset($_SESSION["theme"])) 
{
    $theme = $_SESSION["theme"]. ".css";
} else {
    $theme = "style.min.css";
}

if (isset($_POST["submit"])) {
    //get the selected colour theme
    $_SESSION["theme"] = $_POST["theme"];
    $theme = $_SESSION["theme"] . ".css";
}

$title = "Change Theme";

// start buffer
ob_start();

include "templates/theme.html.php";

$output = ob_get_clean();

include "templates/adminLayout.html.php";
?>
