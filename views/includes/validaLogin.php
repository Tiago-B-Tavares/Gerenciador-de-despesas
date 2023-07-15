<?php
include_once("../../dao/manipuladados.php");
session_start();

$manipula = new manipuladados();
$usuario = $_POST['usuario'];

$login = $_POST['email'];
$password = $_POST['senha'];

$manipula -> setTable('usuarios');

$linhas = $manipula->validarLogin($login,$password);


if($linhas == 0){
    echo '<script>alert("Usuário ou Senha do Adm não cadastrado ou incorreto(s) ");</script>';	
    header("location: ../../index.php");
}else{
    $_SESSION["usuario"]= $usuario;


    setcookie("nome_usuario",$login);
    setcookie("senha_usuario",$password);
    header("location: ../includes/dashboard.php");
    
}
?>  