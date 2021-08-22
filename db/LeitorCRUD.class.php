<?php
class LeitorCRUD implements InterfaceCRUD{
	private $instanciaConexaoPdoAtiva;
	private $tabela;
	
	public function __construct(){
		$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
		$this->tabela = 'tbleitor';	
	}
	
	public function salvar($objeto){
		$sql = "insert into {$this->tabela} (id_leitor, nome, nascimento, cpf, sexo, fone, rua, numero, bairro, cidade, email) " .
		"values (:id,:nome,:nascimento,:cpf, :sexo, :fone, :rua, :numero, :bairro, :cidade, :email)";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",null,PDO::PARAM_INT);
			$operacao->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
			$operacao->bindValue(":nascimento",$objeto->getNascimento(),PDO::PARAM_STR);
			$operacao->bindValue(":cpf",$objeto->getCpf(),PDO::PARAM_STR);
			$operacao->bindValue(":sexo",$objeto->getSexo(),PDO::PARAM_STR);
			$operacao->bindValue(":fone",$objeto->getFone(),PDO::PARAM_STR);
			$operacao->bindValue(":rua",$objeto->getRua(),PDO::PARAM_STR);
			$operacao->bindValue(":numero",$objeto->getNumero(),PDO::PARAM_STR);
			$operacao->bindValue(":bairro",$objeto->getBairro(),PDO::PARAM_STR);
			$operacao->bindValue(":cidade",$objeto->getCidade(),PDO::PARAM_STR);
			$operacao->bindValue(":email",$objeto->getEmail(),PDO::PARAM_STR);
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
		$sql = "update {$this->tabela} set nome=:nome, nascimento=:nascimento, cpf=:cpf, sexo=:sexo, fone=:fone, rua=:rua, numero=:numero, " .
		"bairro=:bairro, cidade=:cidade, email=:email where id_leitor=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$objeto->getId(),PDO::PARAM_INT);
			$operacao->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
			$operacao->bindValue(":nascimento",$objeto->getNascimento(),PDO::PARAM_STR);
			$operacao->bindValue(":cpf",$objeto->getCpf(),PDO::PARAM_STR);
			$operacao->bindValue(":sexo",$objeto->getSexo(),PDO::PARAM_STR);
			$operacao->bindValue(":fone",$objeto->getFone(),PDO::PARAM_STR);
			$operacao->bindValue(":rua",$objeto->getRua(),PDO::PARAM_STR);
			$operacao->bindValue(":numero",$objeto->getNumero(),PDO::PARAM_STR);
			$operacao->bindValue(":bairro",$objeto->getBairro(),PDO::PARAM_STR);
			$operacao->bindValue(":cidade",$objeto->getCidade(),PDO::PARAM_STR);
			$operacao->bindValue(":email",$objeto->getEmail(),PDO::PARAM_STR);
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
		$sql = "select * from {$this->tabela} where id_leitor=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->execute();
			$linha=$operacao->fetch(PDO::FETCH_OBJ);
			//objeto da classe Leitor
			$leitor = new Leitor($linha->nome,$linha->nascimento,$linha->cpf, $linha->sexo, $linha->fone, 
							$linha->rua, $linha->numero, $linha->bairro, $linha->cidade, $linha->email);
			$leitor->setId($id);
 			return $leitor;
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function apagar($id){
		$sql="delete from {$this->tabela} where id_leitor=:id";
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
	
	
}  
?>