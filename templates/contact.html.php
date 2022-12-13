<section class="form-wrapper main">
	<h2 class="h2">Contact us</h2>
	<p>We would love to hear from you! Please leave a message and we will get in touch with you shortly.</p>

	<form action="contact.php" method="post" id="swcontact-form" novalidate>
		<fieldset>
			<legend>Contact us (* is require field)</legend>

			<?php if ($form->valid == false) : ?>
				<p class="error">Please supply the missing information</p>
			<?php endif; ?>

			<div>
				<label for="firstName" <?= $form->setErrorClass("firstName") ?>>First name *</label>
				<input type="text" name="firstName" id="firstName" value="<?= $form->setValue("firstName") ?>">
				<span class="message"><?= $firstNameMessage ?></span>
			</div>

			<div>
				<label for="lastName" <?= $form->setErrorClass("lastName") ?>>Last name *</label>
				<input type="text" name="lastName" id="lastName" value="<?= $form->setValue("lastName") ?>">
				<span class="message"><?= $lastNameMessage ?></span>
			</div>

			<div>
				<label for="phone" <?= $form->setErrorClass("phone") ?>>Contact number </label>
				<input type="text" name="phone" id="phone" value="<?= $form->setValue("phone") ?>">
			</div>

			<div>
				<label for="email" <?= $form->setErrorClass("email") ?>>Email *</label>
				<input type="email" name="email" id="email" value="<?= $form->setValue("email") ?>">
				<span class="message"><?= $emailFieldMessage ?></span>
				<span class="message"><?= $emailMessage ?></span>
			</div>

			<div>
				<label for="question" <?= $form->setErrorClass("question") ?>>Question *</label>
				<textarea name="question" id="question" rows="8" cols="40"><?= $form->setValue("question") ?></textarea>
				<span class="message"><?= $questionFieldMessage ?></span>
			</div>
		</fieldset>

		<input type="submit" name="submitButton" id="submitButton" value="SUBMIT">
	</form>
</section>