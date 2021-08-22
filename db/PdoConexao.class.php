<?php
class PdoConexao{
	private static $instancia;
	
	public static function getInstancia(){
			//verificando se o objeto instancia não existe
			if(!isset(self::$instancia)){
				try{
					//dados para conexão com o mysql
					$dns = 'mysql:host=localhost;dbname=dbbiblioteca';
					$usuario = 'root';
					$senha = '';
					
					//criação da conexão
					self::$instancia = new PDO($dns,$usuario,$senha);
					
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					
				}catch(PDOException $excecao){
					echo $excecao->getMessage();
					//finalizando a ação
					exit();
				}
			}	
			return self::$instancia;
	}
}
?>

