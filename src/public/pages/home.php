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

    $sql = "SELECT * FROM `$turma_BD`";

   date_default_timezone_set('America/Sao_Paulo');
   $date_today = date('Y-m-d');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png" />
    <link rel="stylesheet" href="./src/public/css/defaultpage.css">
    <link rel="stylesheet" href="./src/public/css/home.css">
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
    
            <a href="home" class="Option" id="this">
                <img id="this_img" src="./src/public/midia/icon_menu/icon_white/home.png">
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
        <div id="container_mobile">
            <div id="filter"></div>
            <div id="ativ_today">
                <div id="header_ativ">
                    <p1><?php echo mb_strtoupper($turma); ?></p1>
                    <p2>Para hoje</p2>
                </div>
                <hr></hr>
                <div id="atividades">
                <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today == $user_data['daty'] and isset($user_data['disciplina'])){
                                echo "<p id='Atividade_block'>".$user_data['tipo']." de ".$user_data['disciplina']."</p>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<p id='no-activity-p'>Você não tem tarefas para hoje.<br>Volte mais tarde para ver se há algo novo.</p>";
                        }
                    ?>
                </div>
            </div>
            <div id="container_objects">
                <div id="other_objects">
                    <p id="other_objects_p">Outras atividades pendentes</p>
                    <hr></hr>
                    <div id="other">
                        <?php
                            $cont = 0;
                            $result = $conexao_turma->query($sql);
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention_daty = $date_convention->format('d/m/Y');
                                $date_convention_d = $date_convention->format('d');
                                $date_convention_m = $date_convention->format('m');
                                $date_convention_y = $date_convention->format('Y');
                                if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                    if("Atividade" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                        echo "<p id='Atividade_block'>".$user_data['tipo']." de ".$user_data['disciplina']." - ".$date_convention_daty."</p>";
                                        $cont++;
                                    }
                                }
                            }
                            if($cont == 0){
                                echo "<p id='no-activity-p'>Você não tem atividades.<br>Volte mais tarde para ver se há algo novo.</p>";
                            }
                        ?>
                    </div>
                </div>
                <div id="other_objects">
                    <p id="other_objects_p">Outros trabalhos pendentes</p>
                    <hr></hr>
                    <div id="other">
                        <?php
                            $cont = 0;
                            $result = $conexao_turma->query($sql);
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention_daty = $date_convention->format('d/m/Y');
                                $date_convention_d = $date_convention->format('d');
                                $date_convention_m = $date_convention->format('m');
                                $date_convention_y = $date_convention->format('Y');
                                if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                    if("Trabalho" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                        echo "<p id='Atividade_block'>".$user_data['tipo']." de ".$user_data['disciplina']." - ".$date_convention_daty."</p>";
                                        $cont++;
                                    }
                                }
                            }
                            if($cont == 0){
                                echo "<p id='no-activity-p'>Você não tem atividades.<br>Volte mais tarde para ver se há algo novo.</p>";
                            }
                        ?>
                    </div>
                </div>
                <div id="other_objects" style="margin-bottom: 8.5px;">
                    <p id="other_objects_p">Outras provas pendentes</p>
                    <hr></hr>
                    <div id="other">
                        <?php
                            $cont = 0;
                            $result = $conexao_turma->query($sql);
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                $date_convention = new DateTime($user_data['daty']);
                                $date_convention_daty = $date_convention->format('d/m/Y');
                                $date_convention_d = $date_convention->format('d');
                                $date_convention_m = $date_convention->format('m');
                                $date_convention_y = $date_convention->format('Y');
                                if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                    if("Prova" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                        echo "<p id='Atividade_block'>".$user_data['tipo']." de ".$user_data['disciplina']." - ".$date_convention_daty."</p>";
                                        $cont++;
                                    }
                                }
                            }
                            if($cont == 0){
                                echo "<p id='no-activity-p'>Você não tem provas.<br>Volte mais tarde para ver se há algo novo.</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="banner">
                <p class="text-turma"><?php echo mb_strtoupper($turma); ?></p>
            </div>
            <div id="ativ_today"></div>
            <div class="blocks-outstanding">
                <div class="block">
                    <div class="block-top">
                        <p class="block-title">Atividades</p>
                        <div class="warning">Para hoje!</div>
                    </div>
                    <div class="grid">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today == $user_data['daty'] and "Atividade" == $user_data['tipo'] and isset($user_data['disciplina'])){
                                echo "<div class='block-activity'>";
                                echo "<p class='p-mat'>Atividade de ".$user_data['disciplina']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            echo "<p class='no-activity-p'>Você não tem tarefas para hoje.<br>Volte mais tarde para ver se há algo novo.</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>
                </div>
                <div class="block">
                    <div class="block-top">
                        <p class="block-title">Trabalhos</p>
                        <div class="warning">Para hoje!</div>
                    </div>
                    <div class="grid">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today == $user_data['daty'] and "Trabalho" == $user_data['tipo'] and isset($user_data['disciplina'])){
                                echo "<div class='block-activity'>";
                                echo "<p class='p-mat'>Trabalho de ".$user_data['disciplina']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            echo "<p class='no-activity-p'>Você não tem trabalhos para hoje.<br>Volte mais tarde para ver se há algo novo.</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>
                </div>
                <div class="block">
                    <div class="block-top">
                        <p class="block-title">Provas</p>
                        <div class="warning">Para hoje!</div>
                    </div>
                    <div class="grid">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            if($date_today == $user_data['daty'] and "Prova" == $user_data['tipo'] and isset($user_data['disciplina'])){
                                echo "<div class='block-activity'>";
                                echo "<p class='p-mat'>Prova de ".$user_data['disciplina']."</p>";
                                echo "</div>";
                                $cont++;
                            }
                        }
                        if($cont == 0){
                            echo "<div class='no-activity'>";
                            echo "<div class='no-activity-background'>";
                            echo "<p class='no-activity-p'>Você não tem provas para hoje.<br>Volte mais tarde para ver se há algo novo.</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="blocks-total">
                <div class="block">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            $date_convention = new DateTime($user_data['daty']);
                            $date_convention_d = $date_convention->format('d');
                            $date_convention_m = $date_convention->format('m');
                            $date_convention_y = $date_convention->format('Y');
                            if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                if("Atividade" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                    $cont++;
                                }
                            }
                            if(date('Y-m-d')== $user_data['daty'] and date('H') >= 17 and "Atividade" == $user_data['tipo']){
                                $cont--;
                            }
                        }
                    ?>
                    <p class="block-title-total">Total de atividades pendentes</p>
                    <div class="box">
                        <img class="icon-ativ" src="./src/public/midia/icon_home/icon-home_01.png">
                        <div>
                            <p class="p-cont"><?php echo str_pad($cont , 2 , '0' , STR_PAD_LEFT) ?></p>
                            <p class="title-box">Atividades</p>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            $date_convention = new DateTime($user_data['daty']);
                            $date_convention_d = $date_convention->format('d');
                            $date_convention_m = $date_convention->format('m');
                            $date_convention_y = $date_convention->format('Y');
                            if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                if("Trabalho" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                    $cont++;
                                }
                            }
                            if(date('Y-m-d')== $user_data['daty'] and date('H') >= 17 and "Trabalho" == $user_data['tipo']){
                                $cont--;
                            }
                        }
                    ?>
                    <p class="block-title-total">Total de trabalhos pendentes</p>
                    <div class="box">
                        <img class="icon-ativ" src="./src/public/midia/icon_home/icon-home_02.png">
                        <div>
                            <p class="p-cont"><?php echo str_pad($cont , 2 , '0' , STR_PAD_LEFT) ?></p>
                            <p class="title-box">Trabalhos</p>
                        </div>
                    </div>
                </div><div class="block">
                    <?php
                        $cont = 0;
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            $date_convention = new DateTime($user_data['daty']);
                            $date_convention_d = $date_convention->format('d');
                            $date_convention_m = $date_convention->format('m');
                            $date_convention_y = $date_convention->format('Y');
                            if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                if("Prova" == $user_data['tipo'] and $date_convention_y >= date('Y')){
                                    $cont++;
                                }
                            }
                            if(date('Y-m-d')== $user_data['daty'] and date('H') >= 17 and "Prova" == $user_data['tipo']){
                                $cont--;
                            }
                        }
                    ?>
                    <p class="block-title-total">Total de provas pendentes</p>
                    <div class="box">
                        <img class="icon-ativ" src="./src/public/midia/icon_home/icon-home_03.png">
                        <div>
                            <p class="p-cont"><?php echo str_pad($cont , 2 , '0' , STR_PAD_LEFT) ?></p>
                            <p class="title-box">Provas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="./src/public/js/proportion.js"></script>
</body>
</html>