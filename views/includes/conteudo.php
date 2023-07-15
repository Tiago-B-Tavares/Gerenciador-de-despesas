<!-- CARD  -->
<?php
include_once("../../dao/manipuladados.php");
$recusuario = $_SESSION["usuario"];
$manipula = new manipuladados();
$iduser = $manipula->getIdByName($recusuario);
$somaDespesas = $manipula->somaValores('despesas', $iduser);
$somaReceita = $manipula->somaValores('receitas', $iduser);
$total = $somaReceita - $somaDespesas;


?>
<div class="main-title">
    <p class="font-weight-bold">DASHBOARD</p>
</div>

<div class="main-cards">

    <div class="card">
        <div class="card-inner">
            <p class="text-primary">Entradas:</p>
            <span class="material-icons-outlined text-blue">inventory_2</span>
        </div>
        <span class="text-primary font-weight-bold">+ R$<?php echo $somaReceita; ?></span>
    </div>

    <div class="card">
        <div class="card-inner">
            <p class="text-primary">Saídas:</p>
            <span class="material-icons-outlined text-orange">add_shopping_cart</span>
        </div>
        <span class="text-primary font-weight-bold">- R$ <?php echo $somaDespesas; ?></span>
    </div>


    <div class="card">
        <div class="card-inner">
            <p class="text-primary">Total:</p>
            <span class="material-icons-outlined text-red">notification_important</span>
        </div>
        
            <?php 
        if ($total>0) {
           echo '<span class = "text-success font-weight-bold">R$' . $total .'</span>';
        } else {
            echo ' <span class = "text-danger font-weight-bold">R$ '. $total .' </span>';
        }
        
         ?></span>
    </div>

</div>
