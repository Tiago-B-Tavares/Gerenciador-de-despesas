<?php
include_once("conexao.php");

class Manipuladados extends conexao
{

    protected $table, $fields, $dados, $status, $fieldId, $valueId, $url;

    public function setTable($tabela)
    {
        $this->table = $tabela;
    }
    public function setFields($campos)
    {
        $this->fields = $campos;
    }
    public function setDados($valores)
    {
        $this->dados = $valores;
    }
    public function setFieldId($chavep)
    {
        $this->fieldId = $chavep;
    }
    public function setValueId($valorchave)
    {
        $this->valueId = $valorchave;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function insert()
    {
        $this->sql = "INSERT INTO $this->table($this->fields) VALUES ($this->dados)";
        if (self::execSQL($this->sql)) {
            $this->status = "Cadastro com Sucesso!!!";
        } else {
            $this->status = "Erro ao cadastrar" . mysqli_connect_error();
        }
    }

    public function update()
    {



        $this->sql = "UPDATE $this->table SET $this->fields WHERE $this->fieldId = '$this->valueId'";
        echo "<script>Alert('no antes update')</script>";


        if (self::execSQL($this->sql)) {
            echo "<script>Alert('no update')</script>";
            $this->status = "Alterado com sucesso!";
        } else {
            $this->status = "Erro ao alterar na tabela " . $this->table . +" " . mysqli_connect_error();
        }
    }




    public function delete()
    {
        $this->sql = "DELETE FROM $this->table WHERE $this->fieldId = '$this->valueId'";


        if (self::execSQL($this->sql)) {

            echo '<script>alert("Deletado com sucesso!");</script>';

        } else {

            $this->status = "Erro ao deletar na tabela " . $this->table . +" " . mysqli_connect_error();
        }
    }



    public function getAllDataTableByUser($id)
    {
        $this->sql = "SELECT * FROM $this->table WHERE id_user=" . $id;
        $this->qr = self::execSQL($this->sql);

        $listaresp = array();

        while ($row = self::listQr($this->qr)) {
            array_push($listaresp, $row);
        }

        return $listaresp;

    }

    public function BuscaDataDespesa($mes, $ano)
    {
        $this->sql = "SELECT {$this->fields} FROM {$this->table} WHERE MONTH(data) = {$mes} AND YEAR(data) = {$ano}";
        $this->qr = self::execSQL($this->sql);

        $listaresp = array();

        while ($row = self::listQr($this->qr)) {
            array_push($listaresp, $row);
        }

        return $listaresp;
    }
    public function somaValores($tabela, $id)
    {
        $sql = "SELECT SUM(valor) AS soma FROM $tabela WHERE  id_user =" . $id;
        $resultado = $this->execSQL($sql);

        if ($resultado) {
            $soma = $resultado->fetch_assoc()['soma'];
            return $soma;
        } else {
            return 0;
        }
    }



    public function getLastId()
    {
        $this->sql = "SELECT $this->fieldId FROM $this->table ORDER BY $this->fieldId LIMIT 1";
        $this->qr = self::execSQL($this->sql);
        $this->data = self::listQr($this->qr);
        return $this->data["$this->fieldId"];
    }

    public function getDadosDuplicados($valorPesquisado)
    {
        $this->sql = "SELECT $this->fieldId FROM $this->table WHERE $this->fieldId = '$valorPesquisado'";
        $this->qr = self::execSQL($this->sql);
        return self::countData($this->qr);
    }

    public function getTotalData()
    {
        $this->sql = "SELECT $this->fieldId FROM $this->table ORDER BY $this->fieldId";
        $this->qr = self::execSQL($this->sql);
        return self::countData($this->qr);
    }

    public function validarLogin($login, $senha)
    {
        $this->sql = "SELECT * FROM $this->table WHERE email='$login' and senha='$senha'";
        $this->qr = self::execSQL($this->sql);
        $linhas = @mysqli_num_rows($this->qr);
        return $linhas;
    }
    public function getIdByName($nome)
    {
        $this->sql = "SELECT id_user  FROM usuarios WHERE usuario='$nome'";
        $this->qr = self::execSQL($this->sql);
        $this->data = self::listQr($this->qr);
        return $this->data["id_user"];
    }

    function converte($Strings)
    {
        return iconv("UTF-8", "ISO8859-1", $Strings);
    }

}






?>