<?php
   if(isset($_GET['id'])){
	 include('../../db/PdoConexao.class.php');
	 include('../../db/Empdev.class.php');
	 include('../../db/InterfaceCRUD.class.php');
	 include('../../db/EmpdevCRUD.class.php');
	 	 
	 //criar um objeto da classe EmpdevCRUD
	 $empdevCRUD = new EmpdevCRUD();
	 
	 if($empdevCRUD->apagar($_GET['id'])){
		 header('Location: ../../empdev/frmbusca.php?mess=deleteok');
	 }else{
		 header('Location: ../../empdev/frmbusca.php?mess=deleteerro');
	 }
	 
   }
?>