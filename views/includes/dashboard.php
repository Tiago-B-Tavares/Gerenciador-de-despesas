<?php
include_once("../../controller/verurl.php");
include_once("validarCookie.php");
include_once("../../controller/mensagensUser.php");
session_start();

$recusuario = $_SESSION["usuario"];
$mensagensUser = new MensagensUser();
$msg = $mensagensUser -> msgUser();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel</title>

  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- ICONS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

  <!-- Boxicons CSS -->
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- CSS -->
  <link rel='stylesheet' type='text/css' media='screen' href='../../css/stylle.css'>

  <link rel='stylesheet' type='text/css' href='../../css/bootstrap.css'>
  <link rel='stylesheet' type='text/css' href='../../css/app.css'>
  <script src='../../js/bootstrap.bundle.js'></script>
  <script src='../js/app.js'></script>
</head>

<body>

  <div class="grid-container">
    <header class="header">
      <?php include("../../views/includes/menutopo.php"); ?>
    </header>
    <aside id="sidebar">
      <?php include("../../views/includes/menuprincipal.php"); ?>
    </aside>
    <main class="main-container">
    <h1><?=  $msg . $recusuario; ?></h1>
      <?php include("../../views/includes/conteudo.php"); ?>
      <section class="content">
        <?php
        $red = new verurl();
        $red->trocaUrl(@$_GET['secao']);
        ?>
      </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.js"></script>
    <script src='js/script.js'></script>
  </div>


</body>

</html>