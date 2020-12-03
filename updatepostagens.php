<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editarpostagens'])):
	$foto = pg_escape_string($connect, $_POST['imagem']);
	$mensagem = pg_escape_string($connect, $_POST['textPostar']);
	$idacademia = pg_escape_string($connect, $_POST['idacademia']);


	$id = pg_escape_string($connect, $_POST['id']);
	
	$sql = "UPDATE postagem SET foto = '$foto', mensagem = '$mensagem', idacademia = '$idacademia' WHERE id = '$id'";

	if(pg_query($connect, $sql)):
	       $_SESSION['mensagem'] = " sucesso!";
		    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=$id'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                       	else:
		$_SESSION['mensagem'] = "Erro ";
		  $_SESSION['mensagem'] = "Erro";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=0&j=$login&l=$senha'>";
			      
		endif;
endif;