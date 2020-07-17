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
  <!-- Início da div menu - lado esquerdo da pagina -->
  <div class="col-sm-3 menu">
    <?php
      include "menu.html";
    ?>
  </div> <!-- Fim da div menu - lado esquerdo da pagina -->

  <?php
  include '../core/Database.php';
  //Variáveis de datas atuais
  $diaatual = date("Y-m-d");
  $diamesatual = date("m-d");
  $diadasemana = date("l");

 /*  echo "$diaatual";
  echo "<br/>";
  echo "$diamesatual"; */

  ?>

  <!-- Início da divdireita - lado direito da pagina -->
  <div class="col-sm-9 divdireita">

    <!-- Inicio da div container -->
    <div class="container">

      <!-- Início da div row -->
      <div class="row">

        <!-- Início da Coluna dos Treinos de Hoje -->
        <div class="col">

          <!-- Título da Tabela -->
          <div class="p-1 mb-1 bg-warning text-white"><h4 class="text-center">Alunos - Treinos de Hoje</h4></div>

            <!-- Início da div tabela responsiva -->
            <div class="table-responsive">

              <!-- Início da Tabela -->
              <table class="table table-dark">
              <form>
                    <caption>Treinos de hoje</caption>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Horário do Treino</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Busca todas as informações da tabela ficha_tbl
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                        $sql = "SELECT * FROM ficha_tbl WHERE diadasemana LIKE '$diadasemana' ORDER BY nome ASC";
                        
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>
                                <td>'. $row['nome'] . '</td>

                                <td>'. $row['horario'] . '</td>
                            </tr>';

                        }
                        Database::disconnect();          
                    ?>
              </form>
              </table> <!-- Fim da Tabela -->

            </div> <!-- Fim da div tabela responsiva -->

        </div> <!-- Fim da Coluna dos Treinos de hoje -->

        <!-- Início da Coluna 2 do lado direito da pagina -->
        <div class="col">
          
          <!-- Título da Tabela -->
          <div class="p-1 mb-1 bg-primary text-white"><h4 class="text-center">Quadro de Aniversariantes</h4></div>

            <!-- Início da div tabela responsiva -->
            <div class="table-responsive">

              <!-- Início da Tabela -->
              <table class="table table-dark">
              <form>
                    <caption>Lista de Aniversariantes</caption>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Busca todas as informações da tabela alunos_tbl
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                        $sql = "SELECT nome, dtnasc FROM alunos_tbl WHERE MONTH(dtnasc) = MONTH(NOW()) AND DAY(dtnasc) = DAY(NOW()) ORDER BY nome ASC";
                        
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>
                                <td>'. $row['nome'] . '</td>

                                <td>'. $row['dtnasc'] . '</td>
                            </tr>';

                        }
                        Database::disconnect();               
                    ?>
              </form>
              </table> <!-- Fim da Tabela -->

            </div> <!-- Fim da div tabela responsiva -->

        </div> <!-- Fim da Coluna 2 do lado direito da pagina -->

      </div> <!-- Fim da div row -->
      
      <!-- Espaço entre primeira e segunda linha de tabelas -->
      <br/>
      <br/>

      <div class="row">

        <!-- Inicio da Coluna de Contas a Pagar -->
        <div class="col">

        <!-- Título da Tabela -->
        <div class="p-1 mb-1 bg-danger text-white"><h4 class="text-center">Contas a Pagar - Hoje</h4></div>

          <!-- Início da div tabela responsiva -->
          <div class="table-responsive">

            <!-- Início da Tabela -->
            <table class="table table-dark">
            <form>
                  <caption>Contas a pagar de hoje</caption>
                  <thead>
                      <tr>
                          <th scope="col">Descrição</th>
                          <th scope="col">Status</th>
                          <th scope="col">Valor</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                      //Busca todas as informações da tabela despesas_tbl
                      $pdo = Database::connect();
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                      $sql = "SELECT * FROM despesas_tbl WHERE datavenc LIKE '$diaatual' ORDER BY descricao ASC";
                      
                      foreach ($pdo->query($sql) as $row) {
                          echo '<tr>
                              <td>'. $row['descricao'] . '</td>

                              <td>'. $row['statuss'] . '</td>
                              
                              <td>'. $row['valor'] . '</td>
                          </tr>';

                      }
                      Database::disconnect();          
                  ?>
            </form>
            </table> <!-- Fim da Tabela -->

          </div> <!-- Fim da div tabela responsiva -->

        </div> <!-- Fim da Coluna de Contas a Pagar -->

        <!-- Inicio da Coluna de Contas a Receber -->
        <div class="col">

        <!-- Título da Tabela -->
        <div class="p-1 mb-1 bg-success text-white"><h4 class="text-center">Contas a Receber - Hoje</h4></div>

          <!-- Início da div tabela responsiva -->
          <div class="table-responsive">

            <!-- Início da Tabela -->
            <table class="table table-dark">
            <form>
                  <caption>Contas a receber de hoje</caption>
                  <thead>
                      <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">Status</th>
                          <th scope="col">Valor</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                      //Busca todas as informações da tabela despesas_tbl
                      $pdo = Database::connect();
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                      $sql = "SELECT * FROM recebimentos_tbl WHERE datavenc LIKE '$diaatual' ORDER BY nome ASC";
                      
                      foreach ($pdo->query($sql) as $row) {
                          echo '<tr>
                              <td>'. $row['nome'] . '</td>

                              <td>'. $row['statuss'] . '</td>
                              
                              <td>'. $row['valor'] . '</td>
                          </tr>';

                      }
                      Database::disconnect();          
                  ?>
            </form>
            </table> <!-- Fim da Tabela -->

          </div> <!-- Fim da div tabela responsiva -->

        </div> <!-- Fim da Coluna de Contas a Receber -->

      </div>

    </div> <!-- Fim da div container -->

  <div> <!-- Fim da div direita - lado direito da pagina -->
</div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>
  <script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>

