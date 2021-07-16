<?php 

include '../../config/config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
	$email		= $_POST['email'];
	$password	= $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['id']		= $row['id'];
		$_SESSION['email']	= $row['email'];
		$_SESSION['name']	= $row['name'];
		

		switch ($row['typeUsers_id']) {
			case 0:
				header("Location: ../_admin/index.php");
				break;
			case 1:
				header("Location: ../_usuario/index.php");
				break;
			case 2:
				header("Location: ../_comercial/index.php");
				break;
			case 3:
				header("Location: ../_administrativo/index.php");
				break;
			default:
				echo "<script>alert('sai dae, cumpintcha!')</script>";			
				break;
		}

		
	}
	
	else {echo "<script>alert('Seu e-mail OU senha, estão errados!')</script>";}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../../assets/styleLogin.css">

	<title>Suzano'o System</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sistema Suzano'o<br> Imobiliária</p>
			<div class="input-group">
				<input type="email"		placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password"	placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			
			<section>
				<p class="login-register-text">Não possui conta?<br>
					<a href="../../templates/login/register.php">Clique Aqui</a>
				</p>
			</section>
		</form>
	</div>
</body>
</html>