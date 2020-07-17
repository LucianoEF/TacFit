<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $formaspgto = $_POST['formaspgto'];
            $observacao = $_POST['observacao'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO formaspgto_tbl (formaspgto, observacao) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($formaspgto, $observacao));
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
            $sql = "DELETE FROM formaspgto_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $formaspgtoData = $_POST['formaspgtoData'];
            $formaspgto = $_POST['formaspgto'];
            $observacao = $_POST['observacao'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE formaspgto_tbl SET formaspgto=?, observacao=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($formaspgto, $observacao, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }
    }