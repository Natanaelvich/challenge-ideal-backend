<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atividade extends CI_Controller{
	function __construct(){
		parent::__construct();
		header('Content-Type: application/json');
	}
	
	public function projeto($id){
		$data = [];
		$atividades = $this->doctrine->em->getRepository("Entity\Atividade")
									 ->findBy(array("idProjeto"=>$id),array("dataCadastro"=>"asc"));	
		foreach($atividades as $ativadade){
			$data[] = [
				"id"=>$ativadade->getId(),
				"data"=>$ativadade->getDataCadastro(),
				"descricao"=>$ativadade->getDescricao()
			];
		}				 			
		echo json_encode($data);
    }

    public function get($id){
		$data = [];
		$atividade = $this->doctrine->em->find("Entity\Atividade",$id);
		$data[] = [
            "id"=>$atividade->getId(),
            "data"=>$atividade->getDataCadastro(),
            "descricao"=>$atividade->getDescricao()
        ];			 			
		echo json_encode($data);
    }
    
}