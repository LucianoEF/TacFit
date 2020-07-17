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
    <?php 
        include '../core/Database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlnome = "SELECT nome FROM alunos_tbl";
        

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de frequencias-->
            <a class="btn btn-secondary" href="minhasFrequencias.php">Frequência</a>
            <br/>
            
            <h3 class="text-center">Frequência Diária</h3>
            <br/>

            <!--frmFrequenciaDiaria -->
            <form name="frmFrequenciaDiaria" action="../classes/operacoesFrequenciaDiaria.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="mesreferencia">Mes Referência<font color="red">*</font></label>
                    <input type="text" class="form-control" id="mesreferencia" name="mesreferencia" required>
                </div>

                <!-- formatando mes de referencia -->
                <script type="text/javascript">
                $("#mesreferencia").mask("00/0000");
                </script>

                <div class="col"> 
                    <label for="nome">Nome do Aluno <font color="red">*</font></label>
                        <select class="form-control" id="nome" name="nome" required>';
                                //echo $sqlnome = "SELECT nome FROM alunos_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnome) as $linha){                       
                                    echo '<option value="'.$linha[nome].'">' .$linha[nome].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="datatreino">Data do Treino</label>
                    <input type="date" class="form-control" id="datatreino" name="datatreino">
                </div>
                <div class="col"> 
                    <label for="presenca">Presença <font color="red">*</font></label>
                    <select class="form-control" id="presenca" name="presenca" required>
                        <option>Selecione..</option>
                        <option>Presente</option>
                        <option>Ausente</option>
                    </select>
                </div>
            </div>
            <br/>
            <!-- btns -->
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" id="acao" name="acao" value="cadastrar">
                        <a href="#"><button type="submit" class="btn btn-primary btn-sm">Cadastrar </button></a>
                        <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                        <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                    </div>
                </div>
            </form>';
        Database::disconnect();
        }

    ?>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>
