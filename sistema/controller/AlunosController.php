<?php 

class AlunosController {
    private $ID;
	private $NOME;
	private $STATUS;
    private $EMAIL;
	private $PROFISSAO;
    private $NASCIMENTO;
    private $TELEFONE;
    private $DATACADASTRO;
    private $PLANO;

	public function setId( $ID )
    {
        $this->ID = $ID;
        return $this;
    }
      
    public function getId()
    {
        return $this->ID;
    }

    public function setNome( $Nome )
    {
        $this->Nome = $Nome;
        return $this;
    }
      
    public function getNome()
    {
        return $this->Nome;
    }

    public function getTelefone()
    {
        return $this->Telefone;
    }
    
    public function setTelefone($Telefone)
    {
        $this->Telefone = $Telefone;
        return $this;
    }

    public function getStatus()
    {
        return $this->Status;
    }
     
    public function setStatus($Status)
    {
        return $this->Status = $Status;
    }

    public function getEmail()
    {
        return $this->Email;
    }
     
    public function setEmail($Email)
    {
        return $this->Email = $Email;
    }

    public function getProfissao() {
        return $this->Profissao;
    }
     
    public function setProfissao($Profissao) {
        $this->Profissao = $Profissao;
    }

    public function getDataCadastro() {
        return $this->DataCadastro;
    }
     
    public function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

    public function getPlano() {
        return $this->Plano;
    }
     
    public function setPlano($Plano) {
        $this->Plano = $Plano;
    }

    public function getNascimento() {
        return $this->Nascimento;
    }
     
    public function setNascimento($Nascimento) {
        $this->Nascimento = $Nascimento;
    }
}

?>