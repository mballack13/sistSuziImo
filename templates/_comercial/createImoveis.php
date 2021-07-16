<?php 
	include '../../config/config.php';
	session_start();

    include("_tempHeaderCom.php");
?>

<?php
if(isset($_POST['adicionar'])){
    if( 
		empty($_POST['endereco'])		||
		empty($_POST['numero'])			||
		empty($_POST['complemento'])	||
		empty($_POST['bairro'])			||
		empty($_POST['typeImovel_id']) 
	){echo "Preencha todos os campos";}
	
	else{
        
		$endereco 			= $_POST['endereco'];
		$numero 			= $_POST['numero'];
		$complemento		= $_POST['complemento'];
		$bairro				= $_POST['bairro'];
		$typeImovel_id		= $_POST['typeImovel_id'];

        $sql = "INSERT INTO imoveis (endereco, numero, complemento, bairro, typeImovel_id)
		VALUES ('$endereco', '$numero', '$complemento', '$bairro', '$typeImovel_id')
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
		<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Adicione novo Imovel</h3>
			<form action="" method="POST">
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">endereco</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="endereco" name="endereco" placeholder="">
						</div>
				</div>
				
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">numero</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="numero" name="numero" placeholder="">
						</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">comple-<br>mento</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="complemento" name="complemento" placeholder="">
						</div>
				</div>
				
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">bairro</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
						</div>
				</div>


				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">ID tipo Imovel</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="typeImovel_id" name="typeImovel_id" placeholder="">
						</div>
				</div>				
				
				
				<br>
				<input type="submit" name="adicionar" class="btn btn-success" value="Adicionar">
			</form>
	</div>
</div>



</div>

<?php include("_tempFooterCom.php"); ?>