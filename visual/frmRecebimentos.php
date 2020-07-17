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
        include '../core/Database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlnome = "SELECT nome FROM alunos_tbl";
        $sqlformaspgto = "SELECT formaspgto FROM formaspgto_tbl";
        Database::disconnect();

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de Recebimentos-->
            <a class="btn btn-secondary" href="meusRecebimentos.php">Recebimentos</a>
            <br/>
            
            <h3 class="text-center">Recebimentos</h3>
        <br/>

        <!--frmRecebimentos -->
        <form name="frmRecebimentos" action="../classes/operacoesRecebimentos.php" method="post">
        <div class="row">
            <div class="col">
                <label for="mesreferencia">Mes Referência<font color="red">*</font></label>
                <input type="text" class="form-control" id="mesreferencia" name="mesreferencia" required>
            </div>
            <div class="col">
                <label for="statuss">Status<font color="red">*</font></label>
                <select class="form-control" id="statuss" name="statuss" required>
                        <option>Pago</option>
                        <option>Pendente</option>
                </select>
            </div>
            <div class="col"> 
                <label for="datavenc">Data de Vencimento</label>
                <input type="date" class="form-control" id="datavenc" name="datavenc">
            </div>
        </div>

        <!-- formatando mes de referencia -->
            <script type="text/javascript">
            $("#mesreferencia").mask("00/0000");
            </script>
        
        <br/>

        <div class="row">
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
                <label for="datapgto">Data do Pagamento <font color="red">*</font></label>
                <input type="date" class="form-control" id="datapgto" name="datapgto" required>
            </div>
            <div class="col"> 
                <label for="formaspgto">Formas de Pagamento <font color="red">*</font></label>
                    <select class="form-control" id="formaspgto" name="formaspgto" required>';
                            //echo $sqlformaspgto = "SELECT formaspgto FROM formaspgto_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 68
                            foreach ($pdo->query($sqlformaspgto) as $linha){                       
                                echo '<option value="'.$linha[formaspgto].'">' .$linha[formaspgto].'</option>';
                            }
                    echo'</select>
            </div>
            <div class="col"> 
                <label for="valor">Valor<font color="red">*</font></label>
                <input type="text" class="form-control" id="valor" name="valor" required>
            </div>
        </div>

        <!-- formatando Valor -->
            <script type="text/javascript">
            $("#valor").mask("R$ 000,00");
            </script>

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

    //Alterar dados do Frequencia do Aluno
    if ($operacao == 'alterar') {
        $recebimentos = $_GET['recebimentosData'];
        
        //Conexão com o Base de Dados
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM recebimentos_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($recebimentos));

        echo '<div class="col-sm-9 divform bg-dark text-white">
        <br/>
    <h3 class="text-center">Alterar Recebimentos</h3>
    <br/>

    <!--frmRecebimentos ALTERAR RECEBIMENTOS-->
    <form name="frmRecebimentos" action="../classes/operacoesRecebimentos.php" method="post">';
        foreach ($q as $row){
            $data = date("Y-m-d",strtotime(str_replace('-','/',$row['datapgto'])));
            $datavenc = date("Y-m-d",strtotime(str_replace('-','/',$row['datavenc'])));
        echo '<div class="row">
        <div class="col">
            <label for="mesreferencia">Mes Referência<font color="red">*</font></label>
            <input type="text" class="form-control" id="mesreferencia" name="mesreferencia" value="'.$row['mesreferencia'] .'" required>
        </div>
        <div class="col">
            <label for="statuss">Status<font color="red">*</font></label>
            <select class="form-control" id="statuss" name="statuss" value="'.$row['statuss'] .'" required>
                    <option>Pago</option>
                    <option>Pendente</option>
            </select>
        </div>
        <div class="col"> 
            <label for="datavenc">Data de Vencimento</label>
            <input type="date" class="form-control" id="datavenc" name="datavenc" value="'.$datavenc .'">
        </div>
    </div>

    <!-- formatando mes de referencia -->
        <script type="text/javascript">
        $("#mesreferencia").mask("00/0000");
        </script>
    
    <br/>
    
    <div class="row">
            <div class="col"> 
                <label for="nome">Nome do Aluno <font color="red">*</font></label>
                    <select class="form-control" id="nome" name="nome" value="'.$row['nome'] .'" required>';
                            //echo $sqlnome = "SELECT nome FROM alunos_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 42
                            foreach ($pdo->query($sqlnome) as $linha){                       
                                echo '<option value="'.$linha[nome].'">' .$linha[nome].'</option>';
                            }
                    echo'</select>
            </div>
            <div class="col"> 
                <label for="datapgto">Data do Pagamento<font color="red">*</font></label>
                <input type="date" class="form-control" id="datapgto" name="datapgto" value="'.$data .'"required>
            </div>
            <div class="col"> 
                <label for="formaspgto">Formas de Pagamento <font color="red">*</font></label>
                    <select class="form-control" id="formaspgto" name="formaspgto" value="'.$row['formaspgto'] .'" required>';
                            //echo $sqlformaspgto = "SELECT formaspgto FROM formaspgto_tbl";
                            echo "<option>Selecione..</option>";
                            //geração dinamica do select usando sql da linha 68
                            foreach ($pdo->query($sqlformaspgto) as $linha){                       
                                echo '<option value="'.$linha[formaspgto].'">' .$linha[formaspgto].'</option>';
                            }
                    echo'</select>
            </div>
            <div class="col"> 
                <label for="valor">Valor (R$)<font color="red">*</font></label>
                <input type="text" class="form-control" id="valor" name="valor" value="'.$row['valor'] .'" required>
            </div>
        </div>

        <!-- formatando valor -->
            <script type="text/javascript">
            $("#valor").mask("R$ 000,00");
        </script>

        <br/>
    <!-- btns -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="hidden" id="acao" name="acao" value="alterar">
                <input type="hidden" id="user" name="recebimentosData" value="'.$recebimentos.'">
                <a href="#"><button type="submit" class="btn btn-primary btn-sm">Alterar </button></a>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
            </div>
        </div>
    </form>';
    }
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
