<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $mesreferencia = $_POST['mesreferencia'];
            $statuss = $_POST['statuss'];
            $datavenc = $_POST['datavenc'];
            $nome = $_POST['nome'];
            $datapgto = $_POST['datapgto'];
            $formaspgto = $_POST['formaspgto'];
            $valor = $_POST['valor'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO recebimentos_tbl (mesreferencia, statuss, datavenc, nome, datapgto, formaspgto, valor) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($mesreferencia, $statuss, $datavenc, $nome, $datapgto, $formaspgto, $valor));
            Database::disconnect();
            
            //redireciona para o formulario de inserção
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/meusRecebimentos.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM recebimentos_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $recebimentosData = $_POST['recebimentosData'];
            $mesreferencia = $_POST['mesreferencia'];
            $statuss = $_POST['statuss'];
            $datavenc = $_POST['datavenc'];
            $nome = $_POST['nome'];
            $datapgto = $_POST['datapgto'];
            $formaspgto = $_POST['formaspgto'];
            $valor = $_POST['valor'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE recebimentos_tbl SET mesreferencia=?, statuss=?, datavenc=?, nome=?, datapgto=?, formaspgto=?, valor=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($mesreferencia, $statuss, $datavenc, $nome, $datapgto, $formaspgto, $valor, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/meusRecebimentos.php'</script>";
            }
        }
    }