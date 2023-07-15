<?php
include_once("../dao/manipuladados.php");
$id = $_POST["id"];
$manipula = new manipuladados();
$manipula->setTable("despesas");
$manipula->setFieldId('id');
$manipula->setValueId($id);
$manipula->delete();

echo '<script>setTimeout(function() { window.location.href = "../views/includes/dashboard.php?secao=despesasTotais"; }, 500);</script>';
        
    exit;
?>
