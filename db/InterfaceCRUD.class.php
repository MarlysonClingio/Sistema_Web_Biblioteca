<?php
interface InterfaceCRUD{
	public function salvar($object);
	public function ler($param);
	public function atualizar($object);
	public function apagar($param);
}	
?>