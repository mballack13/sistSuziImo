<?php 
	include("_tempHeaderCom.php");	
	
	$id = $_GET['id'];
	

	//deleting the row from table
	$result = mysqli_query($conn, "DELETE FROM imoveis WHERE id=$id");

	//redirecting to the display page (index.php in our case)
	header("Location:readAllImoveis.php");	



?>
<?php include("_tempFooterCom.php"); ?>