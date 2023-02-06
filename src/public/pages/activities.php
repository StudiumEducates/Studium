<?php
   session_start();
   include_once('../../include/config.php');
   $turma = $_SESSION['turma'];
   $session_type = $_SESSION['session_type'];
   if($session_type != 'aluno - '.$turma){
       header("location:login");
   }

   $turma_BD = $turma;
   $turma_BD = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$turma_BD);

   $sql = "SELECT * FROM `$turma_BD`";

   $tipo = "Atividade";
   date_default_timezone_set('America/Sao_Paulo');
   $date_today = date('Y-m-d');
   $date_tomorrow = date('Y-m-d', strtotime('+1 day'));
?>
<html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png" />
    <link rel="stylesheet" href="./src/public/css/defaultpage.css">
    <link rel="stylesheet" href="./src/public/css/activities.css">
    <link rel="stylesheet" href="./src/public/css/root.css">
    <title>Studium - Atividades</title>
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
    
            <a href="atividades" class="Option" id="this">
                <img id="this_img" src="./src/public/midia/icon_menu/icon_white/activities.png">
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
    
            <a href="horario" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/schedules.png">
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
        <div class="today">
                <p class="p-title">HOJE</p>
                <div class="blocks">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today == $user_data['daty'] and $tipo == $user_data['tipo'] and isset($user_data['disciplina']) and date('H') <= 17){
                                echo "<div class='block'>";
                                echo "<p class='p-mat'>Atividade de ".$user_data['disciplina']."</p>";
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention = $date_convention->format('d/m/Y');
                                echo "<p class='p-dat'>Data de entrega: ".$date_convention."</p>";
                                echo "<p class='p-desc'>".$user_data['descricao']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            if(date('H') >= 17){
                                echo "<p class='no-activity-p'>Boa noite!</p>";
                                echo "<img class='no-activity-img' src='./src/public/midia/GIFs/animation_04.gif'>";
                            }else{
                                echo "<p class='no-activity-p'>Você não tem tarefas para hoje.<br>Volte mais tarde para ver se há algo novo.</p>";
                                echo "<img class='no-activity-img' src='./src/public/midia/GIFs/animation_01.gif'>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
            <div class="tomorrow">
                <p class="p-title">AMANHÃ</p>
                <div class="blocks">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_tomorrow == $user_data['daty'] and $tipo == $user_data['tipo'] and isset($user_data['disciplina'])){
                                echo "<div class='block'>";
                                echo "<p class='p-mat'>Atividade de ".$user_data['disciplina']."</p>";
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention = $date_convention->format('d/m/Y');
                                echo "<p class='p-dat'>Data de entrega: ".$date_convention."</p>";
                                echo "<p class='p-desc'>".$user_data['descricao']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            echo "<p class='no-activity-p'>Você não tem tarefas para amanhã.<br>Volte mais tarde para ver se há algo novo.</p>";
                            echo "<img class='no-activity-img' src='./src/public/midia/GIFs/animation_02.gif'>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
            <div class="others">
                <p class="p-title">OUTRAS</p>
                <div class="blocks">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today < $user_data['daty'] and $date_tomorrow < $user_data['daty'] and $tipo == $user_data['tipo'] and isset($user_data['disciplina'])){
                                echo "<div class='block'>";
                                echo "<p class='p-mat'>Atividade de ".$user_data['disciplina']."</p>";
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention = $date_convention->format('d/m/Y');
                                echo "<p class='p-dat'>Data de entrega: ".$date_convention."</p>";
                                echo "<p class='p-desc'>".$user_data['descricao']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            echo "<p class='no-activity-p'>Você não tem outras tarefas no momento.<br>Volte mais tarde para ver se há algo novo.</p>";
                            echo "<img class='no-activity-img' src='./src/public/midia/GIFs/animation_03.gif'>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="./src/public/js/proportion.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>
</html>