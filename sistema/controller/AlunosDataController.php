<?php 

class AlunosDataController {
    private $ID;
	private $IDALUNO;
	private $DATAINICIO;
    private $DATADESLIGAMENTO;

	public function setId( $ID )
    {
        $this->ID = $ID;
        return $this;
    }
      
    public function getId()
    {
        return $this->ID;
    }

    public function getIdAluno() {
        return $this->IdAluno;
    }
     
    public function setIdAluno($IdAluno) {
        $this->IdAluno = $IdAluno;
    }

    public function getDataInicio() {
        return $this->DataInicio;
    }
     
    public function setDataInicio($DataInicio) {
        $this->DataInicio = $DataInicio;
    }

    public function getDataDesligamento() {
        return $this->DataDesligamento;
    }
     
    public function setDataDesligamento($DataDesligamento) {
        $this->DataDesligamento = $DataDesligamento;
    }
}

?>