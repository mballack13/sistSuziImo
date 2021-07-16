<?php
    session_start();
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
    include("_tempHeaderCom.php");
?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){
		$endereco  			= $_POST['endereco'];
		$numero 			= $_POST['numero'];
		$complemento		= $_POST['complemento'];
		$bairro				= $_POST['bairro'];
		$typeImovel_id		= $_POST['typeImovel_id'];
		
		$sql = "UPDATE imoveis SET endereco='{$endereco}',
			numero = '{$numero}',
			complemento = '{$complemento}',
			bairro = '{$bairro}',
			typeImovel_id = '{$typeImovel_id}'
		WHERE id=" . $_POST['id'];

		if( $conn->query($sql) === TRUE){
			echo "<div class='alert alert-success'>Successfully updated  user</div>";
		}else{
			echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
		}

	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM imoveis WHERE id={$id}";
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
				
				<label for="endereco">endereço</label>
				<input type="text" id="endereco"  name="endereco"
				value="<?php echo $row['endereco']; ?>" class="form-control"><br>

				<label for="numero">numero</label>
				<input type="text"  name="numero" id="numero"
				value="<?php echo $row['numero']; ?>" class="form-control"><br>

				<label for="complemento">complemento</label> 
				<input type="text"  name="complemento" id="complemento" 
				value="<?php echo $row['complemento']; ?>" class="form-control"><br>

				<label for="bairro">bairro</label> 
				<input type="text"  name="bairro" id="bairro"
				value="<?php echo $row['bairro']; ?>" class="form-control"><br>
				
				<label for="typeImovel_id">ID tipoImovel</label> 
				<input type="text"  name="typeImovel_id" id="typeImovel_id"
				value="<?php echo $row['typeImovel_id']; ?>" class="form-control"><br>

				<br><br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>



<?php include("_tempFooterCom.php"); ?>
