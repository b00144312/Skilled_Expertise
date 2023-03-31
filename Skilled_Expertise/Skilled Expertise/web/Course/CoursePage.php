<!DOCTYPE html>
<html>
<head>
    <title>Gym Courses</title>
</head>
<body>

<h1>Gym Courses</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Start the session and initialize the cart
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Connect to the database using PDO
    try {
        require "../src/DBconnect.php";
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Retrieve the data from the courses table
    $sql = "SELECT courseid, title, price FROM course";
    $stmt = $conn->query($sql);

    if ($stmt->rowCount() > 0) {
        // Output the data in a table format
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['courseid'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='id' value='" . $row['courseid'] . "'>";
            echo "<input type='hidden' name='name' value='" . $row['title'] . "'>";
            echo "<input type='hidden' name='price' value='" . $row['price'] . "'>";
            echo "<input type='submit' name='add_to_cart' value='Add to cart'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";

        }
    } else {
        echo "No gym courses found.";
    }

    // Close the database connection
    $conn = null;

    // Process the add to cart form submission
    if (isset($_POST['add_to_cart'])) {
        $item = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price']
        );
        array_push($_SESSION['cart'], $item);
        echo "<p>Item added to cart.</p>";
    }
    ?>
    </tbody>
</table>
<a href="../Cart/Cart.php">Go to your cart</a>
</body>
</html>