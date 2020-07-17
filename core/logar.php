<?php  include "../core/verifica_session.php";
/*Validação de usuários do sistema TacFit.
    Author: Luciano Ferreira
    30/04/2020
 *  */

//Incluir o arquivo de conexão com banco de dados
require 'Database.php';

$usario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$password=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$login=isset($usario)?addslashes(trim($usario)):FALSE;
$senha=isset($password)?md5(trim($password)):FALSE;
//echo $login." <br>";
//echo $senha;

session_start();

/*if (!empty($login) and !empty($senha)){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql=("SELECT * FROM login_tbl WHERE usuario=? AND senha=?");
    $q = $pdo->prepare($sql);
    $q->execute(array($login,$senha));
    $data =$q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}*/

if (!empty($login) and !empty($senha)){
    $pdo = Database::connect();
    include 'nologin.html';
    $sql = ("SELECT id, usuario, senha FROM usuarios_tbl WHERE usuario='$login' AND senha='$senha' and status='Ativo'");
    foreach ($pdo->query($sql) as $linha){
    
        if (!strcmp($senha,$linha["senha"])){
                    $_SESSION["id_usuario"]=$linha["id"];
                    $_SESSION["login"]=$linha["usuario"];
                    header("Location: ../visual/abertura.php");
        }else{
             echo "Voce precisa de usario e senha";
             exit;
        }
    }
}  else {
    //echo "<script>alert('C-A-I FORA!');document.location='../index.php'</script>";
    
    //redireciona para a pagina de erro após 1 segundo
    echo "<script>
         setTimeout(function(){
            window.location.href = 'noCredentials.html';
         }, 1000);
      </script>";
}