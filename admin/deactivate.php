<?php 

	// Connect to database 
//	$con=mysqli_connect("localhost","root","","footwear");
    require '../include/connection.php';

// Check if id is set or not, if true,
	// toggle else simply go back to the page 
	if (isset($_GET['id'])){ 

		// Store the value from get to 
		// a local variable "course_id" 
		$productid=$_GET['id']; 

		// SQL query that sets the status to 
		// 0 to indicate deactivation. 
		$sql="UPDATE tbl_products SET 
			status=0 WHERE product_id='$productid'"; 

		// Execute the query 
		mysqli_query($conn,$sql);
	} 

	// Go back to course-page.php 
	header('location: product.php'); 
?>