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
            <!--Carregar grid de exercicios-->
            <a class="btn btn-secondary" href="meusExercicios.php">Exercicios</a>
            
            <br/>
            <h3 class="text-center">Cadastrar Exercício</h3>
        <br/>

        <!--frmExercicio -->
        <form name="frmExercicio" action="../classes/operacoesExercicio.php" method="post">
            <div class="row">
                <div class="col"> 
                    <label for="categoria">Categoria do exercício</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option>Aeróbico</option>
                        <option>Funcional</option>
                        <option>Musculação</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="nomeexe">Nome do Exercício<font color="red">*</font></label>
                    <input type="text" class="form-control" id="nomeexe" name="nomeexe" required>
                </div>
                <div class="col"> 
                    <label for="objetivo">Objetivo </label>
                    <select class="form-control" id="objetivo" name="objetivo" required>
                        <option>Fortalecimento</option>
                        <option>Emagrecimento</option>
                        <option>Alongamento</option>
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
                </div>
            </div>
        </form>';
    }

    //Alterar dados do Exercício
    if ($operacao == 'alterar') {
        $exercicio = $_GET['exeData'];
        
        //Conexão com o Base de Dados
        include '../core/Database.php';
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM exercicio_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($exercicio));

        echo '<div class="col-sm-9 divform bg-dark text-white">
        <br/>
    <h3 class="text-center">Alterar Cadastro de Exercício</h3>
    <br/>

    <!--frmExercicio ALTERAR CADASTRO DE EXERCÍCIO-->
    <form name="frmExercicio" action="../classes/operacoesExercicio.php" method="post">
        <div class="row">
            <div class="col"> 
                <label for="categoria">Categoria do exercício</label>
                <select class="form-control" id="categoria" name="categoria" value="'.$row['categoria'] .'" required>
                    <option>Funcional</option>
                    <option>Musculação</option>
                </select>
            </div>
            <div class="col"> 
                <label for="nomeexe">Nome do Exercício<font color="red">*</font></label>
                <input type="text" class="form-control" id="nomeexe" name="nomeexe" value="'.$row['nomeexe'] .'" required>
            </div>
            <div class="col"> 
                <label for="objetivo">Objetivo </label>
                <select class="form-control" id="objetivo" name="objetivo" value="'.$row['objetivo'] .'" required>
                    <option>Fortalecimento</option>
                    <option>Emagrecimento</option>
                    <option>Alongamento</option>
                </select>
            </div>
        </div>
        <br/>
        <!-- btns -->
        <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="hidden" id="acao" name="acao" value="alterar">
                <input type="hidden" id="user" name="exeData" value="'.$exercicio.'">
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
