
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php

	include('connection.php');
	$id = $_REQUEST['id'];

      $query2 = "select *  from student where id = '$id'";
      $run2 = mysqli_query($con,$query2);
      while($row = mysqli_fetch_array($run2))

      {
      	$img = $row[5];
      	unlink($img); // deletes a file
      }
    

    $query = "delete  from student where id = '$id'";

    $run = mysqli_query($con,$query);
    
    if($run)
    {

    echo "<script>alert('DATA DELETED'); 

            	window.location.href = 'view.php';


            	</script> ";	
    }else{

    	echo "<script>alert('DATA NOT DELETED SUCCESSFULLY'); 

            	window.location.href = 'view.php';


            	</script> ";
    }



	?>



</body>
</html>