<?php
include_once("../../model/Despesa.php");
include_once("../../dao/manipuladados.php");

$busca = new manipuladados();
$recusuario = $_SESSION["usuario"];
$iduser = $busca->getIdByName($recusuario);

$busca->setTable("receitas");
$receitas = $busca->getAllDataTableByUser($iduser);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/stylle.css'>

<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
<link rel='stylesheet' type='text/css' href='../css/app.css'>
<script src='../js/bootstrap.bundle.js'></script>
<script src='../../js/app.js'></script>
    </head>
    <body>
        <h1 class="fs-5"> Receitas</h1>
    <section >
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data de vencimento</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($receitas)) {
                echo "<tr><td colspan='4'>Não há despesas registradas.</td></tr>";
            } else {
                foreach ($receitas as $receitas) {
                    ?>
                    <tr class="table">
                        <td>
                            <?= $receitas['id']; ?>
                        </td>
                        <td>
                            <?= $receitas['descricao']; ?>
                        </td>
                        <td>
                            <?= $receitas['valor']; ?>
                        </td>
                        <td>
                            <?= date('d/m/Y', strtotime($receitas['data'])); ?>
                        </td>
                       
                        <td>
                            <!-- Botão para abrir o modal de Alterar -->
                            <button type="button" class="btn btn-primary"
                                onclick="passaModalAlterar(<?= $receitas['id']; ?>, '<?= $receitas['descricao']; ?>', '<?= $receitas['valor']; ?>', '<?= $receitas['data']; ?>')"
                                data-toggle="modal" data-target="#modalEdicao">
                                Editar
                            </button>

                            <!-- Modal de Alterar -->
                            <div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog"
                                aria-labelledby="modalEdicaoLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEdicaoLabel">Edição de Receitas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulário de edição -->
                                            <form action="../../controller/alterarReceita.php" method="post">
                                                <div class="form-group">
                                                    <label for="descricaoEdicao">Descrição</label>
                                                 
                                                   <input type="hidden" id="idEdicao" name="id"> 
                                                  
                                                    <input type="text" class="form-control" name="descricao"
                                                        id="descricaoEdicao" placeholder="Digite a descrição da despesa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="valorEdicao">Valor</label>
                                                    <input type="text" class="form-control" name="valor" id="valorEdicao"
                                                        placeholder="Digite o valor da despesa">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dataEdicao">Data de Vencimento</label>
                                                    <input type="date" class="form-control" name="data" id="dataEdicao">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão para abrir o modal de Remover -->
                            <button type="button" class="btn btn-danger"
                                onclick="passaModalRemover('<?= $receitas['id']; ?>', '<?= $receitas['descricao']; ?>')"
                                data-toggle="modal" data-target="#modalRemover">
                                Remover
                            </button>

                            <!-- Modal de Remover -->
                            <div class="modal fade" id="modalRemover" tabindex="-1" role="dialog"
                                aria-labelledby="modalRemoverLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalRemoverLabel">Remover Receita</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja realmente remover a Receita?</p>
                                            <h4 id="descricaoRemover"></h4>
                                            <form action="../../controller/removerReceita.php" method="post">
                                                <input type="hidden" name="id" id="idRemover">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Remover</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>

                        <?php
                }
            }

            ?>
        </tbody>
    </table>
</section>
    </body>
    </html>
    