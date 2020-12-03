<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

$id = mysqli_escape_string($connect, $_GET['id']);

	 $sql = "SELECT * FROM cadastroacademia, postagem WHERE cadastroacademia.id =
	$id and postagem.idacademia = $id ORDER by postagem.id DESC  ";
	$resultado = mysqli_query($connect, $sql);
	 mysqli_num_rows($resultado) > 0;
   $dados = mysqli_fetch_array($resultado);

   $dadoid = $dados['idacademia'];

if(isset($_POST['btn-deletar'])):
	
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM cadastroacademia WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
	$sql = "DELETE FROM postagem WHERE idacademia = '$id'";
	
	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../Home.php?idlogado = 0');
     }
	else{
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../Home.php?idlogado= 0');
		}
	endif;
endif;