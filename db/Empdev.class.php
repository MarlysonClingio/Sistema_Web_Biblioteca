<?php
class Empdev{
	private $id = null;
	private $id_acervo;
	private $id_leitor;
	private $id_usuario;
	private $data;
	private $hora;
	private $data_dev;
		
	public function __construct($id_acervo, $id_leitor, $id_usuario, $data, $hora, $data_dev){
		$this->id_acervo = $id_acervo;
		$this->id_leitor = $id_leitor;
		$this->id_usuario = $id_usuario;
		$this->data = $data;		
		$this->hora = $hora;
		$this->data_dev = $data_dev;
	}
	
		public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_acervo(){
		return $this->id_acervo;
	}

	public function setId_acervo($id_acervo){
		$this->id_acervo = $id_acervo;
	}

	public function getId_leitor(){
		return $this->id_leitor;
	}

	public function setId_leitor($id_leitor){
		$this->id_leitor = $id_leitor;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getData_dev(){
		return $this->data_dev;
	}

	public function setData_dev($data_dev){
		$this->data_dev = $data_dev;
	}
	
}  
?>