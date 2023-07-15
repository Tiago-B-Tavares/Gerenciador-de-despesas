<?php
include_once("../dao/manipuladados.php");
include_once("../model/Receita.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Obtém os valores do formulário
     $desp = new Receita();
     $desp->setId($_POST["id"]);
     $desp->setDescricao($_POST["descricao"]);
     $desp->setValor($_POST["valor"]);
     $desp->setData($_POST["data"]);
  
     $desp->setDataIns(date('Y-m-d H:i:s'));
 
     // Cria uma instância da classe de conexão
     $inserir = new manipuladados();
 
     $inserir->setTable("receitas");
     $inserir->setFields("descricao, valor, data, data_insercao, id_user");
     $inserir->setDados("'{$desp->getDescricao()}', {$desp->getValor()}, '{$desp->getData()}','{$desp->getDataIns()}', {$desp->getId()}");
     $inserir->insert();
 

    // Verifica se o cadastro foi realizado com sucesso
    if (strcmp($inserir->getStatus(), "Cadastro com Sucesso!!!")==0) {
        echo '<script>alert("Receita cadastrada com sucesso!");</script>';
        
        // Redireciona para a página do formulário novamente após alguns segundos
        echo '<script>setTimeout(function() { window.location.href = "../views/includes/dashboard.php?secao=receitasTotais"; }, 1000);</script>';
        
        exit;
    } else {
        echo "Erro ao cadastrar a receita.";
    }
}
?>
