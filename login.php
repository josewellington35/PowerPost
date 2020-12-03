<?php
    session_start();
    //conectando ao banco de dado

    require_once 'db_connect.php';
       function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

      
	               // $idlogado  = $_FILES['idlogado']['name'];
                    $login =clear($_POST['login']);
                    $senha =clear($_POST['senha']);
             //   $login  = $_FILES['login']['name'];
	               // $senha  = $_FILES['senha']['name'];
                   $idPermanente =clear($_POST['idlogado']);;



			    // $id = mysqli_escape_string($connect, $_GET['id']);
          $sql = "SELECT * FROM cadastroacademia WHERE email = '$login' and senha = '$senha'  ";
	      $resultado = mysqli_query($connect, $sql);

	     mysqli_num_rows($resultado) > 0;
         $dados = mysqli_fetch_array($resultado);

          
	                  $idlogado = $dados['id'];
	               

	               if($login == $dados['email'] &&  $senha== $dados['senha']){
		               $_SESSION['mensagem'] = "Aproveite e boa sorte!";
				     $idlogado = $dados['id'];
		               echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=$idPermanente&idlogado=$idlogado'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                   }else{


				             $sql = "SELECT * FROM cadastrousuario WHERE email = '$login' and senha = '$senha'  ";
	                         $resultado = mysqli_query($connect, $sql);

	                         mysqli_num_rows($resultado) > 0;
                             $dados = mysqli_fetch_array($resultado);

          
	                         $idlogado = $dados['id'];
	               

	                         if($login == $dados['email'] &&  $senha== $dados['senha']){
		                     $_SESSION['mensagem'] = "Aproveite e boa sorte!";
				             $idlogado = $dados['id'];
		                     echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=$idPermanente&idlogado=$idlogado'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');



				   }else {







				       $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/home.php?id=0&j=$login&l=$senha'>";
			       }
				   }	

 