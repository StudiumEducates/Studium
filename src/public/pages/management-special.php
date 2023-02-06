<?php 
    session_start();
    include_once('../../include/config.php');
    $nome = $_SESSION['nome'];
    $session_type = $_SESSION['session_type'];
    $special = $_SESSION['special'];
    if($session_type != 'administration - '.$nome or $special != 'true'){
        header("location:login");
    }
    $sql_aluno = "SELECT * FROM turmas ORDER BY id";
    $sql_lider = "SELECT * FROM representantes ORDER BY id";
    $sql_adm = "SELECT * FROM administracao ORDER BY id";
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
        header('Location:administrador');
    }

    if(isset($_POST['submit-criar-adm']))
    {
        $nome_adm = $_POST['nome_adm'];
        $special = $_POST['special'];
        $cod_adm = rand(10000000, 99999999);

        $result = $conexao_adm->query($sql_adm);
        while($user_data = mysqli_fetch_assoc($result))
        {
            if($cod_adm == $user_data['cod']){
                $cod_adm = $cod_adm + 13;
            }
        }
        
        $result = mysqli_query($conexao_adm, "INSERT INTO administracao (nome,special,cod) VALUES ('$nome_adm','$special','$cod_adm')");
        header('Location:administrador');
    }

    if(isset($_POST['submit-apagar']))
    {
        $select = $_POST['turma'];

        $result = mysqli_query($conexao_adm, "DELETE FROM turmas WHERE turma = ('$select')");
        $result = mysqli_query($conexao_adm, "DELETE FROM representantes WHERE turma = ('$select')");
        $select = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$select);
        $result = mysqli_query($conexao_turma, "DROP TABLE `$select`");
        $result = mysqli_query($conexao_turma, "DROP TABLE `$select - horario`");
        header('Location:administrador');
    }

    if(isset($_POST['submit-apagar-adm']))
    {
        $select = $_POST['nome'];

        $result = mysqli_query($conexao_adm, "DELETE FROM administracao WHERE nome = ('$select')");
        header('Location:administrador');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png"/>
    <link rel="stylesheet" href="./src/public/css/management-special.css">
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
        <div class="vertical">
            <p>Criar turma</p>
            <form action="administrador" method="POST">
                <input type="text" name="nome_turma" placeholder="Nome da turma" maxlength="16" required>
                <input type="submit" name="submit-criar" value="Criar" class="button" id="criar">
            </form>
            <p>Apagar turma</p>
            <form action="administrador" method="POST">
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
        <div id="turmas">
            <p>Administradores</p>
            <div id="container_turmas">
                <?php
                    $result_adm = $conexao_adm->query($sql_adm);
                    while($user_data = mysqli_fetch_assoc($result_adm))
                    {
                        echo "<div>";
                            echo "<p1>".$user_data['nome']."</p1>";
                            echo "<p2> Código: ".$user_data['cod']."</p2>";
                            if($user_data['special'] == 'true'){
                                echo "<p2> Acesso especial: SIM</p2>";
                            }else{
                                echo "<p2> Acesso especial: NÃO</p2>";
                            }
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <div class="vertical" id="oi">
            <p>Criar novo administrador</p>
            <form action="administrador" method="POST">
                <input type="text" name="nome_adm" placeholder="Nome do administrador" maxlength="16" required>
                <div id="special">
                    <input type="radio" name="special" value="false">
                    <label>Administrador comum</label>
                    <input type="radio" name="special" value="true">
                    <label>Administrador especial</label>
                </div>
                <input type="submit" name="submit-criar-adm" value="Criar" class="button" id="criar">
            </form>
            <p>Apagar administrador</p>
            <form action="administrador" method="POST">
                <select name="nome">
                    <?php
                        $result_adm = $conexao_adm->query($sql_adm);
                        while($user_data = mysqli_fetch_assoc($result_adm))
                        {
                            echo "<option>".$user_data['nome']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="submit-apagar-adm" value="Apagar" class="button" id="apagar">
            </form> 
        </div> 
    </main>
     <script src="./src/public/js/management-special.js"></script>
</body>
</html>