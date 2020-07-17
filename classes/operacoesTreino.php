<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $categoria = $_POST['categoria'];
            $nometreino = $_POST['nometreino'];
            $nomeexe = $_POST['nomeexe'];
            $repeticoes = $_POST['repeticoes'];
            $intervalo = $_POST['intervalo'];
            $nomeexe1 = $_POST['nomeexe1'];
            $repeticoes1 = $_POST['repeticoes1'];
            $intervalo1 = $_POST['intervalo1'];
            $nomeexe2 = $_POST['nomeexe2'];
            $repeticoes2 = $_POST['repeticoes2'];
            $intervalo2 = $_POST['intervalo2'];
            $nomeexe3 = $_POST['nomeexe3'];
            $repeticoes3 = $_POST['repeticoes3'];
            $intervalo3 = $_POST['intervalo3'];
            $nomeexe4 = $_POST['nomeexe4'];
            $repeticoes4 = $_POST['repeticoes4'];
            $intervalo4 = $_POST['intervalo4'];
            $nomeexe5 = $_POST['nomeexe5'];
            $repeticoes5 = $_POST['repeticoes5'];
            $intervalo5 = $_POST['intervalo5'];
            $nomeexe6 = $_POST['nomeexe6'];
            $repeticoes6 = $_POST['repeticoes6'];
            $intervalo6 = $_POST['intervalo6'];
            $nomeexe7 = $_POST['nomeexe7'];
            $repeticoes7 = $_POST['repeticoes7'];
            $intervalo7 = $_POST['intervalo7'];
            $nomeexe8 = $_POST['nomeexe8'];
            $repeticoes8 = $_POST['repeticoes8'];
            $intervalo8 = $_POST['intervalo8'];
            $nomeexe9 = $_POST['nomeexe9'];
            $repeticoes9 = $_POST['repeticoes9'];
            $intervalo9 = $_POST['intervalo9'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO treino_tbl (categoria, nometreino, nomeexe, repeticoes, intervalo, nomeexe1, repeticoes1, intervalo1, nomeexe2, repeticoes2, intervalo2, nomeexe3, repeticoes3, intervalo3, nomeexe4, repeticoes4, intervalo4, nomeexe5, repeticoes5, intervalo5, nomeexe6, repeticoes6, intervalo6, nomeexe7, repeticoes7, intervalo7, nomeexe8, repeticoes8, intervalo8, nomeexe9, repeticoes9, intervalo9) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $nometreino, $nomeexe, $repeticoes, $intervalo, $nomeexe1, $repeticoes1, $intervalo1, $nomeexe2, $repeticoes2, $intervalo2, $nomeexe3, $repeticoes3, $intervalo3, $nomeexe4, $repeticoes4, $intervalo4, $nomeexe5, $repeticoes5, $intervalo5, $nomeexe6, $repeticoes6, $intervalo6, $nomeexe7, $repeticoes7, $intervalo7, $nomeexe8, $repeticoes8, $intervalo8, $nomeexe9, $repeticoes9, $intervalo9));
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
            $sql = "DELETE FROM treino_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid usuarios
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['treinoData'];
            $categoria = $_POST['categoria'];
            $nometreino = $_POST['nometreino'];
            $nomeexe = $_POST['nomeexe'];
            $repeticoes = $_POST['repeticoes'];
            $intervalo = $_POST['intervalo'];
            $nomeexe1 = $_POST['nomeexe1'];
            $repeticoes1 = $_POST['repeticoes1'];
            $intervalo1 = $_POST['intervalo1'];
            $nomeexe2 = $_POST['nomeexe2'];
            $repeticoes2 = $_POST['repeticoes2'];
            $intervalo2 = $_POST['intervalo2'];
            $nomeexe3 = $_POST['nomeexe3'];
            $repeticoes3 = $_POST['repeticoes3'];
            $intervalo3 = $_POST['intervalo3'];
            $nomeexe4 = $_POST['nomeexe4'];
            $repeticoes4 = $_POST['repeticoes4'];
            $intervalo4 = $_POST['intervalo4'];
            $nomeexe5 = $_POST['nomeexe5'];
            $repeticoes5 = $_POST['repeticoes5'];
            $intervalo5 = $_POST['intervalo5'];
            $nomeexe6 = $_POST['nomeexe6'];
            $repeticoes6 = $_POST['repeticoes6'];
            $intervalo6 = $_POST['intervalo6'];
            $nomeexe7 = $_POST['nomeexe7'];
            $repeticoes7 = $_POST['repeticoes7'];
            $intervalo7 = $_POST['intervalo7'];
            $nomeexe8 = $_POST['nomeexe8'];
            $repeticoes8 = $_POST['repeticoes8'];
            $intervalo8 = $_POST['intervalo8'];
            $nomeexe9 = $_POST['nomeexe9'];
            $repeticoes9 = $_POST['repeticoes9'];
            $intervalo9 = $_POST['intervalo9'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE treino_tbl SET categoria=?, nometreino=?, nomeexe=?, repeticoes=?, intervalo=?, nomeexe1=?, repeticoes1=?, intervalo1=?, nomeexe2=?, repeticoes2=?, intervalo2=?, nomeexe3=?, repeticoes3=?, intervalo3=?, nomeexe4=?, repeticoes4=?, intervalo4=?, nomeexe5=?, repeticoes5=?, intervalo5=?, nomeexe6=?, repeticoes6=?, intervalo6=?, nomeexe7=?, repeticoes7=?, intervalo7=?, nomeexe8=?, repeticoes8=?, intervalo8=?, nomeexe9=?, repeticoes9=?, intervalo9=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria, $nometreino, $nomeexe, $repeticoes, $intervalo, $nomeexe1, $repeticoes1, $intervalo1, $nomeexe2, $repeticoes2, $intervalo2, $nomeexe3, $repeticoes3, $intervalo3, $nomeexe4, $repeticoes4, $intervalo4, $nomeexe5, $repeticoes5, $intervalo5, $nomeexe6, $repeticoes6, $intervalo6, $nomeexe7, $repeticoes7, $intervalo7, $nomeexe8, $repeticoes8, $intervalo8, $nomeexe9, $repeticoes9, $intervalo9, $usrData));
            Database::disconnect();

            //redireciona para a abertura
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/abertura.php'</script>";
            }
        }
    }