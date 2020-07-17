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
        <!-- dados da Frequência do Aluno-->

        <br/>

    <div class="col-sm-9 divform bg-dark text-white">
        <h4 class="text-center">Dados Frequência do Aluno</h4>
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
                    $frequenciadiaria = $_GET['frequenciadiariaData'];
                    $pdo = Database::connect();
                    //SHOW COLUMNS FROM tbl
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT mesreferencia, nome, datatreino, presenca FROM frequenciadiaria_tbl WHERE id=$frequenciadiaria";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>
                                <td>Mês de Referência </td>
                                <td>'. $row['mesreferencia'] . '</td>
                            </tr>';
                        echo '<tr>
                                <td>Nome do Aluno </td>
                                <td>'. $row['nome'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Data do Treino </td>
                            <td>'. $row['datatreino'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Presença </td>
                            <td>'. $row['presenca'] . '</td>
                            </tr>';

                    }
                    Database::disconnect();               
                ?>
            </table>
        </div>
        <div class="text-center">
            <a href="minhasFrequencias.php" class="btn btn-secondary">sair</a>
        </div>

            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../bootstrap/bootstrap.min.js"></script>
            <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    </div>
    </div>   
    </body>
</html>                            
