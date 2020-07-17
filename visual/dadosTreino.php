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
        <!-- dados do Treino-->

        <br/>

    <div class="col-sm-9 divform bg-dark text-white">
        <h4 class="text-center">Dados Treino</h4>
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
                    $treino = $_GET['treinoData'];
                    $pdo = Database::connect();
                    //SHOW COLUMNS FROM tbl
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT categoria, nometreino, nomeexe, repeticoes, intervalo, nomeexe1, repeticoes1, intervalo1 FROM treino_tbl WHERE id=$treino";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>
                                <td>Categoria </td>
                                <td>'. $row['categoria'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Nome do Treino </td>
                            <td>'. $row['nometreino'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Nome do Exercício </td>
                            <td>'. $row['nomeexe'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Repetições </td>
                            <td>'. $row['repeticoes'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Intervalo (min.) </td>
                            <td>'. $row['intervalo'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Nome do Exercício </td>
                            <td>'. $row['nomeexe1'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Repetições </td>
                            <td>'. $row['repeticoes1'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Intervalo (min.) </td>
                            <td>'. $row['intervalo1'] . '</td>
                        </tr>';

                    }
                    Database::disconnect();               
                ?>
            </table>
        </div>
            <a href="meusTreinos.php" class="btn btn-secondary">sair</a>

            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../bootstrap/bootstrap.min.js"></script>
            <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    </div>
    </div>   
    </body>
</html>                            
