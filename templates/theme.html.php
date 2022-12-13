<div class="main">
    <h2 class="h2"> Light/Dark Theme</h2>

    <form id="swcontact-form" method="POST" action="theme.php">
        <fieldset class="center">
            <legend>Change Theme</legend>
            <label for="theme">Theme:</label>
            <select id="theme" name="theme">
                <?php if ($theme == "style.min.css") : ?>
                    <option value="style.min" selected>Light</option>
                <?php else : ?>
                    <option value="style.min">Light</option>
                <?php endif;

                if ($theme == "dark.min.css") : ?>
                    <option value="dark.min" selected>dark</option>
                <?php else : ?>
                    <option value="dark.min">dark</option>
                <?php endif; ?>
            </select>
            <input type="submit" value="Change" name="submit">
        </fieldset>
    </form>

</div>