<?php

include_once("../dao/manipuladados.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os dados do formulário
    $id = $_POST["id"];
    
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];

    $manipula = new manipuladados();
    $manipula->setTable("receitas");
    $manipula->setFieldId('id');
    $manipula->setFields("descricao='$descricao', valor='$valor', data='$data'");
    $manipula->setValueId($id);
   // echo ($id);
    $manipula->update();
    
  echo '<script>setTimeout(function() { window.location.href = "../views/includes/dashboard.php?secao=receitasTotais"; }, 500);</script>';
        
    exit;
}
?>
