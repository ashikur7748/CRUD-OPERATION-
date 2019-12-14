
<?php
	require_once 'config.php';

	

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
		<div class="col-12">
			<h1 class="text-white text-center">Student Information</h1>
			<hr>
			<a class="btn btn-primary mb-3" href="index.php">Student Add</a>


			  <form class="form-inline float-right" action="" method="post">
			    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
			    <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
			  </form>
			
			<table class="table table-bordered table-hover">
				<tr class="table-light text-center text-info">
					<th>ID</th>
					<th>Name</th>
					<th>Eamil</th>
					<th>Roll</th>
					<th>Date of Birth</th>
					<th>Subject</th>
					<th>Message</th>
					<th>Gender</th>
					<th>Image</th>
					<th>Submit</th>
					<th>Action</th>
				</tr>

				<?php
				$i=1;
				$alldata = "SELECT * FROM `student_info`";
				$result = mysqli_query($link, $alldata);
				while ($row = mysqli_fetch_assoc($result)) { ?>

				<tr class="text-white">
					<td><?php echo $i;?></td>
					<td><?php echo ucwords($row['name']);?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phone'];?></td>
					<td><?php echo $row['date of birth'];?></td>
					<td><?php echo $row['subject'];?></td>
					<td><?php echo $row['message'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><img style="width: 100px; height: 100px;" src="images/<?php echo $row['image'];?>" alt="image"></td>
					<td><?php echo $row['submit_date'];?></td>
					<td class="text-center">
						<a class="btn btn-danger" href="delete.php?id=<?=base64_encode($row['id']);?>">Delete</a><br><br>
						<a class="btn btn-success px-3" href="update.php?id=<?=base64_encode($row['id']);?>">Edit</a>
					</td>
				
				</tr>
				<?php
				$i++;
				}
				?>
				
				
			</table>
		</div>
	</div>
</div>


<script src="js/bootstrap.min.js"></script>	
</body>
</html>