<?php
include_once('config.php');
$id=$_GET['id'];
$date = date('Y-m-d');
$stmt=$conn->prepare("UPDATE tasks SET dateout=? WHERE id=?");
$stmt->bind_param('si',$date,$id);
$stmt->execute();
header('location:../index.php');



?>