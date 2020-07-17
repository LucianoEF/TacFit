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
        <!-- dados dos alunos-->

        <br/>

    <div class="col-sm-9 divform bg-dark text-white">
        <h4 class="text-center">Dados Exercício</h4>
        <br/>
        <div class="table-responsive">
            <table class="table table-dark">
            <form>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Informações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include '../core/Database.php';
                    $exercicio = $_GET['exeData'];
                    $pdo = Database::connect();
                    //SHOW COLUMNS FROM tbl
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT categoria, nomeexe, objetivo FROM exercicio_tbl WHERE id=$exercicio";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>
                                <td>Categoria do Exercício </td>
                                <td>'. $row['categoria'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Nome do Exercício </td>
                            <td>'. $row['nomeexe'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Objetivo </td>
                            <td>'. $row['objetivo'] . '</td>
                        </tr>';

                    }
                    Database::disconnect();               
                ?>
            </table>
        </div>
            <a href="meusExercicios.php" class="btn btn-secondary">sair</a>

            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../bootstrap/bootstrap.min.js"></script>
            <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    </div>
    </div>   
    </body>
</html>                            
