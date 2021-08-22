<?php
  if(isset($_POST['nome'])){
	include('../../db/PdoConexao.class.php');
	include('../../db/InterfaceCRUD.class.php');		
	include('../../db/Leitor.class.php');
	include('../../db/LeitorCRUD.class.php');
	//criando objeto usuario e passando os dados para o construtor
	$leitor = new Leitor($_POST['nome'],$_POST['nascimento'],$_POST['cpf'],$_POST['sexo'],$_POST['fone'],$_POST['rua'],$_POST['numero'],$_POST['bairro'],$_POST['cidade'],$_POST['email']);
	
	//adicionando o id desse leitor
	$leitor->setId($_POST['id']);
	
	//criando objeto da classe leitorCRUD
	$leitorCRUD = new leitorCRUD();
	
	//testando se a atualização foi realizada
	if($leitorCRUD->atualizar($leitor)){
		header('Location: ../../leitor/frmbusca.php?mess=updateok');
	}else{
		header('Location: ../../leitor/frmbusca.php?mess=updateerro');
	}
  } 
?>