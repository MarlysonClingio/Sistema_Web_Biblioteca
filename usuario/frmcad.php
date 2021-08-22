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
            <h1 class="m-0 text-dark">Cadastro de Usuários</h1>
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
					  if($_GET['mess'] == 'ok'){
						  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> dados cadastrados com sucesso!.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }	
					  if($_GET['mess'] == 'erro'){
						  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Atenção!</strong> erro ao cadastrar!.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }					  
				  }
				?> 
                  <form name="f1" method="POST" action="../controle/usuario/salvar.php" onsubmit="return validar()">
					<div class="form-group">  					  
					  <a href="frmbusca.php" class="btn btn-lg btn-default" /><i class='fa fa-arrow-left'></i>&nbsp;Voltar</a>
					</div>	
					<div class="form-group">             
						<div class="col-md-12">
						   <label>Nome</label>								  
						   <div class="input-group">
						    <div class="input-group-append">
							   <div class="input-group-text">
							      <span class="fa fa-user"></span>
							   </div>
							</div>
							<input name="nome" type="text" class="form-control" placeholder="Informe o nome" required>						
						   </div>
						</div>  
					</div>
					<div class="form-group">             
						<div class="col-md-12">
						   <label>E-mail</label>								  
						   <div class="input-group">
						    <div class="input-group-append">
							   <div class="input-group-text">
							      <span class="fa fa-envelope"></span>
							   </div>
							</div>
							<input name="email" type="email" class="form-control" placeholder="Informe o e-mail" required>						
						   </div>
						</div>  
					</div>
					<div class="form-group">             
						<div class="col-md-12">
						   <label>Senha</label>								  
						   <div class="input-group">
						    <div class="input-group-append">
							   <div class="input-group-text">
							      <span class="fa fa-lock"></span>
							   </div>
							</div>
							<input name="senha" type="password" class="form-control" placeholder="Informe a senha" required>						
						   </div>
						</div>  
					</div>
					<hr>
					<div class="form-group">
					    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Salvar</button>
						<a href="frmbusca.php" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Cancelar</a>
					</div>
					
				</form>				
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
  function validar(){
	if(confirm('Deseja realmente salvar o registro?')){
	   return true;	
	}else{
	   return false;
	}  
  }
</script>
</body>
</html>
