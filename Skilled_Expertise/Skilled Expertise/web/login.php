<?php
// Connect to database

try {
    require "src/DBconnect.php";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the user's input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database for the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        // User found, redirect to dashboard
        header("Location: welcome.php");
        exit;
    } else {
        // User not found, display error message
        $error = "Invalid email or password.";
    }
}
?>

    <!-- Display the login form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

<?php
// Display error message if there was an error
if(isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
}

// Close the database connection
$conn = null;
?>