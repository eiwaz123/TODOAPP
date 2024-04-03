<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $task=$_POST['task'];
    $type=$_POST['task-type'];
    $date = date('Y-m-d');
    $dateout="";
    $stmt = $conn->prepare("INSERT INTO tasks (task,type,datein,dateout) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $task,$type,$date,$dateout);
    $stmt->execute();
    $conn->close();
    header('Location:index.php');


}
else{
    header('Location:index.php');
}
  

?>