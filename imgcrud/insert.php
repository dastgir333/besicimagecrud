
<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>


	<?php
   
   include('connection.php');

   if(isset($_POST['InsertBtn']))
   {

   	$name =$_POST['name'];
   	$gender =$_POST['gender'];
   	$age =$_POST['age'];
   	$class =$_POST['class'];
   	$image_name = $_FILES['image']['name'];
   	$image_temp_name = $_FILES['image']['tmp_name'];
   	$image_type = $_FILES['image']['type'];
   	$image_size= $_FILES['image']['size'];
   	$folder = "images/";
   	if(strtolower($image_type)== "image/jpg" || strtolower($image_type)== "image/jpeg" || strtolower($image_type)== "image/png" )

   	{
     
     if($image_size <= 1000000)
     {
       $folder = $folder. $image_name;
       $query = "insert into student (name,gender,age,class,image_path) values('$name','$gender','$age','$class','$folder')";
            $run = mysqli_query($con,$query);

            if($run)
            {   move_uploaded_file($image_temp_name,$folder  );
            	echo "<script>alert('DATA INSERTED'); 

            	window.location.href = 'view.php';


            	</script> ";
            	
           
            }
            else
            {
            	echo "<script>alert('DATA NOT INSERTED');
            	window.location.href = 'home.php'; 

            	</script> ";

            }
     }
     else
     {
     echo "<script>alert('Image Size Must Not Big Than 1 MB');
       window.location.href = 'home.php'; 


      </script> ";
     }

   	}
   	else
   	{

   		echo "<script>alert('Image Formate Not Supported');

   		 window.location.href = 'home.php'; 
 


   		</script> ";
   	}




   }




	?>

</body>
</html>