<?php
class Leitor{
	private $id = null;
	private $nome;
	private $nascimento;
	private $cpf;
	private $sexo;
	private $fone;
	private $rua;
	private $numero;
	private $bairro;
	private $cidade;
	private $email;
	
	
	public function __construct($nome, $nascimento, $cpf, $sexo, $fone, $rua, $numero,$bairro,$cidade,$email){
		$this->nome = $nome;
		$this->nascimento = $nascimento;
		$this->cpf = $cpf;
		$this->sexo = $sexo;		
		$this->fone = $fone;
		$this->rua = $rua;
		$this->numero = $numero;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->email = $email;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getFone(){
		return $this->fone;
	}

	public function setFone($fone){
		$this->fone = $fone;
	}

	public function getRua(){
		return $this->rua;
	}

	public function setRua($rua){
		$this->rua = $rua;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	
}  
?>