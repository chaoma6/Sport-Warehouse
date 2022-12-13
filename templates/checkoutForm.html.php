<form method="post" action="thanks.php" id="checkout" class="main">
    <fieldset>
        <legend>Delivery Details</legend>
        <p>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName">
        </p>
        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName">
        </p>
        <p>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </p>
        <p>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </p>
    </fieldset>
    <fieldset>
        <legend>Payment</legend>
        <p>
            <label for="creditcard">Credit card number:</label>
            <input type="text" id="creditcard" name="creditcard">
        </p>
        <p>
            <label for="nameOnCard">Name on card:</label>
            <input type="text" id="nameOnCard" name="nameOnCard">
        </p>
        <p>
            <label for="expiry">Expiry date:</label>
            <input type="text" id="expiry" name="expiry">
        </p>
        <p>
            <label for="csv">CSV:</label>
            <input type="text" name="csv" id="csv">
        </p>
    </fieldset>
    <button type="submit" name="pay" value="pay">PAY NOW</button>
</form>

<!-- 1.Include JQuery Library -->
<script src="scripts/jquery-3.6.0.min.js"></script>
<!-- 2. Include plugin resources-->
<script src="scripts/jquery.validate.min.js"></script>
<!-- 3. Include your own custom JS code (that uses the plugin code) -->
<script src="scripts/formValidation.js"></script>