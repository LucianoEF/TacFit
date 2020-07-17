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
            <!--Carregar grid meus alunos-->
            <a class="btn btn-secondary" href="meusAlunos.php">Meus Alunos</a>
            <br/>

            <h3 class="text-center">Cadastrar Aluno</h3>
            <br/>

            <!--frmAlunos -->
            <form name="frmAlunos" action="../classes/operacoesAlunos.php" method="POST">
                <div class="row">
                    <div class="col"> 
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option>Físico</option>
                            <option>Jurídico</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for="nome">Nome Completo<font color="red">*</font></label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col"> 
                        <label for="dtnasc">Dt. Nascimento</label>
                        <input type="date" class="form-control" id="dtnasc" name="dtnasc">
                    </div>
                </div>
                <!-- contato -->
                <div class="row">
                    <div class="col"> 
                        <label for="telfixo">Telefone </label>
                        <input type="text" class="form-control" id="telfixo" name="telfixo">
                    </div>
                    <div class="col"> 
                        <label for="celular">Celular <font color="red">*</font></label>
                        <input type="text" class="form-control" id="celular" name="celular" required>
                    </div>

                    <!-- formatando número de telefone e celular -->
                    <script type="text/javascript">
                    $("#telfixo").mask("(00) 0000-0000");
                    $("#celular").mask("(00) 00000-0000");
                    </script>

                    <div class="col"> 
                        <label for="contato">Contato <font color="red">*</font> </label>
                        <input type="text" class="form-control" id="contato" name="contato" required>
                    </div>
                </div>

                <!-- endereço -->
                <div class="row">
                    <div class="col"> 
                        <label for="endereco">Endere&ccedil;o <font color="red">*</font></label>
                        <input type="text" class="form-control" id="endereco" name="endereco" required>
                    </div>
                    <div class="col"> 
                        <label for="numero">N&uacute;mero</label>
                        <input type="text" class="form-control" id="numero" name="numero">
                    </div>
                    <div class="col"> 
                        <label for="cep">CEP <font color="red">*</font></label>
                        <input type="text" class="form-control" id="cep" name="cep" required>
                    </div>

                    <!-- formatando CEP -->
                    <script type="text/javascript">
                    $("#cep").mask("00.000-000");
                    </script>

                    <div class="col"> 
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" >

                    </div>
                </div>
                <div class="row">
                    <div class="col"> 
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
                    <div class="col"> 
                        <label for="cidade">Cidade</label>
                        <input name="cidade" class="form-control py-2 border-right-0 border" type="text" id="cidade">
                    </div>
                    <div class="col"> 
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf">
                    </div>
                </div>
                
                <!-- documentos -->
                <div class="row">
                    <div class="col"> 
                        <label for="cpf">CPF<font color="red">*</font></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>

                    <!-- formatando CPF -->
                    <script type="text/javascript">
                    $("#cpf").mask("000.000.000-00");
                    </script>

                    <div class="col"> 
                        <label for="rg">RG<font color="red">*</font></label>
                        <input type="text" class="form-control" id="rg" name="rg" required>
                    </div>

                    <!-- formatando RG -->
                    <script type="text/javascript">
                    $("#rg").mask("0.000.000-0");
                    </script>

                    <div class="col"> 
                        <label for="plano">Plano<font color="red">*</font></label>
                        <select class="form-control" id="plano" name="plano" required>
                            <option value="1">Mensalista</option>
                            <option value="2">6 Meses</option>
                            <option value="3">12 Meses</option>
                        </select>
                    </div>';

                    $plano = $_GET['plano'];
                    echo "$plano";

                    if($plano = "1"){

                    }

                    echo'<div class="col"> 
                        <label for="mensalidade">Mensalidade (R$)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="mensalidade" name="mensalidade" required>
                    </div>

                    <!-- formatando Mensalidade -->
                    <script type="text/javascript">
                    $("#mensalidade").mask("R$ 00,00");
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
                        <!-- <a href="abertura.php"><button class="btn btn-warning btn-sm">In&iacute;cio&nbsp;&nbsp; </button></a> -->
                    </div>
                </div>
            </div>
        </form>';
    }

    //Alterar dados do Aluno
    if ($operacao == 'alterar') {
        $aluno = $_GET['alunoData'];
        
        //Conexão com o Base de Dados
        include '../core/Database.php';
        $pdo = Database::connect();

        //Selecionar dados do usuário especifico
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM alunos_tbl WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($aluno));

    echo '<div class="col-sm-9 divform bg-dark text-white">
        <h4 class="p-1 mb-1 bg-dark text-white text-center">Alterar Aluno</h4>
        <br/>

        <!--frmAlunos ALTERAR DADOS-->
        <form name="frmAlunos" action="../classes/operacoesAlunos.php" method="post">';
        foreach ($q as $row){
            $dtnasc = date("d-m-Y",strtotime($row['dtnasc']));
            echo '<div class="row">
                <div class="col"> 
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" value="'.$row['tipo'] .'" required>
                        <option>Físico</option>
                        <option>Jurídico</option>
                    </select>
                </div>
                <div class="col"> 
                    <label for="nome">Nome Completo<font color="red">*</font></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="'.$row['nome'] .'" required>
                </div>
                <div class="col"> 
                    <label for="dtnasc">Dt. Nascimento</label>
                    <!--<input type="date" class="form-control" id="dtnasc" name="dtnasc" value="'.$dtnasc.'">-->
                    <input type="text" class="form-control" id="dtnasc" name="dtnasc" value="'.$dtnasc.'">
                </div>
            </div>
            <!-- contato -->
            <div class="row">
                <div class="col"> 
                    <label for="telfixo">Telefone </label>
                    <input type="text" class="form-control" id="telfixo" name="telfixo" value="'.$row['telfixo'] .'">
                </div>
                <div class="col"> 
                    <label for="celular">Celular <font color="red">*</font></label>
                    <input type="text" class="form-control" id="celular" name="celular" value="'.$row['celular'] .'" required>
                </div>

                <!-- formatando número de telefone e celular -->
                <script type="text/javascript">
                $("#telfixo").mask("(00) 0000-0000");
                $("#celular").mask("(00) 00000-0000");
                </script>

                <div class="col"> 
                    <label for="contato">Contato <font color="red">*</font> </label>
                    <input type="text" class="form-control" id="contato" name="contato" value="'.$row['contato'] .'" required>
                </div>
            </div>

            <!-- endereço -->
            <div class="row">
                <div class="col"> 
                    <label for="endereco">Endere&ccedil;o <font color="red">*</font></label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="'.$row['endereco'] .'" required>
                </div>
                <div class="col"> 
                    <label for="numero">N&uacute;mero</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="'.$row['numero'] .'">
                </div>
                <div class="col"> 
                    <label for="cep">CEP <font color="red">*</font></label>
                    <input type="text" class="form-control" id="cep" name="cep" value="'.$row['cep'] .'" required>
                </div>

                <!-- formatando CEP -->
                <script type="text/javascript">
                $("#cep").mask("00.000-000");
                </script>

                <div class="col"> 
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="'.$row['bairro'] .'">

                </div>
            </div>
            <div class="row">
                <div class="col"> 
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="'.$row['complemento'] .'">
                </div>
                <div class="col"> 
                    <label for="cidade">Cidade</label>
                    <input name="cidade" class="form-control py-2 border-right-0 border" type="text" id="cidade" value="'.$row['cidade'] .'">
                </div>
                <div class="col"> 
                    <label for="uf">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" value="'.$row['uf'] .'">
                </div>
            </div>
            
            <!-- documentos -->
            <div class="row">
                <div class="col"> 
                    <label for="cpf">CPF<font color="red">*</font></label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="'.$row['cpf'] .'" required>
                </div>

                <!-- formatando CPF -->
                <script type="text/javascript">
                $("#cpf").mask("000.000.000-00");
                </script>

                <div class="col"> 
                    <label for="rg">RG<font color="red">*</font></label>
                    <input type="text" class="form-control" id="rg" name="rg" value="'.$row['rg'] .'" required>
                </div>

                <!-- formatando RG -->
                <script type="text/javascript">
                $("#rg").mask("0.000.000-0");
                </script>

                <div class="col"> 
                        <label for="plano">Plano<font color="red">*</font></label>
                        <select type="text" class="form-control" id="plano" name="plano" value="'.$row['plano'] .'" required>
                            <option>Mensalista</option>
                            <option>6 Meses</option>
                            <option>12 Meses</option>
                        </select>
                    </div>

                <div class="col"> 
                    <label for="mensalidade">Mensalidade (R$)<font color="red">*</font></label>
                    <input type="text" class="form-control" id="mensalidade" name="mensalidade" value="'.$row['mensalidade'] .'" required>
                </div>

                <!-- formatando Mensalidade -->
                <script type="text/javascript">
                $("#mensalidade").mask("R$ 00,00");
                </script>
                            
            <!-- <div class="row">
                <div class="col"> 
                    <label for="datacad">Data de Cadastro</label>
                    <input type="date" class="form-control" id="datacad" name="datacad" readonly>
                </div>
                <div class="col"> 
                    <label for="dataultalter">Data Ultima Atera&ccedil;&atilde;o</label>
                    <input type="date" class="form-control" id="dataultalter" name="dataultalter" readonly>
                </div>
                <div class="col"> 
                    <label for="userultalter">Usu&aacute;rio Ult. Atera&ccedil;&atilde;o </label>
                    <input type="text" class="form-control" id="userultalter" name="userultalter" readonly>
                </div>  -->               
            </div>
            <br/>
            <br/>
            <br/>
            <!-- btns -->
            <br />
            <div class="container">
            <div class="row">
                <div class="col text-center">
                    <input type="hidden" id="acao" name="acao" value="alterar">
                    <input type="hidden" id="user" name="alunoData" value="'.$aluno.'">
                    <a href="#"><button type="submit" class="btn btn-primary btn-sm">Alterar </button></a>
                    <a href="abertura.php"><button class="btn btn-danger btn-sm">Cancelar </button></a>
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
