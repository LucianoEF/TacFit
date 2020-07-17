<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $nomeexe = $_POST['nomeexe'];
            $objetivo = $_POST['objetivo'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO exercicio_tbl (categoria, nomeexe, objetivo) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $nomeexe, $objetivo));
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
            $sql = "DELETE FROM exercicio_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['exeData'];
            $categoria = $_POST['categoria'];
            $nomeexe = $_POST['nomeexe'];
            $objetivo = $_POST['objetivo'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE exercicio_tbl SET categoria=?, nomeexe=?, objetivo=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $nomeexe, $objetivo, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }
    }