<?php
  //inicializando a sessão
  session_start();
  //destruindo a sessão e as variáveis
  session_destroy();
  //redirecionando para página de login
  header('Location: index.php?mess=logout');
?>