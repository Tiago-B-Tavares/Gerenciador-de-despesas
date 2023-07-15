<?php
include_once("../dao/manipuladados.php");
$id = $_POST["id"];
$manipula = new manipuladados();
$manipula->setTable("receitas");
$manipula->setFieldId('id');
$manipula->setValueId($id);
$manipula->delete();

echo '<script>setTimeout(function() { window.location.href = "../views/includes/dashboard.php?secao=receitasTotais"; }, 500);</script>';
        
    exit;
?>
