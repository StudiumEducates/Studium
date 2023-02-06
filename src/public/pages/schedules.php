<?php
   session_start();
   include_once('../../include/config.php');
   $turma = $_SESSION['turma'];
   $session_type = $_SESSION['session_type'];
   if($session_type != 'aluno - '.$turma){
       header("location: login");
   }

   $turma_BD = $turma;
   $turma_BD = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$turma_BD);

   $sql = "SELECT * FROM `$turma_BD - horario`";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png" />
    <link rel="stylesheet" href="./src/public/css/defaultpage.css">
    <link rel="stylesheet" href="./src/public/css/schedules.css">
    <link rel="stylesheet" href="./src/public/css/root.css">
    <title>Studium - Horário</title>
</head>
<body>
    <header id="header">
        <button onfocusout="move_D()" onclick="move_A()"><img src="./src/public/midia/icon_menu/icon_white/menu.png"></button>
        <p>Studium</p>
    </header>
    <main id="app">
        <nav id="side_bar">
            <div id="logo">
                <button onclick="move_D()"><img src="./src/public/midia/icon_menu/icon_blue/decrease_mobile.png"></button>
                <p>Studium</p>
            </div>

            <div id="menu_expand">
                <img src="./src/public/midia/icon_menu/icon_white/menu.png" onclick="move()">
            </div>
    
            <div id="logo_menu">
                <div id="logo_icon">St</div>
                <p id="Studium" >Studium</p>
            </div>
    
            <a href="home" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/home.png">
                <p class="title_option">Página principal</p>
            </a>
    
            <a href="atividades" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/activities.png">
                <p class="title_option">Atividades</p>
            </a>

            <a href="trabalhos" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/works.png">
                <p class="title_option">Trabalhos</p>
            </a>
    
            <a href="provas" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/assessments.png">
                <p class="title_option">Provas</p>
            </a>
    
            <a href="horario" class="Option" id="this">
                <img id="this_img" src="./src/public/midia/icon_menu/icon_white/schedules.png">
                <p class="title_option">Horário</p>
            </a>
    
            <a href="sobre_nos" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/about_us.png">
                <p class="title_option">Sobre nós</p>
            </a>
    
            <div id="menu_back" onclick="move()">
                <img src="./src/public/midia/icon_menu/icon_white/decrease.png">
                <p class="title_option">Recolher menu</p>        
            </div>

            <hr id="line"></hr>

            <div id="logout" onclick="window.location.href = 'logout'">
                <img id="exit_img" src="./src/public/midia/icon_menu/icon_white/leave.png">
                <p id="exit_p">Sair da página</p>        
            </div>
        </nav>
        <div id="filter"></div>
        <div id="container">
            <div id="horario">
                <table>
                    <tr id="days">
                        <th id="clock">Horário</th>
                        <th>Segunda-Feira</th>
                        <th>Terça-Feira</th>
                        <th>Quarta-Feira</th>
                        <th>Quinta-Feira</th>
                        <th>Sexta-Feira</th>
                    </tr>
                        <?php 
                            $result = $conexao_turma->query($sql);
                            while($user_data = mysqli_fetch_assoc($result)){
                                echo 
                                "<tr>
                                    <th id='clock'>".$user_data['clock']."</th>
                                    <th>".$user_data['Monday']."</th>
                                    <th>".$user_data['Tuesday']."</th>
                                    <th>".$user_data['Wednesday']."</th>
                                    <th>".$user_data['Thursday']."</th>
                                    <th>".$user_data['Friday']."</th>
                                </tr>";
                            }
                        ?>
                </table>
            </div>
        </div>
    </main>
    <script src="./src/public/js/proportion.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>
</html>