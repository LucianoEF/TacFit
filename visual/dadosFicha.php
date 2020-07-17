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
        <!-- dados da Ficha do Aluno-->

        <br/>

    <div class="col-sm-9 divform bg-dark text-white">
        <h4 class="text-center">Dados Ficha do Aluno</h4>
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
                    $ficha = $_GET['fichaData'];
                    $pdo = Database::connect();
                    //SHOW COLUMNS FROM tbl
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT nome, dataent, objetivo, nometreino, observacao, peso, altura, imc, pesominimo, pesomaximo, diadasemana, horario FROM ficha_tbl WHERE id=$ficha";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>
                                <td>Nome do Aluno </td>
                                <td>'. $row['nome'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Data de Entrada </td>
                            <td>'. $row['dataent'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Objetivo </td>
                            <td>'. $row['objetivo'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Nome do treino </td>
                            <td>'. $row['nometreino'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Observação </td>
                            <td>'. $row['observacao'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Peso Atual </td>
                            <td>'. $row['peso'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Altura </td>
                            <td>'. $row['altura'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>IMC </td>
                            <td>'. $row['imc'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Peso Mínimo </td>
                            <td>'. $row['pesominimo'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Peso Máximo </td>
                            <td>'. $row['pesomaximo'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Dia </td>
                            <td>'. $row['diadasemana'] . '</td>
                        </tr>';
                        echo '<tr>
                            <td>Horário </td>
                            <td>'. $row['horario'] . '</td>
                        </tr>';

                    }
                    Database::disconnect();               
                ?>
            </table>
        </div>
            <a href="minhasFichas.php" class="btn btn-secondary">sair</a>

            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../bootstrap/bootstrap.min.js"></script>
            <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    </div>
    </div>   
    </body>
</html>                            
