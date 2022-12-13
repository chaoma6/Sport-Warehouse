<section class="main">
    <h2 class="h2"> Update Password </h2>
    <form action="password.php" method="post" id="swcontact-form" class="main">
        <fieldset>
            <p>
                <label>Username:</label>
                <input type="text" name="username" id="username" required>
            </p>

            <p>
                <label>Current Password:</label>
                <input type="password" name="oldPassword" id="oldPassword" required>
            </p>

            <p>
                <label>New Password:</label>
                <input type="password" name="newPassword" id="newPassword" required>
            </p>

            <p>
                <input type="submit" value="Change" class="button">
            </p>
        </fieldset>
    </form>
    <p><?= $message ?></p>
</section>