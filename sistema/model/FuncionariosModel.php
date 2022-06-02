<?php 
$PATH = "/home/u315715135/domains/acadetech.com.br/public_html/";
require_once $PATH.'controller/FuncionariosController.php';
require_once $PATH.'database/connect.php';

class FuncionariosModel extends Connect{
	
	public function loginAdm(FuncionariosController $funcionarios) {
		// logica para salvar dado no banco
        $st_query = "SELECT count(*) AS total, us.*
                     FROM funcionarios us
                     WHERE status = 2 
                     AND email ='".$funcionarios->getEmail()."'
                     AND senha ='".$funcionarios->getSenha()."'
                     LIMIT 1";
        try
        {
        	$o_data = $this->o_db->query($st_query);
            $o_ret = $o_data->fetchObject();

            if($o_ret->total >0)
            {
                $funcionarios = new FuncionariosController();
                $funcionarios->setId($o_ret->id);
                $funcionarios->setNome($o_ret->nome);    
                $funcionarios->setTipo($o_ret->tipo);    
                return $funcionarios;
            }
            else
            {
                return false;
            }
            
        }
        catch (PDOException $e)
        {
            throw $e;
        }
	}

    public function save(FuncionariosController $funcionarios) {
        // logica para salvar dado no banco
        $st_query = "SELECT count(*) as total from funcionarios where email = '".$funcionarios->getEmail()."'";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $total = $o_ret->total;
        if($total > 0)
        {
            return false;
        }
        else
        {
            $st_query = "INSERT INTO funcionarios
                        (
                            nome,
                            email,
                            senha,
                            status,
                            tipo,
                            telefone,
                            data_contratacao
                        )
                        VALUES
                        (
                            '".$funcionarios->getNome()."',
                            '".$funcionarios->getEmail()."',
                            '".$funcionarios->getSenha()."',
                            '".$funcionarios->getStatus()."',
                            '".$funcionarios->getTipo()."',
                            '".$funcionarios->getTelefone()."',
                            '".$funcionarios->getDataContratacao()."'
                        );";
            try
            {
                if($this->o_db->exec($st_query) > 0)
                    return $this->o_db->lastInsertId();
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }
        return false; 
    }
     
    public function update(FuncionariosController $funcionarios) {
        // logica para atualizar dado no banco
        if($funcionarios->getSenha())
        {
            $st_query = "UPDATE
                            funcionarios
                        SET
                            nome = '".$funcionarios->getNome()."',
                            email = '".$funcionarios->getEmail()."',
                            senha = '".$funcionarios->getSenha()."',
                            status = '".$funcionarios->getStatus()."',
                            tipo = '".$funcionarios->getTipo()."'.
                            telefone = '".$funcionarios->getTelefone()."',
                            data_contratacao = '".$funcionarios->getDataContratacao()."',
                            data_desligamento = '".$funcionarios->getDataDesligamento()."'
                        WHERE
                            id =".$funcionarios->getID();
        }
        else
        {
            $st_query = "UPDATE
                            funcionarios
                        SET
                            nome = '".$funcionarios->getNome()."',
                            email = '".$funcionarios->getEmail()."',
                            status = '".$funcionarios->getStatus()."',
                            tipo = '".$funcionarios->getTipo()."',
                            telefone = '".$funcionarios->getTelefone()."',
                            data_contratacao = '".$funcionarios->getDataContratacao()."',
                            data_desligamento = '".$funcionarios->getDataDesligamento()."'
                        WHERE
                            id =".$funcionarios->getID();
        }
        try
        {
            $this->o_db->exec($st_query);
            return true;
        }
        catch (PDOException $e)
        {
            throw $e;
            return false;
        }
    }

    public function remove($cod) {
        // logica para remover dado do banco
        $st_query = "DELETE FROM funcionarios WHERE id = $cod";
        if($this->o_db->exec($st_query) > 0)
            return true;
        else
            return false;
    }
     
    public function listAll($inicio, $limite, $filtro) {
        // logica para listar toodos os dados do banco
        if($filtro)
        {
            $st_query = "SELECT * FROM funcionarios WHERE nome LIKE '%$filtro%' OR email LIKE '%$filtro%'";
        }
        else
        {
            $st_query = "SELECT * FROM funcionarios LIMIT $inicio, $limite";
        }
         $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new FuncionariosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                $dado->setTipo($o_ret->tipo);
                array_push($dados, $dado);
            }
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    }


    public function contador($filtro) {
        // logica para listar toodos os dados do banco
        if($filtro)
        {
            $st_query = "SELECT COUNT(*)AS total FROM funcionarios WHERE nome LIKE '%$filtro%' OR nome LIKE '%$filtro%'";
        }
        else
        {
            $st_query = "SELECT COUNT(*)AS total FROM funcionarios";
        }
        try
        {
            $o_data = $this->o_db->query($st_query);
            $o_ret = $o_data->fetchObject();
            $total = $o_ret->total;
            return $total;
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    }

    public function listaTodosSemLimite() {
        // logica para listar toodos os dados do banco
        $st_query = "SELECT * FROM funcionarios ORDER BY nome";
        $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new FuncionariosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                array_push($dados, $dado);
            }
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    } 

    public function listByTipoUser($tipo) {
        // logica para listar toodos os dados do banco
        $st_query = "SELECT * FROM funcionarios WHERE status = 2 AND tipo = '".$tipo."' ORDER BY nome";
        $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new FuncionariosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                array_push($dados, $dado);
            }
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    } 

    public function listById($cod)
    {
        $funcionarios = new FuncionariosController();
        $st_query = "SELECT * FROM funcionarios WHERE id = $cod";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $funcionarios->setId($o_ret->id);
        $funcionarios->setNome($o_ret->nome);    
        $funcionarios->setEmail($o_ret->email);    
        $funcionarios->setStatus($o_ret->status);    
        $funcionarios->setTipo($o_ret->tipo);  
        $funcionarios->setTelefone($o_ret->telefone);    
        $funcionarios->setDataContratacao($o_ret->data_contratacao);
        $funcionarios->setDataDesligamento($o_ret->data_desligamento);           
        return $funcionarios;
    }
}
?>