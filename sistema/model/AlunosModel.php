<?php 
$PATH = "/home/u315715135/domains/acadetech.com.br/public_html/";
require_once $PATH.'controller/AlunosController.php';
require_once $PATH.'database/connect.php';

class AlunosModel extends Connect{
	
    public function save(AlunosController $alunos) {
        // logica para salvar dado no banco
        $st_query = "SELECT count(*) as total from alunos where email = '".$alunos->getEmail()."'";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $total = $o_ret->total;
        if($total > 0)
        {
            return false;
        }
        else
        {
            $st_query = "INSERT INTO alunos
                        (
                            nome,
                            email,
                            profissao,
                            status,
                            nascimento,
                            telefone,
                            plano,
                            data_cadastro
                        )
                        VALUES
                        (
                            '".$alunos->getNome()."',
                            '".$alunos->getEmail()."',
                            '".$alunos->getProfissao()."',
                            '".$alunos->getStatus()."',
                            '".$alunos->getNascimento()."',
                            '".$alunos->getTelefone()."',
                            '".$alunos->getPlano()."',
                            '".$alunos->getDataCadastro()."'
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
     
    public function update(AlunosController $alunos) 
    {
        $st_query = "UPDATE
                        alunos
                    SET
                        nome = '".$alunos->getNome()."',
                        email = '".$alunos->getEmail()."',
                        status = '".$alunos->getStatus()."',
                        profissao = '".$alunos->getProfissao()."',
                        telefone = '".$alunos->getTelefone()."',
                        nascimento = '".$alunos->getNascimento()."',
                        plano = '".$alunos->getPlano()."'
                    WHERE
                        id =".$alunos->getID();
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

    public function inativaAluno(AlunosController $alunos) 
    {
        $st_query = "UPDATE
                        alunos
                    SET
                        status = '".$alunos->getStatus()."'
                    WHERE
                        id =".$alunos->getID();
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
        $st_query = "DELETE FROM alunos WHERE id = $cod";
        if($this->o_db->exec($st_query) > 0)
            return true;
        else
            return false;
    }
     
    public function listAll($inicio, $limite, $filtro) {
        // logica para listar toodos os dados do banco
        if($filtro)
        {
            $st_query = "SELECT * FROM alunos WHERE nome LIKE '%$filtro%' OR email LIKE '%$filtro%'";
        }
        else
        {
            $st_query = "SELECT * FROM alunos LIMIT $inicio, $limite";
        }
         $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new AlunosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                $dado->setEmail($o_ret->email);
                $dado->setTelefone($o_ret->telefone);
                $dado->setStatus($o_ret->status);
                array_push($dados, $dado);
            }
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    }

    public function listAllDesativados() 
    {
        $st_query = "SELECT * FROM alunos WHERE status = 1";
     
        $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new AlunosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                $dado->setEmail($o_ret->email);
                $dado->setTelefone($o_ret->telefone);
                $dado->setStatus($o_ret->status);
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
            $st_query = "SELECT COUNT(*)AS total FROM alunos WHERE nome LIKE '%$filtro%' OR nome LIKE '%$filtro%'";
        }
        else
        {
            $st_query = "SELECT COUNT(*)AS total FROM alunos";
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

    public function contadorByStatus($filtro) {
        
        $st_query = "SELECT COUNT(*)AS total FROM alunos where status = $filtro";
        
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
        $st_query = "SELECT * FROM alunos where status = 2";
        $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new AlunosController();
                $dado->setId($o_ret->id);
                $dado->setNome($o_ret->nome);
                $dado->setEmail($o_ret->email);
                $dado->setTelefone($o_ret->telefone);
                $dado->setStatus($o_ret->status);
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
        $alunos = new AlunosController();
        $st_query = "SELECT * FROM alunos WHERE id = $cod";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $alunos->setId($o_ret->id);
        $alunos->setNome($o_ret->nome);    
        $alunos->setEmail($o_ret->email);    
        $alunos->setStatus($o_ret->status);    
        $alunos->setProfissao($o_ret->profissao);  
        $alunos->setTelefone($o_ret->telefone);    
        $alunos->setNascimento($o_ret->nascimento);
        $alunos->setTelefone($o_ret->telefone);
        $alunos->setPlano($o_ret->plano);
        $alunos->setDataCadastro($o_ret->data_cadastro);           
        return $alunos;
    }
}
?>