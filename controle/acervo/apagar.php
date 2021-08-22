<?php
   if(isset($_GET['id'])){
	 include('../../db/PdoConexao.class.php');
	 include('../../db/Acervo.class.php');
	 include('../../db/InterfaceCRUD.class.php');
	 include('../../db/AcervoCRUD.class.php');
	 	 
	 //criar um objeto da classe AcervoCRUD
	 $acervoCRUD = new AcervoCRUD();
	 
	 if($acervoCRUD->apagar($_GET['id'])){
		 header('Location: ../../acervo/frmbusca.php?mess=deleteok');
	 }else{
		 header('Location: ../../acervo/frmbusca.php?mess=deleteerro');
	 }
	 
   }
?>