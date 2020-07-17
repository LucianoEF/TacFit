<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>::TacFit::</title>
<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/cabecalho.css">

<!-- Verificar com Cleber sobre esses links - Formatação de número de telefone, celular e CEP -->
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
    <?php 
        include '../core/Database.php';
    ?>

    <div class="col-sm-9 divdireita">
    <div class="row">
        <div class="col">
    <!-- Tentativa 01 -->
            <center>
            <form name="search_form" method="POST" action="">
            <br/>
            <select class="btn btn-primary" id="mesref" name="mesref">
                <option value="">Selecione..</option>";
                <option value="01/">Janeiro</option>";
                <option value="02/">Fevereiro</option>";
                <option value="03/">Março</option>";
                <option value="04/">Abril</option>";
                <option value="05/">Maio</option>";
                <option value="06/">Junho</option>";
                <option value="07/">Julho</option>";
                <option value="08/">Agosto</option>";
                <option value="09/">Setembro</option>";
                <option value="10/">Outubro</option>";
                <option value="11/">Novembro</option>";
                <option value="12/">Dezembro</option>";
                
                <?php
                //Função ano atual armazenado na variavel $anoatual.
                $anoatual = date("Y");
                //Armazena o valor do option mesreferencia + $anoatual.
                $mesreferencia = $_POST['mesref'].$anoatual;
                
                ?>
            </select> <input type="submit" class="btn btn-secondary" value="Pesquisar">
            
        </div>
    </div>
        <br/>

        </form>
        </center>
        <br/>
        <div class="p-1 mb-1 bg-primary text-white"><h4 class="text-center">Relatório de Despesas</h4></div>
            <div class="table-responsive">
                <table class="table table-dark">
                <form>
                    <caption>Lista de Despesas</caption>
                    <thead>
                        <tr>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data Pgto</th>
                            <th scope="col">Mês</th>
                            <th scope="col">Forma Pgto</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Busca todas as informações da tabela recebimentos_tbl apartir do mesreferencia escolhido
                        $pdo = Database::connect();
                        //SHOW COLUMNS FROM tbl
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                        $sqlmesreferencia = "SELECT descricao, datapgto, mesreferencia, formaspgto, valor FROM despesas_tbl WHERE mesreferencia='$mesreferencia'";
                        
                        foreach ($pdo->query($sqlmesreferencia) as $row) {
                            echo '<tr>
                                <td>'. $row['descricao'] . '</td>

                                <td>'. $row['datapgto'] . '</td>

                                <td>'. $row['mesreferencia'] . '</td>

                                <td>'. $row['formaspgto'] . '</td>

                                <td>'. $row['valor'] . '</td>
                            </tr>';

                        }
                        Database::disconnect();               
                    ?>
                </table>
            </div>
            <div class="text-center">
                <a href="abertura.php" class="btn btn-secondary">sair</a>
            </div>


    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>
