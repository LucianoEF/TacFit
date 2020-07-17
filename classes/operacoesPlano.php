<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $plano = $_POST['plano'];
            $valor = $_POST['valor'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO plano_tbl (plano, valor) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($plano, $valor));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/meusPlanos.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM plano_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/meusPlanos.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['planoData'];
            $plano = $_POST['plano'];
            $valor = $_POST['valor'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE plano_tbl SET plano=?, valor=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($plano, $valor, $usrData));
            Database::disconnect();

            //redireciona para a Grid meusPlanos
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/meusPlanos.php'</script>";
            }
        }
    }