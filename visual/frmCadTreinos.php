<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>::TacFit::</title>
<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/cabecalho.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
        $sqlcategoria = "SELECT categoria FROM exercicio_tbl";
        $sqlnome = "SELECT nome FROM alunos_tbl";

        $operacao = $_GET['op'];

        if ($operacao == 'cadastrar') {
            echo '<div class="col-sm-9 divform bg-dark text-white">
            <!--Carregar grid de treinos-->
            <a class="btn btn-secondary" href="meusTreinos.php">Treinos</a>
            <br/>
            
            <h3 class="text-center">Cadastrar Treino</h3>
            <br/>

            <!--frmCadTreinos -->
            <form name="frmCadTreinos" action="../classes/operacoesTreino.php" method="post">
                <div class="row">
                    <div class="col"> 
                        <label for="categoria">Categoria <font color="red">*</font></label>
                            <select class="form-control" id="categoria" name="categoria" required>';
                                    //echo $sqlcategoria = "SELECT categoria FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlcategoria) as $linha){                       
                                        echo '<option value="'.$linha[categoria].'">' .$linha[categoria].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="nometreino">Nome do Treino<font color="red">*</font></label>
                        <input type="text" class="form-control" id="nometreino" name="nometreino" required>
                    </div>
                </div>
                <br/>
                <div id="formulario">
                <h5 class="text-center">1° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe" name="nomeexe" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes" name="repeticoes" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo" name="intervalo" required>
                    </div>

                    <!-- BOTAO ADD CAMPO -->
                    <!--<div class="col">
                        <label >Add Exercício</label>
                        <br/>
                        <button type="button" class="btn btn-light" id="add-campo"> + </button>
                    </div>-->
                </div>
                <h5 class="text-center">2° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe1">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe1" name="nomeexe1" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes1">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes1" name="repeticoes1" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo1">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo1" name="intervalo1" required>
                    </div>
                </div>
                <h5 class="text-center">3° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe2">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe2" name="nomeexe2" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes2">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes2" name="repeticoes2" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo2">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo2" name="intervalo2" required>
                    </div>
                </div>
                <h5 class="text-center">4° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe3">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe3" name="nomeexe3" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes3">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes3" name="repeticoes3" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo3">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo3" name="intervalo3" required>
                    </div>
                </div>
                <h5 class="text-center">5° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe4">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe4" name="nomeexe4" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes4">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes4" name="repeticoes4" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo4">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo4" name="intervalo4" required>
                    </div>
                </div>
                <h5 class="text-center">6° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe5">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe5" name="nomeexe5" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes5">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes5" name="repeticoes5" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo5">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo5" name="intervalo5" required>
                    </div>
                </div>
                <h5 class="text-center">7° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe6">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe6" name="nomeexe6" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes6">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes6" name="repeticoes6" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo6">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo6" name="intervalo6" required>
                    </div>
                </div>
                <h5 class="text-center">8° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe7">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe7" name="nomeexe7" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes7">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes7" name="repeticoes7" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo7">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo7" name="intervalo7" required>
                    </div>
                </div>
                <h5 class="text-center">9° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe8">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe8" name="nomeexe8" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes8">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes8" name="repeticoes8" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo8">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo8" name="intervalo8" required>
                    </div>
                </div>
                <h5 class="text-center">10° Exercício</h5>
                <div class="row">
                    <div class="col"> 
                        <label for="nomeexe9">Exercício <font color="red">*</font></label>
                            <select class="form-control" id="nomeexe9" name="nomeexe9" required>';
                                    //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                    echo "<option>Selecione..</option>";
                                    //geração dinamica do select usando sql da linha 42
                                    foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                        echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                    }
                            echo'</select>
                    </div>
                    <div class="col"> 
                        <label for="repeticoes9">Repetições </label>
                        <input type="text" class="form-control" id="repeticoes9" name="repeticoes9" required>
                    </div>
                    <div class="col"> 
                        <label for="intervalo9">Intervalo (min.)</label>
                        <input type="text" class="form-control" id="intervalo9" name="intervalo9" required>
                    </div>
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
    ?>

    <script>
        $("#add-campo").click(function () {
            $("#formulario").append('<div class="row"><div class="col"><label for="nomeexe1">Exercício <font color="red">*</font></label><select class="form-control" id="nomeexe1" name="nomeexe1" required> "<option>Selecione..</option>";</select></div><div class="col"><label for="repeticoes1">Repetições </label><input type="text" class="form-control" id="repeticoes1" name="repeticoes1" required></div><div class="col"><label for="intervalo1">Intervalo (min.)</label><input type="text" class="form-control" id="intervalo1" name="intervalo1" required></div></div>')
        })
    </script>
    
    <?php

    //Alterar dados do Treino
    if ($operacao == 'alterar') {
        $treino = $_GET['treinoData'];
        $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
        $sqlcategoria1 = "SELECT categoria FROM treino_tbl";
        $sqlnome = "SELECT nome FROM alunos_tbl";
        
        //Conexão com o Base de Dados
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM treino_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($treino));

        echo '<div class="col-sm-9 divform bg-dark text-white">
            <br/>
        <h3 class="text-center">Alterar Treino</h3>
        <br/>

        <!--frmCadTreinos ALTERAR DADOS-->
        <form name="frmCadTreinos" action="../classes/operacoesTreino.php" method="post">
            <div class="row">
                <div class="col"> 
                    <label for="categoria">Categoria <font color="red">*</font></label>
                        <select class="form-control" id="categoria" name="categoria" value="'.$row['categoria'] .'" required>';
                                //echo $sqlcategoria = "SELECT categoria FROM exercicio_tbl";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlcategoria1) as $linha){                       
                                    echo '<option value="'.$linha[categoria].'">' .$linha[categoria].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="nometreino">Nome do Treino<font color="red">*</font></label>
                    <input type="text" class="form-control" id="nometreino" name="nometreino" value="'.$row['nometreino'] .'" required>
                </div>
            </div>
            <h5 class="text-center">1° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe" name="nomeexe" value="'.$row['nomeexe'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes" name="repeticoes" value="'.$row['repeticoes'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo" name="intervalo" value="'.$row['intervalo'] .'" required>
                </div>
            </div>
            <h5 class="text-center">2° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe1">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe1" name="nomeexe1" value="'.$row['nomeexe1'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes1">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes1" name="repeticoes1" value="'.$row['repeticoes1'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo1">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo1" name="intervalo1" value="'.$row['intervalo1'] .'" required>
                </div>
            </div>
            <h5 class="text-center">3° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe2">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe2" name="nomeexe2" value="'.$row['nomeexe2'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes2">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes2" name="repeticoes2" value="'.$row['repeticoes2'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo2">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo2" name="intervalo2" value="'.$row['intervalo2'] .'" required>
                </div>
            </div>
            <h5 class="text-center">4° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe3">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe3" name="nomeexe3" value="'.$row['nomeexe3'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes3">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes3" name="repeticoes3" value="'.$row['repeticoes3'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo3">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo3" name="intervalo3" value="'.$row['intervalo3'] .'" required>
                </div>
            </div>
            <h5 class="text-center">5° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe4">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe4" name="nomeexe4" value="'.$row['nomeexe4'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes4">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes4" name="repeticoes4" value="'.$row['repeticoes4'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo4">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo4" name="intervalo4" value="'.$row['intervalo4'] .'" required>
                </div>
            </div>
            <h5 class="text-center">6° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe5">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe5" name="nomeexe5" value="'.$row['nomeexe5'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes5">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes5" name="repeticoes5" value="'.$row['repeticoes5'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo5">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo5" name="intervalo5" value="'.$row['intervalo5'] .'" required>
                </div>
            </div>
            <h5 class="text-center">7° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe6">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe6" name="nomeexe6" value="'.$row['nomeexe6'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes6">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes6" name="repeticoes6" value="'.$row['repeticoes6'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo6">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo6" name="intervalo6" value="'.$row['intervalo6'] .'" required>
                </div>
            </div>
            <h5 class="text-center">8° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe7">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe7" name="nomeexe7" value="'.$row['nomeexe7'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes7">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes7" name="repeticoes7" value="'.$row['repeticoes7'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo7">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo7" name="intervalo7" value="'.$row['intervalo7'] .'" required>
                </div>
            </div>
            <h5 class="text-center">9° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe8">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe8" name="nomeexe8" value="'.$row['nomeexe8'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes8">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes8" name="repeticoes8" value="'.$row['repeticoes8'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo8">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo8" name="intervalo8" value="'.$row['intervalo8'] .'" required>
                </div>
            </div>
            <h5 class="text-center">10° Exercício</h5>
            <div class="row">
                <div class="col"> 
                    <label for="nomeexe9">Exercício <font color="red">*</font></label>
                        <select class="form-control" id="nomeexe9" name="nomeexe9" value="'.$row['nomeexe9'] .'" required>';
                                //echo $sqlnomeexe = "SELECT nomeexe FROM exercicio_tbl";
                                echo "<option>Selecione..</option>";
                                //geração dinamica do select usando sql da linha 42
                                foreach ($pdo->query($sqlnomeexe) as $linha){                       
                                    echo '<option value="'.$linha[nomeexe].'">' .$linha[nomeexe].'</option>';
                                }
                        echo'</select>
                </div>
                <div class="col"> 
                    <label for="repeticoes9">Repetições </label>
                    <input type="text" class="form-control" id="repeticoes9" name="repeticoes9" value="'.$row['repeticoes9'] .'" required>
                </div>
                <div class="col"> 
                    <label for="intervalo9">Intervalo </label>
                    <input type="text" class="form-control" id="intervalo9" name="intervalo9" value="'.$row['intervalo9'] .'" required>
                </div>
            </div>
            <br/>
            <!-- btns -->
        <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="hidden" id="acao" name="acao" value="alterar">
                <input type="hidden" id="user" name="treinoData" value="'.$treino.'">
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
