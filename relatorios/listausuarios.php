<html>
  <head>
     <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" type="text/css">
	 <link rel="stylesheet" href="style.css" type="text/css">	 
  </head>
  <body>
	<center>
	<i class="fa fa-book"></i>
    <h2>PROJETO BIBLIOTECA</h2>
	<h3>Rua Fulano de Tal, Centro</h3>
	</center>
	<table width="100%" border="1px">
      <thead>
	       <tr>
		       <th colspan="100%">LISTAGEM DE USUÁRIOS</th>
		   </tr>
		   <tr>
		       <th width="5%">ID</id>
			   <th>NOME</id>
			   <th>EMAIL</id>
		   <tr>
	  </thead>
	  <tbody>
		   <?php
			  include('../db/PdoConexao.class.php');
			  include('../db/InterfaceCRUD.class.php'); 			  
			  include('../db/Usuario.class.php'); 
			  include('../db/UsuarioCRUD.class.php'); 
			  
			  //criar objeto do usuario
			  $usuarioCRUD = new UsuarioCRUD();
			  
			  $sql = "select * from tbusuario order by nome";
			  
			  $pesquisa = $usuarioCRUD->consultar($sql);
			  
			  foreach($pesquisa as $linha){
				 echo '<tr>
						   <td>'.$linha['id_usuario'].'</td>
						   <td>'.$linha['nome'].'</td>
						   <td>'.$linha['email'].'</td>
					   </tr>'; 
			  }
		   ?>		   
	       
	  </tbody>
	  <tfoot>
	    <tr>
		     <td colspan="100%"><b>Emitido em</b>: <?php echo date('d/m/Y');?></td>
		</tr>
		
	  </tfoot>
	</table>
  </body>
</html>