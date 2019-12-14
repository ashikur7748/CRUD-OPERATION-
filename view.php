<?php
require_once 'config.php';

		
		if(isset($_POST['save'])){

			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$phone   = $_POST['phone'];
			$dob     = $_POST['dob'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			if (isset($_POST['gender'])) {
				$gender  = $_POST['gender'];
			}
			
			$image   = $_FILES['image'] ['name'];
		//file rename
			$file_name = explode('.', $image);
			$file_ex = end($file_name);
			$file_new_name = rand(9999,99999).date("-h-i-s-d-m-Y.").$file_ex ;
			 
			if (!empty($name) && !empty($email) && !empty($phone) && !empty($dob) && !empty($subject) && !empty($message) && !empty($gender) && !empty($image)) {
				
				$sql = "INSERT INTO `student_info`(`name`, `email`, `phone`, `date of birth`, `subject`, `message`,`gender`,`image`) VALUES ('$name','$email','$phone','$dob','$subject','$message','$gender','$file_new_name')";

				$success = (mysqli_query($link, $sql));

			if($success){
				move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$file_new_name );
				$save = "Your data save successfully";
			}

			}else{
				$error = "*Please fill up the require field*";
			}
			

			//Data insert 

			

			
		}

?>