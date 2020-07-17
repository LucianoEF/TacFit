<?php
     
    require '../core/Database.php';
 
    if ( !empty($_POST)) {
        $acao = $_POST['acao'];
        // armazenar os valores enviados do formulario em variaves

        if ($acao == 'cadastrar'){
            $tipo = $_POST['tipo'];
            $nome = $_POST['nome'];
            $dtnasc = $_POST['dtnasc'];
            // converter data para o formato do MySQL
            $dtnasc = date("Y-m-d",strtotime(str_replace('/','-',$dtnasc)));  
            $telfixo = $_POST['telfixo'];
            $celular = $_POST['celular'];
            $contato = $_POST['contato'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $plano = $_POST['plano'];
            $mensalidade = $_POST['mensalidade'];

            //inserir os dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO alunos_tbl (tipo, nome, dtnasc, telfixo, celular, contato, endereco, numero, cep, bairro, complemento, cidade, uf, cpf, rg, plano, mensalidade) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipo, $nome, $dtnasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpf, $rg, $plano, $mensalidade));
            Database::disconnect();
            
            //redireciona para a grid meusAlunos
            if($q >=1) {
                echo "<script>alert('Registro inserido na Base de Dados!');document.location='../visual/meusAlunos.php'</script>";
            }
        }        

        if ($acao == 'apagar'){
            //apagar registro
            $id = $_POST['idUser'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM alunos_tbl WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            //redireciona para a grid meusAlunos
            if($q >=1) {
                echo "<script>alert('Registro Apagado na Base de Dados!');document.location='../visual/meusAlunos.php'</script>";
            }
        }

        if ($acao == 'alterar'){
            $usrData = $_POST['alunoData'];
            $tipo = $_POST['tipo'];
            $nome = $_POST['nome'];
            $dtnasc = $_POST['dtnasc'];
            // converter data para o formato do MySQL
            $dtnasc = date("Y-m-d",strtotime($dtnasc));  
            $telfixo = $_POST['telfixo'];
            $celular = $_POST['celular'];
            $contato = $_POST['contato'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $plano = $_POST['plano'];
            $mensalidade = $_POST['mensalidade'];

            //realizar a alteração dos dados na base de dados.
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE alunos_tbl SET tipo=?, nome=?, dtnasc=?, telfixo=?, celular=?, contato=?, endereco=?, numero=?, cep=?, bairro=?, complemento=?, cidade=?, uf=?, cpf=?, rg=?, plano=?, mensalidade=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipo, $nome, $dtnasc, $telfixo, $celular, $contato, $endereco, $numero, $cep, $bairro, $complemento, $cidade, $uf, $cpf, $rg, $plano, $mensalidade, $usrData));
            Database::disconnect();

            //redireciona para a Grid meusAlunos
            if($q >=1) {
                echo "<script>alert('Registro alterado na Base de Dados!');document.location='../visual/meusAlunos.php'</script>";
            }
        }
    }