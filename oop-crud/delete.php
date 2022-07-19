<?php
 require_once('database.php');
$database = new Database();
 $id = $_GET['id'];

/** @var mysqli $res */
$res = $database->delete($id);
 if($res){
 	header('location: view.php');
 }else{
 	echo "Failed to Delete Record";
 }

