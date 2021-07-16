<?php
    include '../../config/config.php';
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../../assets/bootstrap-4.1.3/css/bootstrap.min.css">


	<title>Document</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">Suzano'o</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<!--
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			-->

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
				role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Imoveis
				</a>

				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="readAllImoveis.php">Ver todos</a>
				</div>
			</li>
		</ul>


		<?php echo '<a href="../login/logout.php">Logout</a>'; ?>
		</form>
	</div>



</nav>