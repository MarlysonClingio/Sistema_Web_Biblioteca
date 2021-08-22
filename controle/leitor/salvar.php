<?php
  if(isset($_POST['nome'])){
	include('../../db/PdoConexao.class.php');   
	include('../../db/Leitor.class.php');   
	include('../../db/InterfaceCRUD.class.php');   
	include('../../db/LeitorCRUD.class.php');  
	//criação do objeto usuario
	$leitor = new Leitor($_POST['nome'],$_POST['nascimento'],$_POST['cpf'],$_POST['sexo'],$_POST['fone'],$_POST['rua'],$_POST['numero'],$_POST['bairro'],$_POST['cidade'],$_POST['email']);
	
	//criando objeto da classe CRUD
	$leitorCRUD = new LeitorCRUD();
	
	if($leitorCRUD->salvar($leitor)){
		header('Location: ../../leitor/frmcad.php?mess=ok'); 
	}else{
		header('Location: ../../leitor/frmcad.php?mess=erro'); 
    }
	
  }
?>