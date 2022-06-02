<?php 
$PATH = "/home/u315715135/domains/acadetech.com.br/public_html/";
require_once $PATH.'controller/PagamentosController.php';
require_once $PATH.'database/connect.php';

class PagamentosModel extends Connect{
	
    public function save(PagamentosController $pagamentos) 
    {
        $st_query = "INSERT INTO pagamentos
                    (
                        id_aluno,
                        data_vencimento,
                        data_pagamento,
                        valor,
                        status
                    )
                    VALUES
                    (
                        '".$pagamentos->getIdAluno()."',
                        '".$pagamentos->getDataVencimento()."',
                        '".$pagamentos->getDataPagamento()."',
                        '".$pagamentos->getValor()."',
                        '".$pagamentos->getStatus()."'
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
     
    public function update(PagamentosController $pagamentos) 
    {
        $st_query = "UPDATE
                        pagamentos
                    SET
                        data_vencimento = '".$pagamentos->getDataVencimento()."',
                        status = '".$pagamentos->getStatus()."',
                        valor = '".$pagamentos->getValor()."',
                        data_pagamento = '".$pagamentos->getDataPagamento()."'
                    WHERE
                        id =".$pagamentos->getID();
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
        $st_query = "DELETE FROM pagamentos WHERE id = $cod";
        if($this->o_db->exec($st_query) > 0)
            return true;
        else
            return false;
    }
     
    public function listAllByAluno($aluno) {
        // logica para listar toodos os dados do banco

        $st_query = "SELECT * FROM pagamentos where id_aluno = $aluno";
        
        $dados = array();

        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new PagamentosController();
                $dado->setId($o_ret->id);
                $dado->setIdAluno($o_ret->id_aluno);
                $dado->setDataPagamento($o_ret->data_pagamento);
                $dado->setDataVencimento($o_ret->data_vencimento);
                $dado->setValor($o_ret->valor);
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

    public function contadorByStatus($filtro) {
        
        $st_query = "SELECT COUNT(*)AS total FROM pagamentos where status = $filtro";
        
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

    public function contadorByAluno($aluno) {
        
        $st_query = "SELECT COUNT(*)AS total FROM pagamentos where id_aluno = $aluno";
        
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

    public function listAllAbertos() {
        // logica para listar toodos os dados do banco

        $st_query = "SELECT * FROM pagamentos where status = 1";
        
        $dados = array();

        try
        {
            $o_data = $this->o_db->query($st_query);
            while($o_ret = $o_data->fetchObject())
            {
                $dado = new PagamentosController();
                $dado->setId($o_ret->id);
                $dado->setIdAluno($o_ret->id_aluno);
                $dado->setDataPagamento($o_ret->data_pagamento);
                $dado->setDataVencimento($o_ret->data_vencimento);
                $dado->setValor($o_ret->valor);
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
        $dado = new PagamentosController();
        $st_query = "SELECT * FROM pagamentos WHERE id = $cod";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $dado->setId($o_ret->id);
        $dado->setIdAluno($o_ret->id_aluno);
        $dado->setDataPagamento($o_ret->data_pagamento);
        $dado->setDataVencimento($o_ret->data_vencimento);
        $dado->setValor($o_ret->valor);
        $dado->setStatus($o_ret->status);        
        return $dado;
    }

    public function listLastByAluno($aluno)
    {
        $dado = new PagamentosController();
        $st_query = "SELECT * FROM pagamentos WHERE id_aluno = $aluno ORDER BY id DESC LIMIT 1";
        $o_data = $this->o_db->query($st_query);
        $o_ret = $o_data->fetchObject();
        $dado->setId($o_ret->id);
        $dado->setIdAluno($o_ret->id_aluno);
        $dado->setDataPagamento($o_ret->data_pagamento);
        $dado->setDataVencimento($o_ret->data_vencimento);
        $dado->setValor($o_ret->valor);
        $dado->setStatus($o_ret->status);        
        return $dado;
    }
}
?>