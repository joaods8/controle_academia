<?php 

class PagamentosController {
    private $ID;
	private $IDALUNO;
	private $DATAVENCIMENTO;
    private $DATAPAGAMENTO;
	private $VALOR;
    private $STATUS;

	public function setId( $ID )
    {
        $this->ID = $ID;
        return $this;
    }
      
    public function getId()
    {
        return $this->ID;
    }

    public function getStatus()
    {
        return $this->Status;
    }
     
    public function setStatus($Status)
    {
        return $this->Status = $Status;
    }

    public function getIdAluno() {
        return $this->IdAluno;
    }
     
    public function setIdAluno($IdAluno) {
        $this->IdAluno = $IdAluno;
    }

    public function getDataVencimento() {
        return $this->DataVencimento;
    }
     
    public function setDataVencimento($DataVencimento) {
        $this->DataVencimento = $DataVencimento;
    }

    public function getDataPagamento() {
        return $this->DataPagamento;
    }
     
    public function setDataPagamento($DataPagamento) {
        $this->DataPagamento = $DataPagamento;
    }

    public function getValor() {
        return $this->Valor;
    }
     
    public function setValor($Valor) {
        $this->Valor = $Valor;
    }
}

?>