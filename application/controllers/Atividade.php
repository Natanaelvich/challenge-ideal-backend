<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Atividade extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json');
	}

	public function get($id)
	{
		$data = [];
		$atividade = $this->doctrine->em->find("Entity\Atividade", $id);
		$data[] = [
			"id" => $atividade->getId(),
			"data" => $atividade->getDataCadastro(),
			"descricao" => $atividade->getDescricao()
		];
		echo json_encode($data);
	}

	public function create($id)
	{
		$input_data = json_decode(trim(file_get_contents('php://input')), true);

		/**
		 * validation descricao
		 */
		if (!isset($input_data) || $input_data['descricao'] == '') {
			echo json_encode(['error' => 'validation fails', 'msg' => 'descricao is required']);
			exit;
		}

		/**
		 * get projeto
		 */
		$projeto = $this->doctrine->em->find("Entity\projeto", $id);

		/**
		 * create new descricao
		 */
		$atividade = new Entity\Atividade;
		$atividade->setDescricao($input_data['descricao']);
		$atividade->setIdProjeto($projeto);
		$atividade->setDataCadastro(date("Y-m-d H:i:s"));
		$this->doctrine->em->persist($atividade);
		$this->doctrine->em->flush();

		$data = [
			"id" => $atividade->getId(),
			"descricao" => $atividade->getDescricao()
		];

		echo json_encode($data);
	}

	public function update($id)
	{
		$input_data = json_decode(trim(file_get_contents('php://input')), true);

		/**
		 * validation descricao
		 */
		if (!isset($input_data) || $input_data['descricao'] == '') {
			echo json_encode(['error' => 'validation fails', 'msg' => 'descricao is required']);
			exit;
		}

		/**
		 * update atividade
		 */
		$atividade = $this->doctrine->em->find("Entity\atividade", $id);
		$atividade->setDescricao($input_data['descricao']);
		$this->doctrine->em->merge($atividade);
		$this->doctrine->em->flush();

		$data = [
			"id" => $atividade->getId(),
			"descricao" => $atividade->getDescricao()
		];

		echo json_encode($data);
	}

	public function delete($id)
	{

		$atividade = $this->doctrine->em->find("Entity\atividade", $id);


		$this->doctrine->em->remove($atividade);
		$this->doctrine->em->flush();


		echo json_encode([]);
	}
}
