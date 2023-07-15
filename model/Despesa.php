<?php

class Despesa {
    private $id;
    private  $descricao ;
    private $valor;
    private $data;
    private $categoria ;
    private $dataIns;
    private $dataAlt;

    public function setId($id)
    {
        $this->id=$id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setDescricao($desc)
    {
        $this->descricao=$desc;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setValor($v)
    {
        $this->valor=$v;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setData($data)
    {
        $this->data=$data;
    }
    public function getData()
    {
        return $this->data;
    }
    
    public function setDataIns($data)
    {
        $this->dataIns=$data;
    }
    public function getDataIns()
    {
        return $this->dataIns;
    }
    public function setDataAlt($data)
    {
        $this->dataAlt=$data;
    }
    public function getDataAlt()
    {
        return $this->dataAlt;
    }

}
?>