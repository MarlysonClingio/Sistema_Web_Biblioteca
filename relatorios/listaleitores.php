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
		       <th colspan="100%">LISTAGEM DE LEITORES</th>
		   </tr>
		   <tr>
		       <th width="5%">ID</id>
			   <th>NOME</id>
			   <th>SEXO</id>
			   <th>NASCIMENTO</id>
			   <th>CPF</id>
			   <th>RUA</id>
			   <th>NUMERO</id>
			   <th>BAIRRO</id>
			   <th>FONE</id>
			   <th>E-MAIL</id>
		   <tr>
	  </thead>
	  <tbody>
		   <?php
			  include('../db/PdoConexao.class.php');
			  include('../db/InterfaceCRUD.class.php'); 			  
			  include('../db/Leitor.class.php'); 
			  include('../db/LeitorCRUD.class.php'); 
			  
			  //criar objeto do Leitor
			  $leitorCRUD = new LeitorCRUD();
			  
			  $sql = "select * from tbleitor order by nome";
			  
			  $pesquisa = $leitorCRUD->consultar($sql);
			  
			  foreach($pesquisa as $linha){
				 echo '<tr>
						   <td>'.$linha['id_leitor'].'</td>
						   <td>'.$linha['nome'].'</td>
						   <td>'.$linha['sexo'].'</td>
						   <td>'.$linha['nascimento'].'</td>
						   <td>'.$linha['cpf'].'</td>
						   <td>'.$linha['rua'].'</td>
						   <td>'.$linha['numero'].'</td>
						   <td>'.$linha['bairro'].'</td>
						   <td>'.$linha['fone'].'</td>
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