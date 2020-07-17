<!-- Verificação de Usuário -->
<?php
    include "../core/verifica_session.php"
?>

<?php
	//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
	$msg = "";
    //começamos a concatenar nossa tabela
    $msg .="<div class='table-responsive'>";
    $msg .="<table class='table table-dark'>";
    $msg .="    <form>";
	$msg .="	    <thead>";
    $msg .="		    <tr>";
    $msg .="			    <th scope='col'>Nome</th>";
    $msg .="			    <th scope='col'>Plano</th>";
	$msg .="			    <th scope='col'>Mensalidade</th>";
    $msg .="                <th scope='col'>...<img src='../img/webIcons/png/040-journal.png' width='35px' height='35px'>...</th>";
    $msg .="                <th scope='col'>....<img src='../img/webIcons/png/104-worldwide.png' width='35px' height='35px'>....</th>";
    $msg .="                <th scope='col'>........<img src='../img/webIcons/png/011-text.png' width='35px' height='35px'>........</th>";
	$msg .="		    </tr>";
	$msg .="	    </thead>";
	$msg .="	    <tbody>";
				
                    //requerimos a classe de conexão
                    include '../core/Database.php';
                        try {
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $resultado = "SELECT * FROM alunos_tbl INNER JOIN ficha_tbl ON alunos_tbl.nome = ficha_tbl.nome WHERE alunos_tbl.nome LIKE '$parametro%' ORDER BY alunos_tbl.nome ASC";
                                    
                            }catch (PDOException $e){
                                echo $e->getMessage();
                            }	
                            //resgata os dados na tabela
                            $pkCount = (is_array($resultado) && count($resultado) >= 0);
                            echo "$pkCount";
                            if($pkCount >= 0){
                                foreach ($pdo->query($resultado) as $res) {

    $msg .="				<tr>";
    $msg .="					<td>".$res['nome']."</td>";
    $msg .="					<td>".$res['plano']."</td>";
    $msg .="					<td>".$res['mensalidade']."</td>";
            
    //Carregar a ficha do aluno
    $msg .="                    <td><a class='btn btn-primary text-center' href='dadosFicha.php?fichaData=" . $res['id'] . "'>Ficha</a></td>";
    
    //Carregar os dados do aluno
    $msg .="                    <td><a class='btn btn-primary text-center' href='dadosAlunos.php?alunoData=" . $res['id'] . "'>Dados</a></td>";
    
    //Carregar as Frequências do aluno        
    $msg .="                    <td><a class='btn btn-primary text-center' href='dadosFrequenciaDiaria.php?frequenciadiariaData=" . $res['id'] . "'>Frequência</a></td>";
	$msg .="				</tr>";
							}	
						}else{
							$msg = "";
							$msg .="Nenhum resultado foi encontrado...";
						}
    $msg .="	    </tbody>";
    $msg .="    </form>";
    $msg .="</table>";
    $msg .="</div>";
	//retorna a msg concatenada
    echo $msg;
    Database::disconnect();
?>