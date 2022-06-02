<?php 
$PATH = "/home/u315715135/domains/acadetech.com.br/public_html/";
require_once $PATH.'controller/AlunosDataController.php';
require_once $PATH.'database/connect.php';

class AlunosDataModel extends Connect{
	
    public function save(AlunosDataController $alunos_datas) 
    {
        $st_query = "INSERT INTO alunos_datas
                    (
                        id_aluno,
                        data_inicio,
                        data_desligamento
                    )
                    VALUES
                    (
                        '".$alunos_datas->getIdAluno()."',
                        '".$alunos_datas->getDataInicio()."',
                        '".$alunos_datas->getDataDesligamento()."'
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
     
    public function update(AlunosDataController $alunos_datas) 
    {
        $st_query = "UPDATE
                        alunos_datas
                    SET
                        data_desligamento = '".$alunos_datas->getDataDesligamento()."',
                        data_inicio = '".$alunos_datas->getDataInicio()."'
                    WHERE
                        id = '".$alunos_datas->getID()."'
                    AND id_aluno = ".$alunos_datas->getIdAluno();
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
     
    public function listAll($aluno) {
        // logica para listar toodos os dados do banco
        
        $st_query = "SELECT * FROM alunos_datas Where id_aluno = $aluno";
        
        $dados = array();
        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new AlunosDataController();
                $dado->setId($o_ret->id);
                $dado->setIdAluno($o_ret->id_aluno);
                $dado->setDataInicio($o_ret->data_inicio);
                $dado->setDataDesligamento($o_ret->data_desligamento);
                array_push($dados, $dado);
            }
        }
        catch(PDOException $e)
        {
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }             
        return $dados;
    }

    public function listLastByAluno($aluno)
    {
        $alunos_datas = new AlunosDataController();
        $st_query = "SELECT * FROM alunos_datas WHERE id_aluno = $aluno ORDER BY id DESC";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $alunos_datas->setId($o_ret->id);
        $alunos_datas->setIdAluno($o_ret->id_aluno);    
        $alunos_datas->setDataInicio($o_ret->data_inicio);    
        $alunos_datas->setDataDesligamento($o_ret->data_desligamento);    
        return $alunos_datas;
    }

    public function listById($cod)
    {
        $alunos_datas = new AlunosDataController();
        $st_query = "SELECT * FROM alunos_datas WHERE id = $cod";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $alunos_datas->setId($o_ret->id);
        $alunos_datas->setIdAluno($o_ret->id_aluno);    
        $alunos_datas->setDataInicio($o_ret->data_inicio);    
        $alunos_datas->setDataDesligamento($o_ret->data_desligamento);    
        return $alunos_datas;
    }
}
?>