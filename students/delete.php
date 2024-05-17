<?php
include('../connection.php');
$id=$_GET['id'];
$qry=$con->query('DELETE FROM students WHERE id='.$id);
if($qry){
    header('Location:retrieve.php');
    exit();
}