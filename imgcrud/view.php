<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<?php

    include('connection.php');
    $query = "select * from student";
    $run = mysqli_query($con,$query);
    $totalRows = mysqli_num_rows($run);
    if(!$totalRows  = 0)

    {
    	?>
     <div class="container">
    	<table border="1" class="table">
    		
        <tr>
        	<th colspan="8" class="text-center">STUDENTS DETAILS</th>


        </tr>
        <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>GENDER</th>
        <th>AGE</th>
        <th>CLASS</th>
        <th>IMAGE</th>
        <th>EDIT</th>
        <th>DELETE</th>

        </tr>
    	
    	<?php

    	while($data = mysqli_fetch_array($run))

    	{
         
         echo "

         <tr>
        <td>".$data[0]."</td>
         <td>".$data[1]."</td>
          <td>".$data[2]."</td>
           <td>".$data[3]."</td>
            <td>".$data[4]."</td>
             <td><img src='$data[5]' height='70' width='70'></td>
             <td><a href='update.php?id=$data[0]'>EDIT</a></td>
             <td><a href='delete.php?id=$data[0]' onclick='return Confirmation();'>DELETE</a></td>
             
        
        

        </tr>



         ";

    	}


    }
    else

    {
     
     echo "<script>alert('There is no Record'); </script> ";


    }

	?>


</table>

</div>


<script>
	
function Confirmation()
{

	return confirm('ARE YOU SURE TO DELETE DATA');
}

</script>

</body>
</html>