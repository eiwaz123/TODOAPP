<?php
include_once("config.php");
// Check connection

// Define a function to check if the username already exists



$username=$_POST['username'];
$password=$_POST['password'];
$stmt=$conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
function isUsernameUnique($username, $conn) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return false; // Username already exists
    } else {
        return true; // Username is unique
    }
}
if ($result->num_rows > 0) {
    echo "Username already exists";
    header("location:../register.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
    
        // Check if username is empty
        if (empty($username)) {
            $username_error = "Username is required";
            $_SESSION['username_error'] = $username_error;
        } else {
            // Check if username is unique
            if (!isUsernameUnique($username, $conn)) {
                $username_error = "Username already exists";
                $_SESSION['username_error'] = $username_error;
            }
        }
    
        // If there are no errors, proceed to insert the user into the database
        if (empty($username_error)) {
            // Insert user into the database
            $stmt=$conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->close();
            header("location:../login.php");
        }
    }
}







// Form validation

?>