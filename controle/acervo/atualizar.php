<?php
  if(isset($_POST['isbn'])){
	include('../../db/PdoConexao.class.php');
	include('../../db/InterfaceCRUD.class.php');		
	include('../../db/Acervo.class.php');
	include('../../db/AcervoCRUD.class.php');
	
	//criando objeto acervo e passando os dados para o construtor
	$acervo = new Acervo($_POST['isbn'],$_POST['autor'],$_POST['titulo'],$_POST['ano_publicacao'],$_POST['editora'],$_POST['npaginas'],$_POST['exemplar']);
	
	//adicionando o id desse acervo
	$acervo->setId($_POST['id']);
	
	//criando objeto da classe AcervoCRUD
	$acervoCRUD = new AcervoCRUD();
	
	//testando se a atualização foi realizada
	if($acervoCRUD->atualizar($acervo)){
		header('Location: ../../acervo/frmbusca.php?mess=updateok');
	}else{
		header('Location: ../../acervo/frmbusca.php?mess=updateerro');
	}
  } 
?>