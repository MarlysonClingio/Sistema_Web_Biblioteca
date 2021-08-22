<html>
  <head>
     <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" type="text/css">
	 <link rel="stylesheet" href="style.css" type="text/css">	 
<style>
  @media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 0px 7px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }
</style>
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
		       <th colspan="100%">LISTAGEM DO ACERVO</th>
		   </tr>
		   
		   <tr>
				<th width="5%">ID</th>
				<th>ISBN</th>
				<th>AUTOR</th>
				<th>TITULO</th>
				<th>EDITORA</th>
				<th>EXEMPLAR</th>
				<th>STATUS</th>
				
			</tr>
	  </thead>
	  
	  <tbody>
		   <?php
			  include('../db/PdoConexao.class.php');
			  include('../db/InterfaceCRUD.class.php'); 			  
			  include('../db/Acervo.class.php'); 
			  include('../db/AcervoCRUD.class.php'); 
			  
			  //criar objeto do acervo
			  $acervoCRUD = new AcervoCRUD();
			  
			  $sql = "select * from tbacervo order by titulo";
			  
			  $pesquisa = $acervoCRUD->consultar($sql);
			  
			  foreach($pesquisa as $linha){
				 echo '<tr>
						   <td>'.$linha['id_acervo'].'</td>
						   <td>'.$linha['isbn'].'</td>
						   <td>'.$linha['autor'].'</td>
						   <td>'.$linha['titulo'].'</td>
						   <td>'.$linha['editora'].'</td>
						   <td>'.$linha['exemplar'].'</td>';
						if($linha['status'] == 'd'){
							echo '<td>Disponível</td>';
						}else{
							echo '<td>Emprestado</td>';
						}   
				echo'	</tr>'; 
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