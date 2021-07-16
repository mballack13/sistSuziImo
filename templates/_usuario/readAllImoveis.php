<?php
	session_start();
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
	include("_tempHeaderUsu.php");
?>



<table class="table">
	<thead>
		<tr>
			<th scope="col">Endereço</th>
			<th scope="col">Número</th>
			<th scope="col">Complemento</th>
			<th scope="col">Bairro</th>
			<th scope="col">Tipo Imóvel</th>
			<th scope="col">Status do Imóvel</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			$result = mysqli_query($conn, "SELECT imoveis.id AS id, imoveis.endereco AS endereco,
			imoveis.numero AS numero, imoveis.complemento AS complemento,
			imoveis.bairro AS bairro,
			imoveis.typeImovel_id AS tipoImovel, typeImovel.description AS descricaoImo
			FROM imoveis, typeImovel WHERE imoveis.typeImovel_id = typeImovel.id AND
			imoveis.typeImovel_id = 1");

			//var_dump($result);
			while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['endereco']."</td>";
			echo "<td>".$res['numero']."</td>";
			echo "<td>".$res['complemento']."</td>";
			echo "<td>".$res['bairro']."</td>";
			echo "<td>".$res['tipoImovel']."</td>";
			echo "<td>".$res['descricaoImo']."</td>";
			}
		?>
	</tbody>
</table>


<?php include("_tempFooterUsu.php"); ?>