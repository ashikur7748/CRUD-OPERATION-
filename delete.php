<?php
	require_once 'config.php';


	$id = base64_decode($_GET['id']);

	$delete = "DELETE FROM `student_info` WHERE id='$id'";
	$result = mysqli_query($link, $delete);
	if ($result) {
		header('Location: data.php');
	}else{
		echo mysqli_error();
	}

?>