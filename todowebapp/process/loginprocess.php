<?php 
include_once('config.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt=$conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    if ($stmt->errno) {
        die("Query execution failed: " . $stmt->error);
    }
    $result = $stmt->get_result();
    
    if($result->num_rows == 1){
        session_start();
        $_SESSION['username'] = $username;
        header("Location:../index.php");
        exit();
    }


    // if($result->num_rows > 0){
    //     $_SESSION['username'] = $username;
    //     header("Location:../index.php");
    //     exit();
    // }
    else{
        header("Location:../index.php");
        exit();
    }

}

else{
    header("Location:../index.php");
    exit();
}







?>