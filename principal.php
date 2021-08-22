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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nome_usuario'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cadastros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="usuario/frmbusca.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Usuários</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="leitor/frmbusca.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Leitores</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="acervo/frmbusca.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Acervo</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Empréstimo/Devolução
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
			  <li class="nav-item">
                <a href="empdev/frmbusca.php" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Emprestar</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-medical"></i>
              <p>
                Relatórios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
			  <li class="nav-item">
                <a href="relatorios/listausuarios.php" target="_blank" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Lista de Usuários</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="relatorios/listaacervo.php" target="_blank" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Lista de Acervo</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="relatorios/listaleitores.php" target="_blank" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Lista de Leitores</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item">
            <a href="sair.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Principal</h1>
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
									<strong>Atenção!</strong> login realizado com sucesso!.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>';
					  }			
				  }
				?> 
                <h5 class="card-title">Sistema de Gestão de Biblioteca</h5>

                <p class="card-text">
                  Seja bem-vindo(a)
                </p>
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
	  <a href="sair.php">
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
