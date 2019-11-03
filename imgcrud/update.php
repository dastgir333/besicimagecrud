
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
		img{
			border: 3px solid red;
			float:left;
		}
	</style>
</head>
<body>


	<?php

	include('connection.php');
	$id = $_REQUEST['id'];
    $query = "select * from student where id = '$id'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_array($run);


	?>


	<div class="container">

		<div class="row" align="center">
			<div class="col-md-6 col-md-offset-3">

 <form action="" method="post" enctype="multipart/form-data">
   <h2 align="center">INSERT FORM</h2>
   <input type="hidden" name="id" value="<?php echo $data[0];?>">
	<input type="text" class="form-control" placeholder="Enter Your Name" name="name" required value="<?php echo $data[1];?>">
	<br>
	<select name="gender" class="form-control" required>

		<?php

		if($data[2] == "Male")
		{

			echo "


			<option value=''>Select Gender</option>
			<option value='Male' selected>Male</option>
			<option value='Female'>Female</option>


			";
		}
		else
		{

        echo "


			<option value=''>Select Gender</option>
			<option value='Male'>Male</option>
			<option value='Female' selected>Female</option>

			";


		}



		?>
     <!--
		<option value="">Select Gender</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option> -->

	</select>
	<br>
	<input type="number" class="form-control" min="3" max="30" name="age" placeholder="Enter Your Age" required value="<?php echo $data[3];?>">
	<br>
	<input type="number" class="form-control" min="3" max="30" name="class" placeholder="Enter Your Class" required value="<?php echo $data[4];?>">
	<br>

	<?php
     if(!$data[5] == "" && !$data[5] == null )
     {
     
      echo "<img src='$data[5]' height='70' width='70'>";

     }


	?>

	<input type="hidden" name="oldimage" value="<?php echo $data[5];?>"> // new entry
	<br>
	<input type="file" name="image" class="form-control">
	<br>
	<input type="submit" value="Update" name="UpdateBtn" class="btn btn-info btn-block">

</form>

</div>


<?php

if(isset($_POST['UpdateBtn']))
{
    $id =$_POST['id'];
	$name =$_POST['name'];
   	$gender =$_POST['gender'];
   	$age =$_POST['age'];
   	$class =$_POST['class'];
   		$oldimage =$_POST['oldimage'];
   	$image_name = $_FILES['image']['name'];
   	$image_temp_name = $_FILES['image']['tmp_name'];
   	$image_type = $_FILES['image']['type'];
   	$image_size= $_FILES['image']['size'];
   	$folder = "images/";
  if(is_uploaded_file($_FILES['image']['tmp_name']))
  {
   //echo "File Given";

   	if(strtolower($image_type)== "image/jpg" || strtolower($image_type)== "image/jpeg" || strtolower($image_type)== "image/png" )

   	{
     
     if($image_size <= 1000000)
     {
       $folder = $folder. $image_name;
       $query = "update  student set name = '$name', gender = '$gender', age = '$age', class = '$class', image_path = '$folder' where id ='$id'";
            $run = mysqli_query($con,$query);

            if($run)

            {   unlink($oldimage);
            	move_uploaded_file($image_temp_name,$folder  );
            	echo "<script>alert('DATA UPDATED'); 

            	window.location.href = 'view.php';


            	</script> ";
            	
           
            }
            else
            {
            	echo "<script>alert('DATA NOT UPDATED'); </script> ";

            }
     }
     else
     {
     echo "<script>alert('Image Size Must Not Big Than 1 MB');
     window.location.href = 'view.php';
 

     </script> ";
     }

   	}
   	else
   	{

   		echo "<script>alert('Image Formate Not Supported'); </script> ";
   	}







  }
  else
  {

  	//echo "File Not Given";
  	$query = "update  student set name = '$name', gender = '$gender', age = '$age', class = '$class' where id ='$id'";
            $run = mysqli_query($con,$query);

            if($run)
            {   move_uploaded_file($image_temp_name,$folder  );
            	echo "<script>alert('DATA UPDATED'); 

            	window.location.href = 'view.php';


            	</script> ";
            	
           
            }
            else
            {
            	echo "<script>alert('DATA NOT UPDATED'); </script> ";

            }



  }

}


?>

</body>
</html>


