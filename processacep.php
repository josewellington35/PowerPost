
<?php
session_start();
//conectando ao banco de dado

require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);
	$t = $id;
	$sql = "SELECT * FROM cadastroacademia WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
  if (isset($_POST['btn-cadastrar'])):
    $id =clear( $_POST['id']);
	$cep = clear( $_POST['cep']);
	$endereco =clear( $_POST['rua']);
	$numero=clear( $_POST['numero']);
	$complemento =clear( $_POST['complemento']);
	$bairro = clear( $_POST['bairro']);
	$cidade = clear( $_POST['cidade']);
	$estado = clear( $_POST['uf']);
	

	

	$result_usuario ="INSERT INTO  enderecoacademia (cep,endereco,numero,complemento,bairro,cidade,estado,idacademia) 
	VALUES ('$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$id')";
	
	
		
		if(mysqli_query($connect, $result_usuario)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$id'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                       	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		  $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=0&j=$login&l=$senha'>";
			      
		endif;
endif;