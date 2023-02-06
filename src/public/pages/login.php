<?php 
    include_once('../../include/config.php');

    $sql_turmas = "SELECT * FROM turmas";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png"/>
    <link rel="stylesheet" href="./src/public/css/login.css">
    <link href="./src/public/css/root.css" rel="stylesheet">
    <title>Studium</title>
</head>
<body onload="loading()">
    <div id="action_area">
        <div id="logo">
            <div id="icon"><p>St</p></div>
            <p id="title">Studium</p>
        </div>
    </div>
    <main>
        <div id="block">
            <p id="p1">Acessar Conta</p>
            <p id="p2">Selecione o tipo de conta</p>
            <form action="verification" method="post">
                <div id="radio">
                    <input type="radio" name="type" value="Aluno" id="aluno_radio" required onclick="turma()" onfocus="aluno()">
                    <label>Aluno</label>
                    <input type="radio" name="type" value="Representante" id="representante_radio" required onclick="turma()" onfocus="representante()">
                    <label>Representante</label>
                    <input type="radio" name="type" value="Administração" id="administração_radio" required onclick="nome()" onfocus="administracao()">
                    <label>Administração</label>
                </div>
                <label id="name">Turma</label>
                <div id="input_text">
                </div>
                <select name="select" id="select">
                        <option id="select_one"></option>
                        <script>let class_ = sessionStorage.getItem('Class'); </script>
                        <?php
                            $result_turma = $conexao_adm->query($sql_turmas);
                            while($user_data = mysqli_fetch_assoc($result_turma))
                            {
                                echo "
                                    <script>
                                        if(class_ != '".$user_data['turma']."'){
                                            document.write('<option>".$user_data['turma']."</option>');
                                        }
                                    </script>
                                ";
                            }
                        ?>
                </select>
                <label id="cod_l">Código</label>
                <input type="password" id="cod" name="cod" required>
                <span id="span">ಠ⁠_⁠ಠ Código incorreto!</span>
                <div id="reCAPTCHA"><div><div id="ani"></div><div class="g-recaptcha" data-sitekey="6LefLe4jAAAAACNTPWKXzOpUprpub4cw5dzppHp_"></div></div></div>
                <span id="reCAP">ಠಿ⁠_⁠ಠ Responda o reCAPTCHA!</span>
                <input type="submit" value="Entrar" id="enviar" name="enviar" onclick="return reCAPTCHA()">
            </form>
        </div>
    </main>
    <script src="./src/public/js/login.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>