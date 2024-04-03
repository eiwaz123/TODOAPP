<?php
include_once('config.php');
$id=$_GET['id'];
$stmt=$conn->prepare("DELETE FROM tasks WHERE id=?");
$stmt->bind_param('i',$id);
$stmt->execute();
header('location:../index.php');



?>