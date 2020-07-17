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
        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de FormasPgto-->
            <a class="btn btn-secondary" href="minhasFormasPgto.php">Formas de Pagamento</a>
            <br/>
            
            <h3 class="text-center">Formas de Pagamento</h3>
        <br/>

        <!--frmFormasPgto -->
        <form name="frmFormasPgto" action="../classes/operacoesFormasPgto.php" method="post">
        <div class="row">
            <div class="col"> 
                <label for="formaspgto">Forma de Pagamento <font color="red">*</font></label>
                    <select class="form-control" id="formaspgto" name="formaspgto" required>
                        <option>Selecione..</option>
                        <option>Dinheiro</option>
                        <option>Cartão de Débito</option>
                        <option>Cartão de Crédito</option>
                        <option>Transferência</option>
                        <option>Cheque</option>
                    </select>
            </div>
            <div class="col"> 
                <label for="observacao">Observação </label>
                <input type="text" class="form-control" id="observacao" name="observacao">
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
                </div>
            </div>
        </form>';
    }

    //Alterar dados do Frequencia do Aluno
    if ($operacao == 'alterar') {
        $formaspgto = $_GET['formaspgtoData'];
        
        //Conexão com o Base de Dados
        include '../core/Database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Selecionar dados do usuário especifico
        $sql = "SELECT *  FROM formaspgto_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($formaspgto));

        echo '<div class="col-sm-9 divform bg-dark text-white">
        <br/>
    <h3 class="text-center">Alterar Formas de Pagamento</h3>
    <br/>

    <!--frmFormasPgto ALTERAR FREQUENCIA DO ALUNO-->
    <form name="frmFormasPgto" action="../classes/operacoesFormasPgto.php" method="post">';
            echo '<div class="row">
            <div class="col"> 
            <label for="formaspgto">Forma de Pagamento <font color="red">*</font></label>
            <select class="form-control" id="formaspgto" name="formaspgto" value="'.$row['formaspgto'] .'" required>
                <option>Selecione..</option>
                <option>Dinheiro</option>
                <option>Cartão de Débito</option>
                <option>Cartão de Crédito</option>
                <option>Transferência</option>
                <option>Cheque</option>
                </select>
            </div>
            <div class="col"> 
            <label for="observacao">Observação </label>
            <input type="text" class="form-control" id="observacao" name="observacao" value="'.$row['observacao'] .'">
            </div>
        </div>
        <br/>
    <!-- btns -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="hidden" id="acao" name="acao" value="alterar">
                <input type="hidden" id="user" name="formaspgtoData" value="'.$formaspgto.'">
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
