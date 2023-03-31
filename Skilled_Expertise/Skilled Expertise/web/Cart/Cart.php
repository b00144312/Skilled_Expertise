<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h1>Shopping Cart</h1>

<?php
// Start the session and retrieve the cart items
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// Output the cart items
if (count($cart) > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($cart as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['price'] . "</td>";
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='id' value='" . $item['id'] . "'>";
        echo "<input type='submit' name='remove_from_cart' value='Remove'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Your cart is empty.</p>";
}

// Process the remove from cart form submission
if (isset($_POST['remove_from_cart'])) {
    $id = $_POST['id'];
    foreach ($cart as $key => $item) {
        if ($item['id'] == $id) {
            unset($cart[$key]);
            break;
        }
    }
    $_SESSION['cart'] = $cart;
    header("Location: Cart.php");
    exit();
}
?>

<form method="post" action="Checkout.php">
    <input type="submit" name="checkout" value="Proceed to Checkout">
</form>

</body>
</html>