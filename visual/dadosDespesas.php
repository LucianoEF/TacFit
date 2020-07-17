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
        <!-- dados Despesas do Aluno-->

        <br/>

    <div class="col-sm-9 divform bg-dark text-white">
        <h4 class="text-center">Dados Despesas</h4>
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
                    $despesas = $_GET['despesasData'];
                    $pdo = Database::connect();
                    //SHOW COLUMNS FROM tbl
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT mesreferencia, statuss, datavenc, descricao, datapgto, formaspgto, valor FROM despesas_tbl WHERE id=$despesas";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>
                                <td>Mês Referência </td>
                                <td>'. $row['mesreferencia'] . '</td>
                            </tr>';
                        echo '<tr>
                                <td>Status </td>
                                <td>'. $row['statuss'] . '</td>
                            </tr>';
                        echo '<tr>
                                <td>Data de Vencimento </td>
                                <td>'. $row['datavenc'] . '</td>
                            </tr>';
                        echo '<tr>
                                <td>Descrição </td>
                                <td>'. $row['descricao'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Data de Pagamento </td>
                            <td>'. $row['datapgto'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Forma de Pagamento </td>
                            <td>'. $row['formaspgto'] . '</td>
                            </tr>';
                        echo '<tr>
                            <td>Valor </td>
                            <td>'. $row['valor'] . '</td>
                            </tr>';

                    }
                    Database::disconnect();               
                ?>
            </table>
        </div>
        <div class="col text-center">
            <a href="minhasDespesas.php" class="btn btn-secondary">sair</a>
        </div>

            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../bootstrap/bootstrap.min.js"></script>
            <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    </div>
    </div>   
    </body>
</html>                            
