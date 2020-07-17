<!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::TacFit::</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/cabecalho.css">
  </head>
<body>

<!-- Verificação de Usuário -->
<?php
    include "../core/verifica_session.php"
?>

<!-- Inclusão do cabeçalho -->
<?php
    include "cabecalho.php"
?>
	
<br/>
<div class="row">
  <div class="col-sm-3 menu">
    <?php
      include "menu.html";
    ?>
  </div>

  <div class="col-sm-9 divdireita ">
  <!-- Início da Grid Planos -->
  <div class="p-1 mb-1 bg-primary text-white"><h4 class="text-center">Tabela de Planos</h4></div>
  <!-- Tabela responsiva -->
  <div class="table-responsive">
  <table class="table table-dark">
      <form>
      <caption>Lista de planos</caption>        
          <thead>
            <tr>
              <th scope="col">Plano</th>
              <th scope="col">Valor</th>
              <th scope="col">....<img src="../img/pasta_dados.png" width="35px" height="35px">....</th>
              <th scope="col">....<img src="../img/ficha3.png" width="35px" height="35px">....</th>
              <th scope="col">....<img src="../img/trash.png" width="35px" height="35px">....</th>
            </tr>
          </thead>
          <tbody>
          <?php  
            include '../core/Database.php';
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM plano_tbl ORDER BY plano ASC";

            foreach ($pdo->query($sql) as $row){
              echo '<tr>';
              echo '<td>'. $row['plano'] . '</td>';
              echo '<td>'. $row['valor'] . '</td>';
          ?>
              <td>
                <!--Carregar os dados completos de cada plano-->
                <?php        
                echo '<a class="btn btn-secondary" href="dadosPlanos.php?planoData=' . $row['id'] . '">Dados</a>';
                ?>
              </td>
              <td>
                <!--Botão que chama o formulario de alteração dos dados do plano-->
                <?php
                echo '<a class="btn btn-secondary" href="frmCadPlanos.php?planoData=' . $row['id'] . '&op=alterar">Alterar</a>';
                ?>
              </td>
              <td>
                <!--Botão que chama a função de exclusão dos registros do plano-->
                <form name="frmApagar" action="../classes/operacoesPlanos.php" method="post">
                    <input type="hidden" name="acao" value="apagar">
                    <input type="hidden" <?php echo 'value="'.$row["id"].'"'; ?>  name="idUser">
                    <input class="btn btn-danger" type="submit" value="Apagar">
                </form>
              </td>
          <tr>
          <?php  }
              Database::disconnect();
          ?>

          </tbody>
      </table>
      </div> <!-- Fim da Grid Planos -->
    <div class="col text-center">
    <a class="btn btn-secondary" href="frmCadPlanos.php?op=cadastrar">Voltar</a>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>
  <script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>

