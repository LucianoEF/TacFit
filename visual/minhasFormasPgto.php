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
  

    <div class="col-sm-9 divdireita">

        <!-- Início da Grid Formas de Pagamento -->
        <div class="p-1 mb-1 bg-primary text-white"><h4 class="text-center">Formas de Pagamento</h4></div>
        <div class="table-responsive">
        <table class="table table-dark">
        <form>
            <caption>Lista de Formas de Pagamento</caption>        
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Formas de Pagamento</th>
                    <th scope="col">Observação</th>
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
                $sql = "SELECT id, formaspgto, observacao FROM formaspgto_tbl ORDER BY formaspgto ASC";

                foreach ($pdo->query($sql) as $row){
                    echo '<tr>';
                    echo '<td>'. $row['id'] . '</td>';
                    echo '<td>'. $row['formaspgto'] . '</td>';
                    echo '<td>'. $row['observacao'] . '</td>';

            ?>
                <td>
                    <!--Carregar os dados completos de cada Formas de Pagamento-->
                    <?php        
                    echo '<a class="btn btn-secondary" href="dadosFormasPgto.php?formaspgtoData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados das Formas de Pagamento-->
                    <?php
                    echo '<a class="btn btn-secondary" href="frmFormasPgto.php?formaspgtoData=' . $row['id'] . '&op=alterar">Alterar</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama a função de exclusão dos registros da formas de Pagamento-->
                    <form name="frmApagar" action="../classes/operacoesFormasPgto.php" method="post">
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
        </div> <!-- Fim da Grid Formas de Pagamento -->
    
    <center>
      <div clas="col">
        <a class="btn btn-secondary" href="frmFormasPgto.php?op=cadastrar">Voltar</a>
      </div>
    </center>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>
  <script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>

