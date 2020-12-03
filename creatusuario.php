
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




	        //começo do Cadastrado
           if (isset($_POST['btn-cadastrar'])):
         	$nome = clear ($_POST['nome_usuario']);
	        $cpf =clear($_POST['cpf']);
	        $email =clear( $_POST['email']);
	        $telefone = clear($_POST['telefone']);
	        $endereco = clear( $_POST['endereco']);
	        $numero = clear( $_POST['numero']);
	        $bairro = clear( $_POST['bairro']);
	        $estado = clear( $_POST['estado']);
	        $cidade =clear( $_POST['cidade']);
	        $cep = clear($_POST['cep']);
			$senha = clear($_POST['senha']);   
			$idacademia=0;
                                                                    
	$sql = "INSERT INTO cadastrousuario(nome,cpf,email,telefone,endereco,numero,bairro,estado,cidade,cep,senha)
	VALUES('$nome','$cpf','$email','$telefone','$endereco','$numero','$bairro','$estado','$cidade','$cep','$senha')";
	
	
	if( mysqli_query($connect, $sql)):





	
	 
		  echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/login.php?id=0&idlogado=0'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                  
 
        	else:
		  $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
					 //echo"<h1>$sql</h1>";
		         echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/Home.php?id=0&j=$login&l=$sql'>";
			       
	endif;
endif;