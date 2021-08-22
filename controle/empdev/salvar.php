<?php
  if(isset($_POST['id_leitor'])){
	include('../../db/PdoConexao.class.php');   
	include('../../db/Empdev.class.php');   
	include('../../db/InterfaceCRUD.class.php');   
	include('../../db/EmpdevCRUD.class.php');  
	
	session_start();
	//criando objeto acervo e passando os dados para o construtor
	$empdev = new Empdev($_POST['id_acervo'],$_POST['id_leitor'],$_SESSION['id_usuario'],$_POST['data'],$_POST['hora'],null);
	
	//criando objeto da classe CRUD
	$empdevCRUD = new EmpdevCRUD();
	
	if($empdevCRUD->salvar($empdev)){
		header('Location: ../../empdev/frmcad.php?mess=ok'); 
	}else{
		header('Location: ../../empdev/frmcad.php?mess=erro'); 
    }
  }
?>