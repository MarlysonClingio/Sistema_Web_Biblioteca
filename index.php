<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Biblioteca</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<i class="fa fa-book"></i>
    <a href="#"><b>Biblio</b>teca</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Informe os dados para entrar</p>
      
	  <form name="form1" action="login.php" method="POST">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="senha" type="password" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Lembrar dados
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i>&nbsp;Entrar</button>
          </div>
          <!-- /.col -->
        </div>
		
		<?php 
		  echo '<hr>';
		  //verificando a existencia da variavel mess chegando por GET
		  if(isset($_GET['mess'])){
			  //verifica se o valor de mess é erro
			  if($_GET['mess'] == 'erro'){
				  //escreve mensagem de login errado
				  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Atenção!</strong> Dados incorretos.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
					    </div>';
			  }
			  //verifica se valor é sem sessão
			  if($_GET['mess'] == 'nosession'){
				  //escreve mensagem para fazer login 
				  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Atenção!</strong> Faça login para entrar.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
					    </div>';
			  }
			  //verifica se valor é logout
			  if($_GET['mess'] == 'logout'){
				  //escreve mensagem de saída realizada com sucesso
				  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Atenção!</strong> Saída do sistema realizada com sucesso.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
					    </div>';
			  }
		  }
		?>
		
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Esqueci a senha</a>
      </p>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>