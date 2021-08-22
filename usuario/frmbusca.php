<?php
  include('testasessao.php');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Biblioteca</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <i class="fa fa-book"></i>
      <span class="brand-text font-weight-light">Biblioteca</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuário</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../sair.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sair                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Busca de Usuários</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
	    
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
			  
				<?php
				if(isset($_GET['mess'])){
					  //verifica se o valor de mess é erro
					  if($_GET['mess'] == 'deleteok'){
						  //escreve mensagem de login errado
						  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> Registro excluído com sucesso!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }
					  if($_GET['mess'] == 'deleteerro'){
						  //escreve mensagem de login errado
						  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> Erro ao excluir registro!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }
					  //verifica se o valor de mess é erro
					  if($_GET['mess'] == 'updateok'){
						  //escreve mensagem de login errado
						  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> Registro atualizado com sucesso!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }
					  if($_GET['mess'] == 'updateerro'){
						  //escreve mensagem de login errado
						  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> Erro ao atualizar registro!
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }
					  
				}	  
				?>	
			  
                  <form id="formbusca" method="POST" action="frmbusca.php" >
					<div class="form-group">  
					  <a href="frmcad.php" class="btn btn-lg btn-success float-right" /><i class='fa fa-plus'></i>&nbsp;Novo</a>
					  <a href="../principal.php" class="btn btn-lg btn-default" /><i class='fa fa-arrow-left'></i>&nbsp;Voltar</a>
					</div>		
					<div class="col-md-12" >
						<div class="form-group ">             
						   <label>Informe um nome para busca</label>								  
						   <div class="input-group text-left">
							 
							 								  
							 <input id="texto" name="texto" type="text" class="form-control input" placeholder="Insira o texto para busca"id="texto" required title="Digite uma texto para a busca">
																
							 <span class="input-group-btn">
							    <button type="submit" class="btn btn-primary" type="submit" id="btnbuscar"><i class='fa fa-search'></i>&nbsp;Buscar</span>
							</div>
															 
						</div>  
					</div>
				
				<div style="overflow:scroll;height:400px">
					<table class="table table-hover table-checkable full-width" style="overflow:auto;">
					<thead class="thead-light">
					<tr>
						<th> ID </th>
					    <th> Usuário </th>
					    <th> Email </th>					                                                
					    <th> Ações </th>
					</tr>
					</thead>
					<tbody>
						<?php 
						  if(isset($_POST['texto'])){
							 include('../db/PdoConexao.class.php');
							 include('../db/InterfaceCRUD.class.php');
							 include('../db/Usuario.class.php');
							 include('../db/UsuarioCRUD.class.php');
							 
							 //criando objeto da classe UsuarioCRUD
							 $usuarioCRUD = new UsuarioCRUD();
							 
							 //criamos o sql pra consulta
							 $sql = "select * from tbusuario where nome like '%".$_POST['texto']."%' ";
							 
							 //array com os dados da consulta
							 $busca = $usuarioCRUD->consultar($sql);
							 //echo '<pre>';
							 //var_dump($busca);
							 foreach($busca as $linha){
								 echo '<tr>						   
										   <td>'.$linha['id_usuario'].'</td>
										   <td>'.$linha['nome'].'</td>
										   <td>'.$linha['email'].'</td>
										   <td width="20%">
										   <a href="frmalt.php?id='.$linha['id_usuario'].'" title="Alterar" class="btn btn-sm btn-primary">
											 <i class="fa fa-edit"></i>&nbsp;Alterar
										   </a>
										   <a href="../controle/usuario/apagar.php?id='.$linha['id_usuario'].'" onclick="validarDelete()" title="Excluir" class="btn btn-sm btn-danger" >
											 <i class="fa fa-trash"></i>&nbsp;Excluir
										   </a>
										   </td>
										</tr>';
							 }
							 
						  }
						?>
						
					</tbody>
					</table>
					</form>
					</div>
              </div>
            </div><!-- /.card -->
          </div>
		  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Opções</h5>
	  <a href="../sair.php">
		<p><i class="fa fa-sign-out-alt"></i> Sair</p>
	  </a>	  
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!--<div class="float-right d-none d-sm-inline">
      Anything you want
    </div>-->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="https://www.fadam.edu.br" target="_blank">FADAM</a>.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
  function validarDelete(){
	  if(!confirm('Deseja realmente excluir o registro?')){
		 event.stopPropagation();
		 event.preventDefault();
		 return false;
	  }
  }
</script>
</body>
</html>
