<?php
require_once "classes/Authentication.php";
session_start();

Authentication::protect();

$title = "Change password";
$sectionTitle = "Change password";
$message = "";

if (isset($_SESSION["theme"])) {
    $theme = $_SESSION["theme"] . ".css";
} else {
    $theme = "style.min.css";
}

if ((!empty($_POST["username"])) && (!empty($_POST["oldPassword"])) && (!empty($_POST["newPassword"]))) {
	if (Authentication::verifyOldPassword($_POST["username"], $_POST["oldPassword"])) {
		$message = Authentication::updatePassword($_POST["username"], $_POST["newPassword"]);
	}
	else {
		$message = "Please enter the correct current passowrd";
	}
}

ob_start();

include "templates/passwordForm.html.php";

$output = ob_get_clean();

include "templates/adminLayout.html.php";
