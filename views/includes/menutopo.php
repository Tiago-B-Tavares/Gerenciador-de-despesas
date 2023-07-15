<?php
include_once("../../dao/manipuladados.php");
$busca = new manipuladados();
$recusuario = $_SESSION["usuario"];
$iduser = $busca->getIdByName($recusuario);

?>
<div class="menu-icon" onclick="openSidebar()">
  <span class="material-icons-outlined">menu</span>
</div>
<div class="header-left">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
    Nova Despesa
  </button>

  <!-- Modal de Cadastro -->
  <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCadastroLabel">Cadastro de Despesa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulário de cadastro -->
          <form action="../../controller/cadastrarDespesa.php" method="post">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" name="descricao" id="descricao"
                placeholder="Digite a descrição da despesa">
            </div>
            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="text" class="form-control" name="valor" id="valor" placeholder="Digite o valor da despesa">
            </div>
            <div class="form-group">
              <label for="dataVencimento">Data de Vencimento</label>
              <input type="date" class="form-control" name="data" id="dataVencimento">
            </div>
            <input type="hidden" name="idd"  value="<?= $iduser; ?>" >
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastroReceita">
    Nova Receita
</button>

<!-- Modal de Cadastro de Receita -->
<div class="modal fade" id="modalCadastroReceita" tabindex="-1" role="dialog" aria-labelledby="modalCadastroReceitaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroReceitaLabel">Cadastro de Receita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro -->
                <form action="../../controller/cadastrarReceita.php" method="post">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição da receita">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="Digite o valor da receita">
                    </div>
                    <div class="form-group">
                        <label for="dataRecebimento">Data de Recebimento</label>
                        <input type="date" class="form-control" name="data" id="dataRecebimento">
                    </div>
                    <input type="hidden" name="id"  value="<?= $iduser; ?>" >
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<div class="header-right">





  <span class="material-icons-outlined">notifications</span>
  <span class="material-icons-outlined">email</span>
  <span class="material-icons-outlined">account_circle</span>
</div>