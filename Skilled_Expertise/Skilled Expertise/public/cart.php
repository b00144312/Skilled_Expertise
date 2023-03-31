<?php
session_start();
require_once('config.php');

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit;
}

$cartItems = $_SESSION['cart'];

// Get the product details for items in the cart
$stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
foreach ($cartItems as $cartItem) {
    $stmt->bindValue(':id', $cartItem['id']);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $cartItem['name'] = $product['name'];
    $cartItem['price'] = $product['price'];
    $_SESSION['cart'][$cartItem['id']] = $cartItem;
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($cartItems as $cartItem):
        $name = $cartItem['name'];
        $price = $cartItem['price'];
        $quantity = $cartItem['quantity'];
        $subtotal = $price * $quantity;
        ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td>$<?php echo number_format($price, 2); ?></td>
            <td><?php echo $quantity; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <?php
        $total += $subtotal;
    endforeach;
    ?>
    <tr>
        <td colspan="3">Total:</td>
        <td>$<?php echo number_format($total, 2); ?></td>
    </tr>
    </tbody>
</table>
<p><a href="index.php">Continue Shopping</a></p>
<form method="post" action="checkout.php">
    <input type="submit" value="Checkout">
</form>
</body>
</html>

