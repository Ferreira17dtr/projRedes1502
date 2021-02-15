<?php
session_start();
$con=new mysqli("localhost","root","","paisesredes");

if($con->connect_errno!=0) {
	echo "Ocorreu um erro no acesso à base de dados." .$con->connect_error;
	exit;
}
else {
	if(!isset($_SESSION['login'])) {
		$_SESSION['login']="correto";
	}
	else{ ($_SESSION['login']=="incorreto");
	}
?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>Paises</title>
		</head>
		<body>			
			<a href="http://localhost/paises_create.php"><h1>Criar paises</h1></a>
		<h1>Lista de paises</h1>
		<?php
		$stm = $con->prepare('select * from paisesredes');
		if ($stm==false) { }
		else {
		$stm->execute();
		$res=$stm->get_result();
		while($resultado = $res->fetch_assoc()) {

			echo '<a href="http://localhost/paises_edit.php?paisesredes=' .$resultado['id'].'">';
			echo ' editar '.'</a>';
			echo '<a href="http://localhost/paises_delete.php?paisesredes=' .$resultado['id'].'">';
			echo ' eliminar '.'</a>';
			echo '<a href="paises_show.php?paisesredes=' .$resultado['id']. '">';
			echo $resultado['pais'];	
			echo '</a>';
			echo '<br>';
		}
		$stm->close();
	}
		?>
	<br>

	<a href="http://localhost/cidades_create.php"><h1>Criar Cidades</h1></a>
		<h1>Lista de Cidades</h1>
		<?php
		$stm = $con->prepare('select * from paisesredes');
		if ($stm==false) { }
		else {
		$stm->execute();
		$res=$stm->get_result();
		while($resultado = $res->fetch_assoc()) {

			echo '<a href="http://localhost/cidades_edit.php?cidades=' .$resultado['id'].'">';
			echo ' editar '.'</a>';
			echo '<a href="http://localhost/cidades_delete.php?cidades=' .$resultado['id'].'">';
			echo ' eliminar '.'</a>';
			echo '<a href="cidades_show.php?cidades=' .$resultado['cidade']. '">';
			echo $resultado['cidade'];
			echo $resultado['numhabitantes'];
			echo '<br>';
			echo '</a>';

		}
		$stm->close();
		}
	}
	?>