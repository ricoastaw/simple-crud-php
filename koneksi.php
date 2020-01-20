<?php

session_start();
$db = mysqli_connect('localhost','root','','db_crud');

$name="";
$address="";
$id="0";
$update="false";

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name','$address')");
		$_SESSION['message'] = "Data Disimpan"; 
			header('location: index.php');
	exit();

}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['message'] = "Data di-Update"; 
			header('location: index.php');
	exit();
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Data dihapus"; 
			header('location: index.php');

	exit();
}
	$results=mysqli_query($db, "SELECT * FROM info");

?>