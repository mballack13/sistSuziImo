<?php
	session_start();
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
	include("_tempHeaderAdm.php");
?>



<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nome</th>
			<th scope="col">Email</th>
			<th scope="col">Senha</th>
			<th scope="col">Token</th>
			<th scope="col">ID do Tipo Usuário</th>
			<th scope="col">Descrição</th>	  
			<th scope="col">Ações</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			$result = mysqli_query($conn, "SELECT users.id AS id, users.name AS nome, users.email AS email, users.password AS password, users.token AS token, typeusers.id AS tipoIdUsu, typeusers.description AS descricao FROM users, typeusers WHERE users.typeUsers_id = typeusers.id");

			//var_dump($result);
			while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['nome']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['password']."</td>";
			echo "<td>".$res['token']."</td>";
			echo "<td>".$res['tipoIdUsu']."</td>";
			echo "<td>".$res['descricao']."</td>";
			echo "<td><a href=\"updateOnlyUsers.php?id=$res[id]\">Edit</a> |
			<a href=\"deleteOnlyUsers.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
		?>
	</tbody>
</table>


<?php include("_tempFooterAdm.php"); ?>