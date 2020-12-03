
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



//Aqui fazemos o upload da imagem para a pasta img
            
            $arquivo = $_FILES['arquivo']['name'];
			
			
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
	        //começo do Cadastrado
            if (isset($_POST['btn-cadastrar'])):
         	$nomeAcademia = clear ($_POST['nome_academia']);
	        $cnpj =clear($_POST['cnpj']);
	        $email =clear( $_POST['email']);
	        $telefone = clear($_POST['telefone']);
	        $site = clear( $_POST['url_site']);
	        $imagens = clear( $_POST['arquivo']);
	        $senha = clear( $_POST['senha']);
	        $endereco = "   ";
	        $modalidades =clear( $_POST['modalidades']);
	        $descricao = clear($_POST['descricao']);
			                                                                               
	$sql = "INSERT INTO cadastroacademia(nomeacademia,cnpj,email,modalidades,telefone,site,descricao,imagens,senha,endereco) 
	VALUES('$nomeAcademia','$cnpj','$email','$modalidades','$telefone','$site','$descricao','$imagens','$senha','$endereco')";

	

	if( mysqli_query($connect, $sql)):


	 $sql = "SELECT * FROM cadastroacademia ORDER by cadastroacademia.id DESC  ";
	 $resultado = mysqli_query($connect, $sql);
	 mysqli_num_rows($resultado) > 0;
     $dados = mysqli_fetch_array($resultado);

	 $idlogado = $dados['id'];





		  echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/procuracep.php?id=$idlogado'>";
			       // header('Location: ../teladepostagens.php?idlogado= ' '');
                  
 
	else:
		  $_SESSION['mensagem'] = "Erro Senha ou email errado";
				     //  header('Location: ../teladepostagens.php?idlogado= 0');
		           echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:83/Academia/Home.php?id=0&j=$login&l=$senha'>";
			       
	endif;
endif;