
<?php
	require_once 'config.php';
	if (isset($_POST['submit'])) {
		$search = $_POST['search'];
		$sql = "SELECT * FROM `student_info` WHERE name='%$search%'";
		$result = mysqli_query($link,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			
		}
	}
	
?>