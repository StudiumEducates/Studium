<?php 
    session_start();
    include_once('../../include/config.php');
    $nome = $_SESSION['nome'];
    $session_type = $_SESSION['session_type'];
    if($session_type != 'administration - '.$nome){
        header("location: login");
    }
    $sql_aluno = "SELECT * FROM turmas ORDER BY id";
    $sql_lider = "SELECT * FROM representantes ORDER BY id";
    if(isset($_POST['submit-criar']))
    {
        $nome_turma = $_POST['nome_turma'];
        $turma_BD = $nome_turma;
        $turma_BD = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$turma_BD);
        $cod_aluno = rand(1000, 9999);
        $cod_lider = rand(100000, 999999);

        $result = $conexao_adm->query($sql_aluno);
        while($user_data = mysqli_fetch_assoc($result))
        {
            if($cod_aluno == $user_data['cod']){
                $cod_aluno = $cod_aluno + 13;
            }
        }

        $result = $conexao_adm->query($sql_lider);
        while($user_data = mysqli_fetch_assoc($result))
        {
            if($cod_lider == $user_data['cod']){
                $cod_lider = $cod_lider + 13;
            }
        }
        
        $result = mysqli_query($conexao_adm, "INSERT INTO turmas (turma,cod) VALUES ('$nome_turma','$cod_aluno')");
        $result = mysqli_query($conexao_adm, "INSERT INTO representantes (turma,cod) VALUES ('$nome_turma','$cod_lider')");

        $result = mysqli_query($conexao_turma, "CREATE TABLE `$turma_BD` (
            `tipo` varchar(15) NOT NULL,
            `disciplina` varchar(50) NOT NULL,
            `descricao` varchar(100) NOT NULL,
            `daty` date NOT NULL,
            `id` int(100) PRIMARY KEY AUTO_INCREMENT
        )");

        $result = mysqli_query($conexao_turma, "CREATE TABLE `$turma_BD - horario` (
            `clock` varchar(20) NOT NULL,
            `Monday` varchar(20) NOT NULL,
            `Tuesday` varchar(20) NOT NULL,
            `Wednesday` varchar(20) NOT NULL,
            `Thursday` varchar(20) NOT NULL,
            `Friday` varchar(20) NOT NULL,
            `id` int(100) PRIMARY KEY AUTO_INCREMENT
        )");
        header('Location:administracao');
    }

    if(isset($_POST['submit-apagar']))
    {
        $select = $_POST['turma'];

        $result = mysqli_query($conexao_adm, "DELETE FROM turmas WHERE turma = ('$select')");
        $result = mysqli_query($conexao_adm, "DELETE FROM representantes WHERE turma = ('$select')");
        $select = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$select);
        $result = mysqli_query($conexao_turma, "DROP TABLE `$select`");
        $result = mysqli_query($conexao_turma, "DROP TABLE `$select - horario`");
        header('Location:administracao');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png"/>
    <link rel="stylesheet" href="./src/public/css/management.css">
    <link href="./src/public/css/root.css" rel="stylesheet">
    <title>Studium - Administrador <?php echo $nome;?></title>
</head>
<body>
    <header>
        <img src="./src/public/midia/logo_studium.png">
        <p><b>Studium </b> - Administração</p>
        <button onclick="window.location.href = 'logout'"></button>
    </header>
    <main id="decrease">
        <div id="turmas">
            <p>Turmas</p>
            <div id="container_turmas">
                <?php
                    $result_lider = $conexao_adm->query($sql_lider);
                    $result_turma = $conexao_adm->query($sql_aluno);
                    while($user_data = mysqli_fetch_assoc($result_turma))
                    {
                        $user_lider = mysqli_fetch_assoc($result_lider);
                        echo "<div>";
                            echo "<p1>".$user_data['turma']."</p1>";
                            echo "<p2> Código: ".$user_data['cod']."</p2>";
                            echo "<p2> Representante: ".$user_lider['cod']."</p2>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <div id="vertical">
            <div class="Criar_Apagar_turma">
                <p>Criar turma</p>
                <form action="administracao" method="POST">
                    <input type="text" name="nome_turma" placeholder="Nome da turma" maxlength="16" required>
                    <input type="submit" name="submit-criar" value="Criar" class="button" id="criar">
                </form>
            </div>
            <div class="Criar_Apagar_turma">
                <p>Apagar turma</p>
                <form action="administracao" method="POST">
                    <select name="turma">
                        <?php
                            $result_turma = $conexao_adm->query($sql_aluno);
                            while($user_data = mysqli_fetch_assoc($result_turma))
                            {
                                echo "<option>".$user_data['turma']."</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" name="submit-apagar" value="Apagar" class="button" id="apagar">
                </form> 
            </div>
        </div>
    </main>
     <script src="./src/public/js/management.js"></script>
</body>
</html>