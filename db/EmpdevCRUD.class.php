<?php
class EmpdevCRUD implements InterfaceCRUD{
	private $instanciaConexaoPdoAtiva;
	private $tabela;
	
	public function __construct(){
		$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
		$this->tabela = 'tbempdev';	
	}
	
	public function salvar($objeto){
		$id = null;
		$id_acervo = $objeto->getId_acervo();
		$id_leitor = $objeto->getId_leitor();
		$id_usuario = $objeto->getId_usuario();
		$data = $objeto->getData();
		$hora = $objeto->getHora();
		$data_dev = $objeto->getData_dev();		
		$sql = "insert into {$this->tabela}(id_empdev, id_acervo, id_leitor, id_usuario, data, hora, data_dev) values (:id, :id_acervo, :id_leitor, :id_usuario, :data, :hora, :data_dev)";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":id_acervo",$id_acervo,PDO::PARAM_INT);
			$operacao->bindValue(":id_leitor",$id_leitor,PDO::PARAM_INT);
			$operacao->bindValue(":id_usuario",$id_usuario,PDO::PARAM_INT);
			$operacao->bindValue(":data",$data,PDO::PARAM_STR);
			$operacao->bindValue(":hora",$hora,PDO::PARAM_STR);
			$operacao->bindValue(":data_dev",$data_dev,PDO::PARAM_STR);
			
			//testando se o insert vai dar certo
			if($operacao->execute()){
				if($operacao->rowCount() > 0){
					return true;
				}else{
					return false;
				}
			}else{
			   return false;
			}			
		}catch (PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function atualizar($objeto){
		$id = $objeto->getId();
		$id_acervo = $objeto->getId_acervo();
		$id_leitor = $objeto->getId_leitor();
		$id_usuario = $objeto->getId_usuario();
		$data = $objeto->getData();
		$hora = $objeto->getHora();
		$data_dev = $objeto->getData_dev();
		$sql = "update {$this->tabela} set id_acervo=:id_acervo, id_leitor=:id_leitor, id_usuario=:id_usuario, data=:data, hora=:hora, data_dev=:data_dev where id_empdev=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":id_acervo",$id_acervo,PDO::PARAM_INT);
			$operacao->bindValue(":id_leitor",$id_leitor,PDO::PARAM_INT);
			$operacao->bindValue(":id_usuario",$id_usuario,PDO::PARAM_INT);
			$operacao->bindValue(":data",$data,PDO::PARAM_STR);
			$operacao->bindValue(":hora",$hora,PDO::PARAM_STR);
			$operacao->bindValue(":data_dev",$data_dev,PDO::PARAM_STR);
			if($operacao->execute()){
				return true;
			}else{
				return false;
			}			
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function ler($id){
		$sql = "select * from {$this->tabela} where id_empdev=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->execute();
			$linha=$operacao->fetch(PDO::FETCH_OBJ);
			$id_acervo=$linha->id_acervo; 
			$id_leitor=$linha->id_leitor;
			$id_usuario=$linha->id_usuario;
			$data=$linha->data;
			$hora=$linha->hora;
			$data_dev=$linha->data_dev;
			
			//objeto da classe empdev
			$empdev = new Empdev($id_acervo, $id_leitor, $id_usuario, $data, $hora, $data_dev);
			$empdev->setId($id);
 			return $empdev;
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function apagar($id){
		$sql="delete from {$this->tabela} where id_empdev=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			if($operacao->execute()){
				if($operacao->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function consultar($sql){
		try{
			//preparando sql;
			$operacao= $this->instanciaConexaoPdoAtiva->prepare($sql);
			//executando a consulta
			$operacao->execute();
			//convertendo a consulta em array
			$linhas = $operacao->fetchAll();
			//retornando o array como resultado
			return $linhas;			
		}catch(PDOException $excecao){
			//mostrando erro
			echo $excecao->getMessage();
		}
	}
	
	public function devolver($id, $data_dev){
		$sql = "update {$this->tabela} set data_dev=:data_dev where id_empdev=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":data_dev",$data_dev,PDO::PARAM_STR);			
			if($operacao->execute()){
				return true;
			}else{
				return false;
			}			
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	
}  
?>