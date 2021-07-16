<?php 

include '../../config/config.php';

error_reporting(0);

session_start();

//if (isset($_SESSION['email'])) { header("Location: index.php"); }

if (isset($_POST['submit'])) {
	$name 			= $_POST['name'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$token 			= md5($_POST['password']);
	$typeUsers_id	= 1;

	if ($password != $token) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (name, email, password, token, typeUsers_id)
					VALUES ('$name', '$email', '$password', '$token', '$typeUsers_id')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$name = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['token'] = "";
				
				echo "<script>window.location.href='login.php';</script>";
				

			}
			
			else {echo "<script>alert('Eiita! tem coisa errada')</script>";}
		}//if (!$result->num_rows > 0) {
		
		else {echo "<script>alert('Este email é existente!')</script>";}
		
	} 
	
	else {echo "<script>alert('As senhas não estão conferindo.')</script>";}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../../assets/styleLogin.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="name" name="name" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="token" value="<?php echo $_POST['token']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="../../index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>