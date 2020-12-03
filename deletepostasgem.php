<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletarpostagens'])):
	
	$id = pg_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM postagem WHERE id = '$id'";

			if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                       	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		  $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=0&j=$login&l=$senha'>";
			      
		endif;
endif;