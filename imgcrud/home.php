<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DOCUMENT</title>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
</head>
<body>

	<div class="container">

		<div class="row" align="center">
			<div class="col-md-6 col-md-offset-3">

 <form action="insert.php" method="post" enctype="multipart/form-data">
   <h2 align="center">INSERT FORM</h2>
	<input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
	<br>
	<select name="gender" class="form-control" required>

		<option value="">Select Gender</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>

	</select>
	<br>
	<input type="number" class="form-control" min="3" max="30" name="age" placeholder="Enter Your Age" required>
	<br>
	<input type="number" class="form-control" min="3" max="30" name="class" placeholder="Enter Your Class" required>
	<br>
	<input type="file" name="image" class="form-control" required>
	<br>
	<input type="submit" value="Insert" name="InsertBtn" class="btn btn-info btn-block">

</form>

</div>
</div>

</div>
</body>
</html>