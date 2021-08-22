<?php
   if(isset($_GET['id'])){
	 include('../../db/PdoConexao.class.php');
	 include('../../db/Leitor.class.php');
	 include('../../db/InterfaceCRUD.class.php');
	 include('../../db/LeitorCRUD.class.php');
	 
	 
	 //criar um objeto da classe LeitorCRUD
	 $leitorCRUD = new leitorCRUD();
	 
	 if($leitorCRUD->apagar($_GET['id'])){
		 header('Location: ../../leitor/frmbusca.php?mess=deleteok');
	 }else{
		 header('Location: ../../leitor/frmbusca.php?mess=deleteerro');
	 }
	 
   }
?>