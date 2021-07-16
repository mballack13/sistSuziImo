<?php 
	include("_tempHeaderAdm.php");	
	
	$id = $_GET['id'];
	

	//deleting the row from table
	$result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

	//redirecting to the display page (index.php in our case)
	header("Location:readAllUsers.php");	



?>
<?php include("_tempFooterAdm.php"); ?>