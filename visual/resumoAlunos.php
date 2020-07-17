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

    <!-- Início da Grid Alunos -->
    <div class="p-1 mb-1 bg-primary text-white"><h4 class="text-center">Quadro Geral de Alunos</h4></div>
    <div class="table-responsive">
    <table class="table table-dark">
        <form>
        <caption>Lista de alunos</caption>        
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Mensalidade</th>
                    <th scope="col">Data de Entrada</th>
                    <th scope="col">...<img src="../img/webIcons/png/040-journal.png" width="35px" height="35px">...</th>
                    <th scope="col">....<img src="../img/webIcons/png/104-worldwide.png" width="35px" height="35px">....</th>
                    <th scope="col">........<img src="../img/webIcons/png/011-text.png" width="35px" height="35px">........</th>
                </tr>
            </thead>
            <tbody>
            <?php  
                include '../core/Database.php';
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM alunos_tbl INNER JOIN ficha_tbl ON alunos_tbl.nome = ficha_tbl.nome";

                foreach ($pdo->query($sql) as $row){
                    echo '<tr>';
                    echo '<td>'. $row['id'] . '</td>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td>'. $row['mensalidade'] . '</td>';
                    echo '<td>'. $row['dataent'] . '</td>';
                
            ?>
                <td>
                    <!--Carregar os ficha completos de cada aluno-->
                    <?php        
                    echo '<a class="btn btn-primary text-center" href="dadosFicha.php?fichaData=' . $row['id'] . '">Ficha</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados do aluno-->
                    <?php
                    echo '<a class="btn btn-primary text-center" href="dadosAlunos.php?alunoData=' . $row['id'] . '">Dados</a>';
                    ?>
                </td>
                <td>
                    <!--Botão que chama o formulario de alteração dos dados do aluno-->
                    <?php
                    echo '<a class="btn btn-primary text-center" href="dadosFrequenciaDiaria.php?frequenciadiariaData=' . $row['id'] . '">Frequência</a>';
                    ?>
                </td>
            <tr>
            <?php  }
                Database::disconnect();
            ?>

            </tbody>
          </form>
        </table>
        </div> <!-- Fim da Grid Alunos -->
    <div>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>
  <script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>

