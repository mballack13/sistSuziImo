<?php
    session_start();
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
    include("_tempHeaderAdm.php");
?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){
		$name  				= $_POST['name'];
		$email 				= $_POST['email'];
		$password			= $_POST['password'];
		$typeUsers_id  		= $_POST['typeUsers_id'];
		$sql = "UPDATE users SET name='{$name}', email = '{$email}',
					password = '{$password}', typeUsers_id = '{$typeUsers_id}' 
					WHERE id=" . $_POST['id'];

		if( $conn->query($sql) === TRUE){
			echo "<div class='alert alert-success'>Successfully updated  user</div>";
		}else{
			echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
		}

	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM users WHERE id={$id}";
	$result = $conn->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3> 
			<form action="" method="POST">
				<input type="hidden"
				value="<?php echo $row['id']; ?>" name="id">
				
				<label for="name">name</label>
				<input type="text" id="name"  name="name"
				value="<?php echo $row['name']; ?>" class="form-control"><br>

				<label for="email">email</label>
				<input type="text"  name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control"><br>

				<label for="password">password</label> 
				<input type="text"  name="password" id="password"  value="<?php echo $row['password']; ?>" class="form-control"><br>

				<label for="email">typeUsers_id</label>
				<input type="text"  name="typeUsers_id" id="typeUsers_id" value="<?php echo $row['typeUsers_id']; ?>" class="form-control"><br>
				
				<br><br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>



<?php include("_tempFooterAdm.php"); ?>
