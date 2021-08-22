<?php
  //verificando se os valores da pagina de index estão chegando
  if(isset($_POST['email']) && isset($_POST['senha'])){
	 include('db/PdoConexao.class.php');
	 include('db/InterfaceCRUD.class.php');
	 include('db/Usuario.class.php');
	 include('db/UsuarioCRUD.class.php');
	 //criar um objeto usuarioCRUD
	 $usuarioCRUD = new UsuarioCRUD();
	 //realizando o método login da classe UsuarioCRUD
	 $login = $usuarioCRUD->login($_POST['email'],$_POST['senha']);
	 
	 if($login == false){
		header('Location: index.php?mess=erro');
	 }else{
		//inicializando a sessão 
		session_start();
		//crianddo uma variavel de sessão chamada login
		$_SESSION['login'] = 'ok';
		//variaveis para o nome do usuario e o id_usuario
		$_SESSION['id_usuario'] = $login->id_usuario;
		$_SESSION['nome_usuario'] = $login->nome;
		header('Location: principal.php?mess=ok');
	 }
  }
?>