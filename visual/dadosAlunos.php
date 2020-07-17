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
        
        <div class="col-sm-9 divform bg-dark text-white">
            <h4 class="text-center">Dados do Aluno</h4>
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
                        $aluno = $_GET['alunoData'];
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT tipo, nome, dtNasc, telfixo, celular, contato, endereco, numero, cep, bairro, complemento, cidade, uf, cpf, rg, plano, mensalidade FROM alunos_tbl WHERE id=$aluno";
                
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>
                                    <td>Tipo de Aluno </td>
                                    <td>'. $row['tipo'] . '</td>
                                </tr>';
                            echo '<tr>
                                <td>Nome Completo </td>
                                <td>'. $row['nome'] . '</td>
                                </tr>';
                            echo '<tr>
                                <td>Dt. Nascimento </td>
                                <td>'. $row['dtNasc'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Telefone </td>
                                <td>'. $row['telfixo'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Celular </td>
                                <td>'. $row['celular'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Contato </td>
                                <td>'. $row['contato'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Endereço </td>
                                <td>'. $row['endereco'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Numero </td>
                                <td>'. $row['numero'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>CEP </td>
                                <td>'. $row['cep'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Bairro </td>
                                <td>'. $row['bairro'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Complemento </td>
                                <td>'. $row['complemento'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Cidade </td>
                                <td>'. $row['cidade'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>UF </td>
                                <td>'. $row['uf'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>CPF </td>
                                <td>'. $row['cpf'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>RG </td>
                                <td>'. $row['rg'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Plano </td>
                                <td>'. $row['plano'] . '</td>
                            </tr>';
                            echo '<tr>
                                <td>Mensalidade </td>
                                <td>'. $row['mensalidade'] . '</td>
                            </tr>';

                        }
                        Database::disconnect();               
                    ?>
                </table>
            </div>
            <div class="text-center">
                <a href="meusAlunos.php" class="btn btn-secondary">sair</a>
            </div>
                <script src="../js/jquery.min.js"></script>
                <script src="../js/popper.min.js"></script>
                <script src="../bootstrap/bootstrap.min.js"></script>
                <script src="../bootstrap/bootstrap.bundle.min.js"></script>
        </div>
    </div>   
    </body>
</html>                            
