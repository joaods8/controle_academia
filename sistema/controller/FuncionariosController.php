<?php 

class FuncionariosController {
    private $ID;
	private $TELEFONE;
	private $STATUS;
	private $NOME;
    private $TIPO;
    private $EMAIL;
    private $SENHA;
    private $DATACONTRATACAO;
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

    public function setNome( $Nome )
    {
        $this->Nome = $Nome;
        return $this;
    }
      
    public function getNome()
    {
        return $this->Nome;
    }

    public function getDataDesligamento()
    {
        return $this->DataDesligamento;
    }
    
    public function setDataDesligamento($DataDesligamento)
    {
        $this->DataDesligamento = $DataDesligamento;
        return $this;
    }

    public function getDataContratacao()
    {
        return $this->DataContratacao;
    }
    
    public function setDataContratacao($DataContratacao)
    {
        $this->DataContratacao = $DataContratacao;
        return $this;
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

    public function getTipo()
    {
        return $this->Tipo;
    }
     
    public function setTipo($Tipo)
    {
        return $this->Tipo = $Tipo;
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

    public function getSenha()
    {
        return $this->Senha;
    }
     
    public function setSenha($Senha)
    {
        return $this->Senha = $Senha;
    }
}

?>