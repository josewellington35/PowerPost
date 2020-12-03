<?php            
           
		    session_start();
			require_once 'db_connect.php';
            //conectando ao banco de dado
			function clear($input) {
	        global $connect;
	        // sql
	        $var = mysqli_escape_string($connect, $input);
	        // xss
	        $var = htmlspecialchars($var);
	        return $var;
             } 



	
	
			    $arquivo = $_FILES['arquivo']['name'];
		
		        // $foto =clear( $_POST['arquivo']);
		        $mensagem =clear( $_POST['txtPostar']);
	            $idacademia =clear( $_POST['txtidlogado']);


				
			  
	  	  //$controle = 0;
	      if(!empty($_POST['arquivo'])) { 
		  //controlo os campos ||  
		  $controle = 2;
		  
		  }
	     // if ($arquivo != null) {
	
	    





			//Pasta onde o arquivo vai ser salvos
			$_UP['pasta'] = 'foto/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif','ico','svg');
			
			
			
			//Renomeiar
			$_UP['renomeia'] = false;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
	       
        
		
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			//if($_FILES['arquivo']['error'] != 0){
			//	die(" erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
				//exit; //Para a execução do script
			//}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				
				 $_SESSION['mensagem'] = " A imagem não foi cadastrada extesão inválida.";
			}
			
			//Faz a verificação do tamanho do arquivo
		    if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				
				 $_SESSION['mensagem'] = " Isso não é uma imagem!";
			}
			
			                        //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			        
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					//$query = mysqli_query($conn, "INSERT INTO foto (
					//nome_imagem) VALUES('$nome_final')");

				}
           
		     
		   if (isset($_POST['btn-postar'])){


	       $id	= $_GET['id'];
$idlogado =$_GET['idlogado'];
	             

		

	                        $sql = "INSERT INTO postagem(foto,mensagem,idacademia) VALUES('$arquivo','$mensagem','$idacademia')";

	                        if(mysqli_query($connect, $sql)){
		                    $_SESSION['mensagem'] = "Cadastrado com sucesso! $a";
				            echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
                           }else{
					       echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
		                    $_SESSION['mensagem'] = "Erro ao cadastrar";
		                  
	                         }



					

					 echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
	        	 
					$_SESSION['mensagem'] = " Sucesso!";
				   }else {$_SESSION['mensagem'] = "Erro!";
				    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/teladepostagens.php?id=$id&idlogado=$idlogado'>";
	        	
                   }

			
		
	