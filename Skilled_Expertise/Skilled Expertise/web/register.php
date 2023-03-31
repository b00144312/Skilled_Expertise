<?php
if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'src/DBconnect.php';
        $new_user = array(
            "firstname" => escape($_POST['firstname']),
            "lastname" => escape($_POST['lastname']),
            "password" => escape($_POST['password']),
            "email" => escape($_POST['email']),
            "age" => escape($_POST['age']),
            "location" => escape($_POST['location'])
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $statement = $conn->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "templates/header.php";
if (isset($_POST['submit']) && $statement){
    echo $new_user['firstname']. ' successfully added';
}
?>
    <h2>Register</h2>
    <form method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <label for="age">Age</label>
        <input type="text" name="age" id="age">
        <label for="location">Location</label>
        <input type="text" name="location" id="location"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="login.php">Back to home</a>
<?php include "templates/footer.php"; ?>