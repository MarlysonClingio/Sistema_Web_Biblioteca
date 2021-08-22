<?php
  if(isset($_POST['isbn'])){
	include('../../db/PdoConexao.class.php');   
	include('../../db/Acervo.class.php');   
	include('../../db/InterfaceCRUD.class.php');   
	include('../../db/AcervoCRUD.class.php');  
	
	//criando objeto acervo e passando os dados para o construtor
	$acervo = new Acervo($_POST['isbn'],$_POST['autor'],$_POST['titulo'],$_POST['ano_publicacao'],$_POST['editora'],$_POST['npaginas'],$_POST['exemplar']);
	
	//criando objeto da classe CRUD
	$acervoCRUD = new AcervoCRUD();
	
	if($acervoCRUD->salvar($acervo)){
		header('Location: ../../acervo/frmcad.php?mess=ok'); 
	}else{
		header('Location: ../../acervo/frmcad.php?mess=erro'); 
    }
  }
?>