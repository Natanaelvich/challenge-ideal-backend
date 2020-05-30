<?php
namespace Entity;

/**
* Atividade
*
* @Entity
* @Table(name="atividade")
* @author Marcos Iran<marcosiran@gmail.com>
*/

class Atividade{


	/**
	* @Id
	* @Column(type="integer", nullable=false)
	* @GeneratedValue(strategy="IDENTITY")
	*/
	public $id;

	/**
	* @Column(name="dataCadastro", type="string",  nullable=false)
	*/
	public $dataCadastro;
	
	/**
	* @OneToOne(targetEntity="Projeto")
	* @JoinColumn(name="idProjeto", referencedColumnName="id")
	*/
	public $idProjeto;

	/**
	* @Column(name="descricao", type="string", length=255, nullable=false)
	*/
	public $descricao;
		

	public function getId(){
			return $this->id;
	}

	public function getDataCadastro(){				
			return $this->dataCadastro;
	}

	public function setDataCadastro($dataCadastro){				
			$this->dataCadastro = $dataCadastro;
			return $this->dataCadastro;
	}	

	public function getDescricao(){				
			return $this->descricao;
	}

	public function setDescricao($descricao){				
			$this->descricao = $descricao;
			return $this->descricao;
	}
	
	public function getIdProjeto(){				
			return $this->idProjeto;
	}

	public function setIdProjeto($idProjeto){				
			$this->idProjeto = $idProjeto;
			return $this->idProjeto;
	}
}