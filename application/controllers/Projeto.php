<?php

use Doctrine\ORM\Query\Expr\Comparison;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Projeto extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json');
	}

	public function atividades($id)
	{
		$data = [];
		$atividades = $this->doctrine->em->getRepository("Entity\Atividade")
			->findBy(array("idProjeto" => $id), array("dataCadastro" => "asc"));

		foreach ($atividades as $ativadade) {
			$data[] = [
				"id" => $ativadade->getId(),
				"data" => $ativadade->getDataCadastro(),
				"descricao" => $ativadade->getDescricao()
			];
		}

		echo json_encode($data);
	}

	public function get($id)
	{
		$projeto = $this->doctrine->em->find("Entity\projeto", $id);
		$data = [
			"id" => $projeto->getId(),
			"descricao" => $projeto->getDescricao()
		];

		echo json_encode($data);
	}

	public function create()
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
		 * create new project
		 */
		$projeto = new Entity\Projeto;
		$projeto->setDescricao($input_data['descricao']);
		$this->doctrine->em->persist($projeto);
		$this->doctrine->em->flush();

		$data = [
			"id" => $projeto->getId(),
			"descricao" => $projeto->getDescricao()
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
		 * update projeto
		 */
		$projeto = $this->doctrine->em->find("Entity\projeto", $id);
		$projeto->setDescricao($input_data['desc']);
		$this->doctrine->em->merge($projeto);
		$this->doctrine->em->flush();

		$data = [
			"id" => $projeto->getId(),
			"descricao" => $projeto->getDescricao()
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
