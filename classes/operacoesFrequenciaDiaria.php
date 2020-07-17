<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $mesreferencia = $_POST['mesreferencia'];
            $nome = $_POST['nome'];
            $datatreino = $_POST['datatreino'];
            $presenca = $_POST['presenca'];
            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO frequenciadiaria_tbl (mesreferencia, nome, datatreino, presenca) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($mesreferencia, $nome, $datatreino, $presenca));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/minhasfrequencias.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM frequenciadiaria_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/minhasfrequencias.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $frequenciadiariaData = $_POST['frequenciadiariaData'];
            $mesreferencia = $_POST['mesreferencia'];
            $nome = $_POST['nome'];
            $datatreino = $_POST['datatreino'];
            // converter data para o formato do MySQL
            $datatreino = date("Y-m-d",strtotime($datatreino));
            $presenca = $_POST['presenca'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE frequenciadiaria_tbl SET mesreferencia=?, nome=?, datatreino=?, presenca=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($mesreferencia, $nome, $datatreino, $presenca, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/minhasfrequencias.php'</script>";
            }
        }
    }