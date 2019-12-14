
<?php
	require_once 'config.php';
	require_once 'view.php';
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
		<div class="col-sm-4 reg-box">
			<a class="btn btn-info mt-2 float-right" href="data.php">View All</a>
			<h3 class="text-center text-white text-bold p-2">STUDENT ADD</h3>

			<h5 class='text-center text-success font-weight-bold'>
			<?php
			if (isset($save)) {
				echo $save;
			}
			?>
			</h5>
			<h5 class="text-center text-danger font-weight-bold">
			<?php
			if (isset($error)) {
		
				echo $error;
			}
			?>
			</h5>

			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				    <input type="text" class="form-control" name="name"
				     value="<?php if(isset($name)){
				    	echo $name;}?>" placeholder="Full name"> 
			    </div>
			    <div class="form-group">
				    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)){
				    	echo $email;}?>"> 
			    </div>
			    <div class="form-group">
				    <input type="text" class="form-control" name="phone" placeholder="Roll" value="<?php if(isset($phone)){
				    	echo $phone;}?>"> 
			    </div>
			    <div class="form-group">
				    <input type="date" class="form-control" name="dob"  placeholder="Dat of Birth"> 
			    </div>
			    <div class="form-group">
				                <select name="subject" class="form-control">
                                    <option selected="selected">Select Subject</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="TEX">TEX</option>
                                </select>
                            </div>

 				<div class="form-group">
				    <textarea class="form-control" name="message" placeholder="Message" rows="3">
				    	<?php if(isset($message)){
				    	echo $message;}?>
				    </textarea>
				</div>

			    <div>
			    	<label >Gender</label>
			    	<input type="radio" class="ml-3" name="gender" subject="m" value="Male"> Male
			    	<input type="radio" class="ml-3" name="gender" subject="f" value="Female"> Female
			    </div>
			    
			    <div class="form-group">
				    <input type="file" class="form-control-file" name="image">
				  </div>
			    	       
				<button type="submit" class="btn btn-success mb-3 pl-4 pr-4" name="save">Save</button>


				</div>
				
			</form>
			
			
		</div>
	</div>
</div>

<script src="js/bootstrap.min.js"></script>	
</body>
</html>