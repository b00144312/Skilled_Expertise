<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <h1>Checkout Page</h1>
    <a href="../Cart/Cart.php">Go to your cart</a>
</head>
<body>
    <h1> Welcome to Checkout</h1>;
<form method="post">
    <div>
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number">
    </div>
    <br>
    <div>
        <label for="cardholder_name">Cardholder Name:</label>
        <input type="text" id="cardholder_name" name="cardholder_name">
    </div>
    <br>
    <div>
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YYYY">
    </div>
    <br>
    <div>
        <label for="ccv">CCV:</label>
        <input type="text" id="ccv" name="ccv">
    </div>
    <br>
    <div>
        <label for="card_type">Card Type:</label>
        <select id="card_type" name="card_type">
            <option value="">-- Select Card Type --</option>
            <option value="Visa">Visa</option>
            <option value="Mastercard">Mastercard</option>
        </select>
    </div>
    <button type="submit"><a href="thankyou.php">Place Order</a></button>
</form>
</body>
</html>
