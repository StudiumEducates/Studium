<?php
   session_start();
   $turma = $_SESSION['turma'];
   $session_type = $_SESSION['session_type'];
   if($session_type != 'aluno - '.$turma){
       header("location:login");
   }
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png" />
    <link rel="stylesheet" href="./src/public/css/defaultpage.css">
    <link rel="stylesheet" href="./src/public/css/about-us.css">
    <link rel="stylesheet" href="./src/public/css/root.css">
    <link href="//unpkg.com/progressive-image/dist/index.css" rel="stylesheet" type="text/css">
    <title>Studium - Sobre nós</title>
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
    
            <a href="horario" class="Option">
                <img class="img_icon" src="./src/public/midia/icon_menu/icon_white/schedules.png">
                <p class="title_option">Horário</p>
            </a>
    
            <a href="sobre_nos" class="Option" id="this">
                <img id="this_img" src="./src/public/midia/icon_menu/icon_white/about_us.png">
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
            <div id="logo_container"></div>
            <div id="text">
                <p1>Studium</p1>
                <p2>Durante a pandemia do COVID-19, iniciada no começo de 2020, muitas dificuldades apareceram, principalmente ao estudo remoto. Muitos estudantes não conseguiram organizar suas atividades e trabalhos que foram propostos pelos professores da base comum e a técnica. Esta realidade motivou os alunos do Terceiro Ano do Curso Técnico em Informática da Escola Estadual de Educação Profissional Francisca Maura Martins, em Hidrolândia-Ceará, a elaborar e programar uma plataforma para o gerenciamento e organização do acompanhamento das atividades sem qualquer tipo de custo pelo o seu uso, visando garantir maior acessibilidade ao sistema.</p2>
            </div>
            <div id="photos">
                <p1>INFORMÁTICA  2020-2022</p1>
                <p2>Álbum completo: <a href="http://bit.ly/photo-appgoog-emghd" target="_blank">bit.ly/photo-appgoog-emghd</a></p2>
                <div id="line_gif">
                    <div id="GIFs" class="progressive">
                        <img class="lazy_oper" src="./src/public/midia/fotos_turma/turma_white.jpg" data-src="./src/public/midia/fotos_turma/turma_01.gif">
                    </div>
                    <div id="GIFs" class="progressive">
                        <img class="lazy_oper" src="./src/public/midia/fotos_turma/turma_white.jpg" data-src="./src/public/midia/fotos_turma/turma_02.gif">
                    </div>
                </div>
            </div>
            <div id="block_cards">
                <p><b>Equipe Studium</b>- Desenvolvedores</p>
                <div id="cards">
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Elias.png"></div>
                        <p1>Elias Rodrigues</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Guilherme.png"></div>
                        <p1>Guilherme Agapito</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Felipe.png"></div>
                        <p1>Luis Felipe</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/L%c3%advia.png"></div>
                        <p1>Lívia Magalhães </p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Calvo.png"></div>
                        <p1>Rodrigo Farias</p1>
                    </div>
                </div>
            </div>
            <div id="block_cards">
                <p><b>Equipe Studium</b>- Marketing</p>
                <div id="cards">
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Davi.png"></div>
                        <p1>Davi Lima</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Kamelly.png"></div>
                        <p1>Kamelly Vitória</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/L%c3%advia.png"></div>
                        <p1>Lívia Magalhães</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Emanuela.png"></div>
                        <p1>Emanuela Alves</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Marco.png"></div>
                        <p1>Marco Antônio</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Nathalia.jpg"></div>
                        <p1>Maria Nathalia</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Thainara.png"></div>
                        <p1>Maria Thainara</p1>
                    </div>
                </div>
            </div>
            <div id="block_cards">
                <p><b>Equipe Studium</b>- Documentação</p>
                <div id="cards">
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Atalino.png"></div>
                        <p1>Atalino Vieira</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/F_L%c3%advia.png"></div>
                        <p1>Francisca Lívia</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Ot%c3%a1vio.png"></div>
                        <p1>José Otávio</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/L%c3%advia.png"></div>
                        <p1>Lívia Magalhães</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Lorrana.png"></div>
                        <p1>Maria Lorrana</p1>
                    </div>
                </div>
            </div>
            <div id="block_cards">
                <p><b>Equipe Studium</b>- Apresentação</p>
                <div id="cards">
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Ruth.png"></div>
                        <p1>Ruth Muniz</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Keylon.jpg"></div>
                        <p1>Francisco Kaylon</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Jonath.png"></div>
                        <p1>Jonath Sousa</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Deyle.png"></div>
                        <p1>Deyle Carvalho</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Tatiane.png"></div>
                        <p1>Tatiane Rodrigues</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Gustavo.jpg"></div>
                        <p1>Gustavo Bezerra</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Auxi.png"></div>
                        <p1>Maria Auxiliane</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Erik.png"></div>
                        <p1>Erik Rodrigues</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Aparecida.png"></div>
                        <p1>Aparecida Rodrigues</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/toin.png"></div>
                        <p1>Antonio Silva</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Davi.png"></div>
                        <p1>Davi Lima</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Khaue.png"></div>
                        <p1>Khauê Rodrigues</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Kaylane.jpg"></div>
                        <p1>Maria Kaylane</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Gabriel.png"></div>
                        <p1>Gabriel Martins</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Andim.png"></div>
                        <p1>Anderson Araújo</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Levir.png"></div>
                        <p1>Paulo Levir</p1>
                    </div>
                </div>
            </div>
            <div id="block_cards">
                <p><b>Equipe Studium</b>- Equipe de suporte</p>
                <div id="cards">
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Bianca.png"></div>
                        <p1>Bianca Soares</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Ana.png"></div>
                        <p1>Ana Francisca</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Gustavo_M.png"></div>
                        <p1>Gustavo Mororó</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/L_Gustavo.png"></div>
                        <p1>Luis Gustavo</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Kauan_P.png"></div>
                        <p1>Kauan Pereira</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Mestre.png"></div>
                        <p1>João Guilherme</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Silas.png"></div>
                        <p1>Silas Robert</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Erick.png"></div>
                        <p1>Francisco Erick</p1>
                    </div>
                    <div class="card">
                        <div class="progressive"><img class="lazy" src="./src/public/midia/img_white.jpg" data-src="./src/public/midia/fotos_turma/Kauan_G.png"></div>
                        <p1>Kauan Guerra</p1>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./src/public/js/proportion.js"></script>
    <script src="./src/public/js/about-us.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://unpkg.com/progressive-image/dist/index.js"></script>
    <script>
        (function(){
            new Progressive({
                el: '#app',
                lazyClass: 'lazy',
                removePreview: true,
                scale: true
            }).fire()
            new Progressive({
                el: '#app',
                lazyClass: 'lazy_oper',
                removePreview: true
            }).fire()
        })()
    </script>
</body>
</html>