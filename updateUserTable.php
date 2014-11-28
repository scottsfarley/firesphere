<?php
require_once('database_access.php');
session_start();
$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (!$connection){
	die("Could not connect to Firesphere database.  Error Message: " . mysqli_error($connection));
}

$sql = "Select * FROM `users` WHERE `";
$query = mysqli_query($connection, $sql);
$numUsers = mysqli_num_rows($query);
$result = mysqli_fetch_assoc($query);
for ($i = 0; $i<$numUsers; $i++){
	$row = $result[$i];
	$username = $row['username'];
	echo i, $username;
	$datasql = "Select * FROM `UserObservations` WHERE `Username` = '$username'";
	$dataquery = mysqli_query($connection, $datasql);
	if (!$dataquery){
		die("Could not complete data query, iteration ". i. " Error : " .mysqli_error($connection));
	}
	$dataNumRows =  mysqli_num_rows($dataquery);
	$updataSql = "UPDATE `users` SET NumObservations=$dataNumRows WHERE 'username'='$username'";
	$updataQuery = mysqli_query($connection, $updataSql);
	if (!$updataQuery){
		die("Could not complete update query, iteration ". i. " Error : " .mysqli_error($connection));
	}	
}
?>