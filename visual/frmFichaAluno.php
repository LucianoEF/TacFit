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

<!-- Verificação do Usuário -->
<?php
    include "../core/verifica_session.php";
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
        $sqlnometreino = "SELECT nometreino FROM treino_tbl";
        Database::disconnect();

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de exercicios-->
            <a class="btn btn-secondary" href="minhasFichas.php">Ficha dos Alunos</a>
            <br/>

            <h3 class="text-center">Ficha do Aluno</h3>
            <br/>

            <!--frmFichaAluno -->
            <form name="frmFichaAluno" action="../classes/operacoesFicha.php" method="post">
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
                    <label for="dataent">Data de Entrada</label>
                    <input type="date" class="form-control" id="dataent" name="dataent">
                </div>
                <div class="col"> 
                    <label for="objetivo">Objetivo do Aluno</label>
                    <input type="text" class="form-control" id="objetivo" name="objetivo">
                </div> 
            </div>
            <div class="row">
                <div class="col"> 
                    <label for="peso">Peso Atual (Kg)</label>
                    <input type="text" onchange="calcular()" class="form-control" id="peso" name="peso">
                </div>
                <div class="col"> 
                    <label for="altura">Altura (cm)</label>
                    <input type="number" onchange="calcular()" class="form-control" id="altura" name="altura">
                </div>
                <div class="col"> 
                    <label for="imc">IMC</label>
                    <input type="number" readonly="readonly" class="form-control" id="imc" name="imc" value="Resultado IMC">
                </div>
                <div class="col"> 
                    <label for="pesominimo">Peso Mínimo (Kg)</label>
                    <input type="number" readonly="readonly" class="form-control" id="pesominimo" name="pesominimo">
                </div>
                <div class="col"> 
                    <label for="pesomaximo">Peso Máximo (Kg)</label>
                    <input type="number" readonly="readonly" class="form-control" id="pesomaximo" name="pesomaximo">
                </div>
            </div>

            <br/>

            <h4 class="text-center">Horário do Aluno</h4>
            <br/>
            
            <div class="row">
                <div class="col"> 
                    <label for="nometreino">Treino Indicado <font color="red">*</font></label>
                    <select class="form-control" id="nometreino" name="nometreino" required>';
                        //echo $sqlnometreino = "SELECT nometreino FROM treino_tbl";
                        echo "<option>Selecione..</option>";
                        //geração dinamica do select usando sql da linha 42
                        foreach ($pdo->query($sqlnometreino) as $linha){                       
                            echo '<option value="'.$linha[nometreino].'">' .$linha[nometreino].'</option>';
                        }
                    echo'</select>
                </div>
                <div class="col"> 
                    <label for="observacao">Observação</label>
                    <input type="observacao" class="form-control" id="observacao" name="observacao">
                </div>
                <div class="col"> 
                    <label for="diadasemana">Dias</label>
                    <select class="form-control" id="diadasemana" name="diadasemana" required>
                        <option>Selecione..</option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="horario">Horário</label>
                    <select class="form-control" id="horario" name="horario" required>
                        <option>Selecione..</option>
                        <option>06:00 às 07:00</option>
                        <option>07:00 às 08:00</option>
                        <option>08:00 às 09:00</option>
                        <option>09:00 às 10:00</option>
                        <option>10:00 às 11:00</option>
                        <option>11:00 às 12:00</option>
                        <option>12:00 às 13:00</option>
                        <option>13:00 às 14:00</option>
                        <option>14:00 às 15:00</option>
                        <option>15:00 às 16:00</option>
                        <option>16:00 às 17:00</option>
                        <option>17:00 às 18:00</option>
                        <option>18:00 às 19:00</option>
                        <option>19:00 às 20:00</option>
                        <option>20:00 às 21:00</option>
                        <option>21:00 às 22:00</option>
                        <option>22:00 às 23:00</option>
                        <option>23:00 às 00:00</option>
                    </select>
                </div>
            </div>';
                ?>
                <!--Calculo do IMC-->
                    <script type="text/javascript">
                        function calcular(){
                            var peso  = parseInt(document.getElementById('peso').value, 10);
                            var altura  = parseInt(document.getElementById('altura').value, 10);
            
                            if (!isNaN(peso) && !isNaN(altura)){
                            document.getElementById('imc').value = (peso / ((altura/100) * (altura/100))).toFixed(2);
                            document.getElementById('pesominimo').value = (19 * ((altura/100) * (altura/100))).toFixed(2);
                            document.getElementById('pesomaximo').value = (25 * ((altura/100) * (altura/100))).toFixed(2);
                            }
                        }   
                    </script>
                <?php
                echo'<br/>
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
                </div>
            </form>';
        }

    //Alterar dados do Ficha do Aluno
    if ($operacao == 'alterar') {
        $ficha = $_GET['fichaData'];
        $sqlnome1 = "SELECT nome FROM ficha_tbl";
        $sqlnometreino1 = "SELECT nometreino FROM ficha_tbl";
        
        //Conexão com o Base de Dados
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM ficha_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ficha));

        echo '<div class="col-sm-9 divform bg-dark text-white">
        <br/>
        <h3 class="text-center">Alterar Ficha do Aluno</h3>
        <br/>

        <!--frmFichaAluno ALTERAR FICHA DO ALUNO-->
        <form name="frmFichaAluno" action="../classes/operacoesFicha.php" method="post">';
            foreach ($q as $row){
                $data = date("d-m-Y",strtotime($row['dataent']));
                echo '<div class="row">
                <div class="col"> 
                    <label for="nome">Nome do Aluno <font color="red">*</font></label>
                    <select class="form-control" id="nome" name="nome" required>';
                            //echo $sqlnome1 = "SELECT nome FROM ficha_tbl";
                            //geração dinamica do select usando sql da linha 165
                            foreach ($pdo->query($sqlnome1) as $linha){                       
                                echo '<option value="'.$linha[nome].'">' .$linha[nome].'</option>';
                            }
                    echo'</select>
                </div>
                <div class="col"> 
                    <label for="dataent">Data de Entrada</label>
                    <!--<input type="date" class="form-control" id="dataent" name="dataent" value="'.$data .'">-->
                    <input type="text" class="form-control" id="dataent" name="dataent" value="'.$data .'">
                </div>
                <div class="col"> 
                    <label for="objetivo">Objetivo do Aluno</label>
                    <input type="text" class="form-control" id="objetivo" name="objetivo" value="'.$row['objetivo'] .'">
                </div> 
            </div>
            <div class="row">
                <div class="col"> 
                    <label for="peso">Peso Atual (Kg)</label>
                    <input type="number" onchange="calcular()" class="form-control" id="peso" name="peso" value="'.$row['peso'] .'">
                </div>
                <div class="col"> 
                    <label for="altura">Altura (cm)</label>
                    <input type="number" onchange="calcular()" class="form-control" id="altura" name="altura" value="'.$row['altura'] .'">
                </div>
                <div class="col"> 
                    <label for="imc">IMC</label>
                    <input type="number" readonly="readonly" class="form-control" id="imc" name="imc" value="'.$row['imc'] .'">
                </div>
                <div class="col"> 
                    <label for="pesominimo">Peso Mínimo (Kg)</label>
                    <input type="number" readonly="readonly" class="form-control" id="pesominimo" name="pesominimo" value="'.$row['pesominimo'] .'">
                </div>
                <div class="col"> 
                    <label for="pesomaximo">Peso Máximo (Kg)</label>
                    <input type="number" readonly="readonly" class="form-control" id="pesomaximo" name="pesomaximo" value="'.$row['pesomaximo'] .'">
                </div>
            </div>

            <br/>

            <h4 class="text-center">Horário do Aluno</h4>
            <br/>
            
            <div class="row">
                <div class="col"> 
                    <label for="nometreino">Treino Indicado <font color="red">*</font></label>
                    <select class="form-control" id="nometreino" name="nometreino" value="'.$row['nometreino'] .'" required>';
                        //echo $sqlnometreino = "SELECT nometreino FROM treino_tbl";
                        //geração dinamica do select usando sql da linha 42
                        foreach ($pdo->query($sqlnometreino1) as $linha){                       
                            echo '<option value="'.$linha[nometreino].'">' .$linha[nometreino].'</option>';
                        }
                    echo'</select>
                </div>
                <div class="col"> 
                    <label for="observacao">Observação</label>
                    <input type="observacao" class="form-control" id="observacao" name="observacao" value="'.$row['observacao'] .'">
                </div>
                <div class="col"> 
                    <label for="diadasemana">Dias</label>
                    <select class="form-control" id="diadasemana" name="diadasemana" value="'.$row['diadasemana'] .'" required>
                        <option>Selecione..</option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="horario">Horário</label>
                    <select class="form-control" id="horario" name="horario" value="'.$row['horario'] .'" required>
                        <option>Selecione..</option>
                        <option>06:00 às 07:00</option>
                        <option>07:00 às 08:00</option>
                        <option>08:00 às 09:00</option>
                        <option>09:00 às 10:00</option>
                        <option>10:00 às 11:00</option>
                        <option>11:00 às 12:00</option>
                        <option>12:00 às 13:00</option>
                        <option>13:00 às 14:00</option>
                        <option>14:00 às 15:00</option>
                        <option>15:00 às 16:00</option>
                        <option>16:00 às 17:00</option>
                        <option>17:00 às 18:00</option>
                        <option>18:00 às 19:00</option>
                        <option>19:00 às 20:00</option>
                        <option>20:00 às 21:00</option>
                        <option>21:00 às 22:00</option>
                        <option>22:00 às 23:00</option>
                        <option>23:00 às 00:00</option>
                    </select>
                </div>
            </div>';
            ?>
            <!--Calculo do IMC-->
                <script type="text/javascript">
                    function calcular(){
                        var peso  = parseInt(document.getElementById('peso').value, 10);
                        var altura  = parseInt(document.getElementById('altura').value, 10);

                        if (!isNaN(peso) && !isNaN(altura)){
                        document.getElementById('imc').value = (peso / ((altura/100) * (altura/100))).toFixed(2);
                        document.getElementById('pesominimo').value = (19 * ((altura/100) * (altura/100))).toFixed(2);
                        document.getElementById('pesomaximo').value = (25 * ((altura/100) * (altura/100))).toFixed(2);
                        }
                    }   
                </script>
            <?php
            echo'<br/>
            <!-- btns -->
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" id="acao" name="acao" value="alterar">
                        <input type="hidden" id="user" name="fichaData" value="'.$ficha.'">
                        <a href="#"><button type="submit" class="btn btn-primary btn-sm">Alterar </button></a>
                        <button type="reset" class="btn btn-danger btn-sm">Cancelar </button>
                        <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                    </div>
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
