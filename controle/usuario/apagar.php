<?php
   if(isset($_GET['id'])){
	 include('../../db/PdoConexao.class.php');
	 include('../../db/Usuario.class.php');
	 include('../../db/InterfaceCRUD.class.php');
	 include('../../db/UsuarioCRUD.class.php');
	 
	 
	 //criar um objeto da classe UsuarioCRUD
	 $usuarioCRUD = new UsuarioCRUD();
	 
	 if($usuarioCRUD->apagar($_GET['id'])){
		 header('Location: ../../usuario/frmbusca.php?mess=deleteok');
	 }else{
		 header('Location: ../../usuario/frmbusca.php?mess=deleteerro');
	 }
	 
   }
?>