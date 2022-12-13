<?php
		require_once("classes/FormValidation.php");

		$title = "Contact us";

		//create FormValidation object so that it can be used
		$form = new FormValidation();

		//start buffer
		ob_start();

		//check if the submit button was clicked
		if (isset($_POST["submitButton"])) {
			//check required fields
			$firstNameMessage = $form->checkEmpty("firstName");
			$lastNameMessage = $form->checkEmpty("lastName");
			$emailFieldMessage = $form->checkEmpty("email");
			$questionFieldMessage = $form->checkEmpty("question");
			//validate valid email address
			$emailMessage = $form->checkEmail("email");
			//validate phone
			// $phoneMessage = $form->checkPhone("phone");
			//if any checks did not pass valid will be set to false
			//if all checks passed valid will be true
			if ($form->valid == true) {
				//redirect to the thanks page
				header("Location:contactThanks.php");
			} else {
				//display form with errors listed
				include "templates/contact.html.php";
			}
		} else //submit button was not clicked the form is displayed for the first time
		{
			//display form without errors
			$form->valid = true;
			$firstNameMessage = "";
			$lastNameMessage = "";
			$emailFieldMessage = "";
			$emailMessage = "";
			$questionFieldMessage = "";
			// $phoneMessage = "";
			include "templates/contact.html.php";
		}
		$output = ob_get_clean();
		include "templates/layout.html.php";
	?>
