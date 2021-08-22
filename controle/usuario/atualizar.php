<?php
  if(isset($_POST['nome'])){
	include('../../db/PdoConexao.class.php');
	include('../../db/InterfaceCRUD.class.php');		
	include('../../db/Usuario.class.php');
	include('../../db/UsuarioCRUD.class.php');
	//criando objeto usuario e passando os dados para o construtor
	$usuario = new Usuario($_POST['nome'],$_POST['email'],$_POST['senha']);
	
	//adicionando o id desse usuario
	$usuario->setId($_POST['id']);
	
	//criando objeto da classe UsuarioCRUD
	$usuarioCRUD = new UsuarioCRUD();
	
	//testando se a atualização foi realizada
	if($usuarioCRUD->atualizar($usuario)){
		header('Location: ../../usuario/frmbusca.php?mess=updateok');
	}else{
		header('Location: ../../usuario/frmbusca.php?mess=updateerro');
	}
  } 
?>