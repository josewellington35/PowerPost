<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';


if(isset($_GET['id'])):
	$id = pg_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM cadastroacademia WHERE id = '$id'";
	$resultado = pg_query($connect, $sql);
	$dados = pg_fetch_array($resultado);
endif;




if(isset($_POST['btn-editar'])):
	$nomeAcademia = pg_escape_string($connect, $_POST['nome_academia']);
	$cnpj = pg_escape_string($connect, $_POST['cnpj']);
	$email = pg_escape_string($connect, $_POST['email']);
	$modalidades = pg_escape_string($connect, $_POST['modalidade']);
	$telefone = pg_escape_string($connect, $_POST['telefone']);
	$site = pg_escape_string($connect, $_POST['site']);
	$descrica = pg_escape_string($connect, $_POST['descricao']);
	$imagens = pg_escape_string($connect, $_POST['imagem']);
	$senha = pg_escape_string($connect, $_POST['senha']);
	$endereco = "    ";


	$id = pg_escape_string($connect, $_POST['id']);
	
	$sql = "UPDATE cadastroacademia SET nomeacademia = '$nomeAcademia', cnpj = '$cnpj', email = '$email', modalidades = '$modalidades', site = '$site', descricao = '$descrica', imagens = '$imagens', senha = '$senha', endereco = '$endereco' WHERE id = '$id'";

	


			if(pg_query($connect, $sql)):
		$_SESSION['mensagem'] = "Alterado com sucesso!";
		    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=$id'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                       	else:
		$_SESSION['mensagem'] = "Erro ";
		  $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=0&j=$login&l=$senha'>";
			      
		endif;
endif;