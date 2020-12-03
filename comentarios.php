
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



//comentario na postagem
            
            $hoje = date('d/m/Y');

			
	        //começo do Cadastrado
            if (isset($_POST['btncomentario'])):
         	$cometario = clear ($_POST['txtcomentarios']);
	        $idusuario =clear($_POST['idusuario']);
	        $idpostagem =clear( $_POST['idpostagem']);
	        $datacomentario = $hoje;
	      

	$sql = "INSERT INTO comentario(comentario,idusuario,idpostagem,datacomentario) 
	VALUES('$cometario','$idusuario','$idpostagem','$datacomentario')";

$id	= $_GET['id'];
$idlogado =$_GET['idlogado'];

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Comentado com sucesso!";
	//header('Location: ../teladepostagens.php?id= '$id'  &idlogado= '$idlogado' ');
	 echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
			      
	else:
		$_SESSION['mensagem'] = "Erro ";
		 echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
	
		//header('Location: ../teladepostagens.php?id= '$id'  &idlogado= '$idlogado' ');
	endif;
endif;


