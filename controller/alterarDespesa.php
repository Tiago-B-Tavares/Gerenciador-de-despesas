<?php

include_once("../dao/manipuladados.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os dados do formulário
    
    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];

    echo '<script>Alert("id nao entrou")</script>';

    $manipula = new manipuladados();
    $manipula->setTable("despesas");
    $manipula->setFieldId('id');
    $manipula->setFields("descricao='$descricao', valor='$valor', data='$data'");
    $manipula->setValueId($id);
    echo '<script>Alert("antes do update")</script>';
    $manipula->update();
    echo "<script>Alert('depois do update')</script>";
  echo '<script>setTimeout(function() { window.location.href = "../views/includes/dashboard.php?secao=despesasTotais"; }, 500);</script>';
        
    exit;
}

?>  
