<?php
class AcervoCRUD implements InterfaceCRUD{
	private $instanciaConexaoPdoAtiva;
	private $tabela;
	
	public function __construct(){
		$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
		$this->tabela = 'tbacervo';	
	}
	
	public function salvar($objeto){
		$id = null;
		$isbn = $objeto->getIsbn();
		$autor = $objeto->getAutor();
		$titulo = $objeto->getTitulo();
		$ano_publicacao = $objeto->getAno_publicacao();
		$editora = $objeto->getEditora();
		$npaginas = $objeto->getNpaginas();
		$exemplar = $objeto->getExemplar();
		$sql = "insert into {$this->tabela} (id_acervo, isbn, autor, titulo, ano_publicacao, editora, npaginas, exemplar) values (:id, :isbn, :autor, :titulo, :ano_publicacao, :editora, :npaginas, :exemplar)";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":isbn",$isbn,PDO::PARAM_STR);
			$operacao->bindValue(":autor",$autor,PDO::PARAM_STR);
			$operacao->bindValue(":titulo",$titulo,PDO::PARAM_STR);
			$operacao->bindValue(":ano_publicacao",$ano_publicacao,PDO::PARAM_STR);
			$operacao->bindValue(":editora",$editora,PDO::PARAM_STR);
			$operacao->bindValue(":npaginas",$npaginas,PDO::PARAM_STR);
			$operacao->bindValue(":exemplar",$exemplar,PDO::PARAM_STR);
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
		$isbn = $objeto->getIsbn();
		$autor = $objeto->getAutor();
		$titulo = $objeto->getTitulo();
		$ano_publicacao = $objeto->getAno_publicacao();
		$editora = $objeto->getEditora();
		$npaginas = $objeto->getNpaginas();
		$exemplar = $objeto->getExemplar();
		$sql = "update {$this->tabela} set isbn=:isbn, autor=:autor, titulo=:titulo, ano_publicacao=:ano_publicacao, editora=:editora, npaginas=:npaginas, exemplar=:exemplar where id_acervo=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":isbn",$isbn,PDO::PARAM_STR);
			$operacao->bindValue(":autor",$autor,PDO::PARAM_STR);
			$operacao->bindValue(":titulo",$titulo,PDO::PARAM_STR);
			$operacao->bindValue(":ano_publicacao",$ano_publicacao,PDO::PARAM_STR);
			$operacao->bindValue(":editora",$editora,PDO::PARAM_STR);
			$operacao->bindValue(":npaginas",$npaginas,PDO::PARAM_STR);
			$operacao->bindValue(":exemplar",$exemplar,PDO::PARAM_STR);
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
		$sql = "select * from {$this->tabela} where id_acervo=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->execute();
			$linha=$operacao->fetch(PDO::FETCH_OBJ);
			$isbn=$linha->isbn; 
			$autor=$linha->autor;
			$titulo=$linha->titulo;
			$ano_publicacao=$linha->ano_publicacao;
			$editora=$linha->editora;
			$npaginas=$linha->npaginas;
			$exemplar=$linha->exemplar;
			//objeto da classe acervo
			$acervo = new Acervo($isbn, $autor, $titulo, $ano_publicacao, $editora, $npaginas, $exemplar);
			$acervo->setId($id);
 			return $acervo;
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function apagar($id){
		$sql="delete from {$this->tabela} where id_acervo=:id";
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