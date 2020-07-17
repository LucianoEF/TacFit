<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $nome = $_POST['nome'];
            $dataent = $_POST['dataent'];
            $objetivo = $_POST['objetivo'];
            $nometreino = $_POST['nometreino'];
            $observacao = $_POST['observacao'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $imc = $_POST['imc'];
            $pesominimo = $_POST['pesominimo'];
            $pesomaximo = $_POST['pesomaximo'];
            $diadasemana = $_POST['diadasemana'];
            $horario = $_POST['horario'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ficha_tbl (nome, dataent, objetivo, nometreino, observacao, peso, altura, imc, pesominimo, pesomaximo, diadasemana, horario) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $dataent, $objetivo, $nometreino, $observacao, $peso, $altura, $imc, $pesominimo, $pesomaximo, $diadasemana, $horario));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM ficha_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['fichaData'];
            $nome = $_POST['nome'];
            $dataent = $_POST['dataent'];
            $dataent = date("Y-m-d",strtotime($dataent));
            $objetivo = $_POST['objetivo'];
            $nometreino = $_POST['nometreino'];
            $observacao = $_POST['observacao'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $imc = $_POST['imc'];
            $pesominimo = $_POST['pesominimo'];
            $pesomaximo = $_POST['pesomaximo'];
            $diadasemana = $_POST['diadasemana'];
            $horario = $_POST['horario'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE ficha_tbl SET nome=?, dataent=?, objetivo=?, nometreino=?, observacao=?, peso=?, altura=?, imc=?, pesominimo=?, pesomaximo=?, diadasemana=?, horario=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $dataent, $objetivo, $nometreino, $observacao, $peso, $altura, $imc, $pesominimo, $pesomaximo, $diadasemana, $horario, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/minhasFichas.php'</script>";
            }
        }
    }