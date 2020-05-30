<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller{
	function __construct(){
		parent::__construct();
		header('Content-Type: application/json');
	}
	
	public function povoar(){
		//povoando tabela projeto
		$projeto = new Entity\Projeto;
		$projeto->setDescricao("Projeto 1");
		$this->doctrine->em->persist($projeto);
		$this->doctrine->em->flush();
		
		for($i=0;$i<10;$i++){
			//povoando tabela atividades
			$atividade = new Entity\Atividade;
			$atividade->setDescricao("Atividade ".($i+1));
			$atividade->setIdProjeto($projeto);
			$atividade->setDataCadastro(date("Y-m-d H:i:s"));
			$this->doctrine->em->persist($atividade);
			$this->doctrine->em->flush();
		}
	}


}