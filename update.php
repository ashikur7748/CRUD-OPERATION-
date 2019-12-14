
<?php
	require_once 'config.php';


	//data recived
	if (isset($_GET['id'])) {
		$id = base64_decode($_GET['id']);
		$datatake = "SELECT * FROM `student_info` WHERE id='$id'";
		$result = mysqli_query($link,$datatake);
		$row = mysqli_fetch_assoc($result);
		
	}
	

		if(isset($_POST['save'])){

			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$phone   = $_POST['phone'];
			$dob     = $_POST['dob'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			$gender  = $_POST['gender'];
			$image   = $_FILES['image'] ['name'];
		//file rename
			$file_name = explode('.', $image);
			$file_ex = end($file_name);
			$file_new_name = rand(9999,99999).date("-h-i-s-d-m-Y.").$file_ex ;
			 

			

			//Data insert 

			$sql = "UPDATE `student_info` SET `name`='$name',`email`='$email',`phone`='$phone',`date of birth`='$dob',`subject`='$subject',`message`='$message',`gender`='$gender',`image`='$file_new_name' WHERE id='$id'";

			$success = (mysqli_query($link, $sql));

			if($success){
				move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$file_new_name );
				//$save = "Your data update successfully";
				header('Location: data.php');
			}else{
				$nosave = "Please try again !";
			}
		}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Crud Operation</title>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-4 reg-box2">
			

			<?php
			
			if (isset($success)) {
				echo "<h4 class='text-center text-warning'>".$save."</h4>";
				
			}elseif (isset($nosave)) {
				# code...
			
				echo "<h4 class='text-center text-warning'>".$nosave."</h4>";
			}
			?>


			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				    <input type="text" class="form-control" name="name" placeholder="Full name" value="<?=$row['name'];?>"> 
			    </div>
			    <div class="form-group">
				    <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$row['email'];?>"> 
			    </div>
			    <div class="form-group">
				    <input type="text" class="form-control" name="phone" placeholder="Roll" value="<?=$row['phone'];?>"> 
			    </div>
			    <div class="form-group">
				    <input type="date" class="form-control" name="dob" placeholder="Dat of Birth" value="<?=$row['dob'];?>">
			    </div>
			    <div class="form-group">
				                <select name="subject" class="form-control">
                                    <option selected="selected">Select Subject</option>
                                    <option value="CSE"<?= $row['subject']=='CSE'? 'selected':''?>>CSE</option>
                                    <option value="EEE"<?=$row['subject']=='EEE'? 'selected':''?>>EEE</option>
                                    <option value="TEX" <?=$row['subject']=='TEX'? 'selected':''?>>TEX</option>
                                </select>
                            </div>

 				<div class="form-group">
				    <textarea class="form-control" name="message" placeholder="Message" rows="3">
				    	<?=$row['message'];?>
				    </textarea>
				</div>

			    <div>
			    	<label >Gender</label>
			    	<input type="radio" class="ml-3" name="gender" subject="m" value="Male" <?=$row['gender']=='Male'? '':'checked'?> checked=""> Male
			    	<input type="radio" class="ml-3" name="gender" subject="f" value="Female" <?=$row['gender']=='Male'? '':'checked'?>> Female
			    </div>
			    
			    <div class="form-group">
				    <input type="file" class="form-control-file" name="image">
				  </div>
			    	       
				<button type="submit" class="btn btn-success pl-4 pr-4" name="save">Update</button>


				</div>
				
			</form>
			
			
		</div>
	</div>
</div>

<script src="js/bootstrap.min.js"></script>	
</body>
</html>