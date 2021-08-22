<?php
  if(isset($_POST['id'])){
	include('../../db/PdoConexao.class.php');
	include('../../db/InterfaceCRUD.class.php');		
	include('../../db/Empdev.class.php');
	include('../../db/EmpdevCRUD.class.php');
	
	//criando objeto da classe empdevCRUD
	$empdevCRUD = new EmpdevCRUD();
	
	//testando se a atualização foi realizada
	if($empdevCRUD->devolver($_POST['id'],$_POST['data_dev'])){
		header('Location: ../../empdev/frmbusca.php?mess=updateok');
	}else{
		header('Location: ../../empdev/frmbusca.php?mess=updateerro');
	}
  } 
?>