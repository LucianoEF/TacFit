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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
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

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de Planos-->
            <a class="btn btn-secondary" href="meusPlanos.php">Planos</a>
            
            <br/>
            <h3 class="text-center">Cadastrar Plano</h3>
        <br/>

        <!--frmPlano -->
        <form name="frmPlano" action="../classes/operacoesPlano.php" method="post">
            <div class="row">
                <div class="col"> 
                    <label for="plano">Plano<font color="red">*</font></label>
                    <select class="form-control" id="plano" name="plano" required>
                        <option>Mensalista</option>
                        <option>6 Meses</option>
                        <option>12 Meses</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="valor">Valor (R$)<font color="red">*</font></label>
                    <input type="text" class="form-control" id="valor" name="valor" required>
                </div>

                <!-- formatando Valor -->
                <script type="text/javascript">
                $("#valor").mask("R$ 00,00");
                </script>

            </div>
            <br/>
            <!-- btns -->
            <div class="container">
            <div class="row">
                <div class="col text-center">
                    <input type="hidden" id="acao" name="acao" value="cadastrar">
                    <a href="#"><button type="submit" class="btn btn-primary btn-sm">Cadastrar </button></a>
                    <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                </div>
            </div>
        </form>';
    }

    //Alterar dados do Plano
    if ($operacao == 'alterar') {
        $plano = $_GET['planoData'];
        
        //Conexão com o Base de Dados
        include '../core/Database.php';
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM plano_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($plano));

        echo '<div class="col-sm-9 divform bg-dark text-white">
        <br/>
    <h3 class="text-center">Alterar Cadastro de Plano</h3>
    <br/>

    <!--frmPlano ALTERAR CADASTRO DE PLANO-->
    <form name="frmPlano" action="../classes/operacoesPlano.php" method="post">
        <div class="row">
            <div class="col"> 
                <label for="plano">Plano<font color="red">*</font></label>
                <select class="form-control" id="plano" name="plano" value="'.$row['plano'] .'" required>
                    <option value="1">Mensalista</option>
                    <option value="2">6 Meses</option>
                    <option value="3">12 Meses</option>
                </select>
            </div>
            <div class="col"> 
                <label for="valor">Valor (R$)<font color="red">*</font></label>
                <input type="text" class="form-control" id="valor" name="valor" value="'.$row['valor'] .'" required>
            </div>

            <!-- formatando Valor -->
            <script type="text/javascript">
            $("#valor").mask("R$ 00,00");
            </script>

        </div>
        <br/>
        <!-- btns -->
        <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="hidden" id="acao" name="acao" value="alterar">
                <input type="hidden" id="user" name="planoData" value="'.$plano.'">
                <a href="#"><button type="submit" class="btn btn-primary btn-sm">Alterar </button></a>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
            </div>
        </div>
    </form>';
    }
    ?>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>
