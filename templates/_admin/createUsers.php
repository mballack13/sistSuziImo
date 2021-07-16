<?php 
	include '../../config/config.php';
	session_start();

    include("_tempHeaderAdm.php");
?>

<?php
if(isset($_POST['adicionar'])){
    if( 
		empty($_POST['name'])		||
		empty($_POST['email'])		||
		empty($_POST['password'])	||
		empty($_POST['typeUsers_id']) 
	){echo "Preencha todos os campos";}
	
	else{
        
		$name 			= $_POST['name'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		$token 			= md5($_POST['password']);
		$typeUsers_id	= $_POST['typeUsers_id'];

        $sql = "INSERT INTO users (name, email, password, token, typeUsers_id)
		VALUES ('$name', '$email', '$password', '$token', '$typeUsers_id')
		";

        if( $conn->query($sql) === TRUE){
            echo "<div class='alert alert-success'>Adicionado com sucesso</div>";
        }else{
            echo "<div class='alert alert-danger'>Zikou!</div>";
        }
    }
}
?>




<div class="container">



<div class="col-md-6 col-md-offset-3">
	<div class="box">
		<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Adicione novo Usuário</h3>
			<form action="" method="POST">
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">nome</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="">
						</div>
				</div>
				
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="">
						</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">senha</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="">
						</div>
				</div>
				
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">Tipo de Usuário</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="typeUsers_id" name="typeUsers_id" placeholder="">
						</div>
				</div>

				
				
				<br>
				<input type="submit" name="adicionar" class="btn btn-success" value="Adicionar">
			</form>
	</div>
</div>



</div>

<?php include("_tempFooterAdm.php"); ?>