<?php
    session_start();
    include_once('../../include/config.php');
    $turma = $_SESSION['turma'];
    $session_type = $_SESSION['session_type'];
    if($session_type != 'representative - '.$turma){
        header("location:login");
    }
    $turma_BD = $turma;
    $turma_BD = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(°)/"),explode(" ","a A e E i I o O u U n N  "),$turma_BD);

    $sql = "SELECT * FROM `$turma_BD`";
    $sql_clock = "SELECT * FROM `$turma_BD - horario`";

    if(isset($_POST['enviar']))
    {
        $tipo = $_POST['type'];
        $disciplina = $_POST['disciplina'];
        $data = $_POST['data'];
        $desc = $_POST['descrição'];

        $result = mysqli_query($conexao_turma, "INSERT INTO `$turma_BD`(tipo,disciplina,descricao,daty) VALUES ('$tipo','$disciplina','$desc','$data')");
        header('Location:representante');
    }

    if(isset($_POST['apagar']))
    {
        $id = $_POST['apagar'];
        $result = mysqli_query($conexao_turma, "DELETE FROM `$turma_BD` WHERE id = ('$id')");
        header('Location:representante');
    }

    if(isset($_POST['del_clock']))
    {
        $id = $_POST['del_clock'];
        $result = mysqli_query($conexao_turma, "DELETE FROM `$turma_BD - horario` WHERE id = ('$id')");
    }

    if(isset($_POST['add_clock']))
   {
    $clock = $_POST['clock'];
    $Monday = $_POST['Monday'];
    $Tuesday = $_POST['Tuesday'];
    $Wednesday = $_POST['Wednesday'];
    $thursday = $_POST['thursday'];
    $Friday = $_POST['Friday'];

    $result = mysqli_query($conexao_turma, "INSERT INTO `$turma_BD - horario` (clock,Monday,Tuesday,Wednesday,Thursday,Friday) VALUES ('$clock','$Monday','$Tuesday','$Wednesday','$thursday','$Friday')");
    header('Location:representante');
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="./src/public/midia/Icon_naveg.png"/>
    <link rel="stylesheet" href="./src/public/css/post.css">
    <link href="./src/public/css/root.css" rel="stylesheet">
    <title>Studium - Representante de <?php echo $turma; ?></title>
</head>
<body>
    <header>
        <img src="./src/public/midia/logo_studium.png">
        <p><b>Studium </b> - Representante</p>
        <button onclick="window.location.href = 'logout'"></button>
    </header>
    <main id="decrease">
        <div id="row">
            <div id="post">
                <p>Adicionar</p>
                <hr></hr>
                <form action="representante" method="POST">
                    <div id="radio">
                        <input type="radio" name="type" value="Atividade" required>
                        <label>Atividade</label>
                        <input type="radio" name="type" value="Trabalho" required>
                        <label>Trabalho</label>
                        <input type="radio" name="type" value="Prova" required>
                        <label>Prova</label>
                    </div>
                    <input type="text" name="disciplina" placeholder="Disciplina" required>
                    <input type="date" name="data" required>
                    <input type="text" name="descrição" placeholder="Descrição" required>
                    <input type="submit" name="enviar" value="Criar atividade">
                </form>
            </div>
            <div id="delete">
                <p>Apagar</p>
                <hr></hr>
                <div id="atividades">
                    <?php 
                        $result = $conexao_turma->query($sql);
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            $date_convention = new DateTime($user_data['daty']);
                            $date_convention_d = $date_convention->format('d');
                            $date_convention_m = $date_convention->format('m');
                            $date_convention_y = $date_convention->format('Y');
                            if($date_convention_d >= date('d') or $date_convention_m > date('m')){
                                if($date_convention_y >= date('Y')){
                                    $date_convention = new DateTime($user_data['daty']);
                                    $date_convention = $date_convention->format('d/m/Y');
                                    echo 
                                        "<form action='representante' method='POST'>
                                         <p>".$user_data['tipo']." de ".$user_data['disciplina']." - ".$date_convention."</p>
                                         <input type='submit' name='apagar' value='".$user_data['id']."'>
                                         </form>";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="horario">
            <table>
                <tr id="days">
                    <th id="option"></th>
                    <th id="clock">Horário</th>
                    <th>Segunda-Feira</th>
                    <th>Terça-Feira</th>
                    <th>Quarta-Feira</th>
                    <th>Quinta-Feira</th>
                    <th>Sexta-Feira</th>
                </tr>
                    <?php 
                        $result = $conexao_turma->query($sql_clock);
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo 
                            "<tr>
                                <form action='representante' method='POST'>
                                    <th id='option'>
                                        <input type='submit' name='del_clock' value='".$user_data['id']."' id='del'>
                                    </th>
                                </form>
                                <th id='clock'>".$user_data['clock']."</th>
                                <th>".$user_data['Monday']."</th>
                                <th>".$user_data['Tuesday']."</th>
                                <th>".$user_data['Wednesday']."</th>
                                <th>".$user_data['Thursday']."</th>
                                <th>".$user_data['Friday']."</th>
                            </tr>";
                        }
                    ?>
                <tr>
                    <form id="form_add" action='representante' method='POST'>
                        <th id="option">
                            <input type="submit" name='add_clock' value="enviar" id="add">
                        </th>
                        <th id="clock"><input name="clock" type="text" placeholder="0:00 às 0:00"></th>
                        <th><input name="Monday"  type="text" placeholder="Disciplina"></th>
                        <th><input name="Tuesday"  type="text" placeholder="Disciplina"></th>
                        <th><input name="Wednesday"  type="text" placeholder="Disciplina"></th>
                        <th><input name="thursday"  type="text" placeholder="Disciplina"></th>
                        <th><input name="Friday"  type="text" placeholder="Disciplina" ></th>
                    </form>
                </tr>
            </table>
        </div>
        <div id="QR_code">
            <div id="QR">
                <img id="img_qr" src='./src/public/midia/Studium.png'>
                <button id="downloadImage" value="./src/public/midia/Studium.png"> Baixar o QRcode </button>
            </div>
            <p>Os QR codes são uma ferramenta valiosa para ajudar os alunos a acessar rapidamente sua agenda de atividades, e estamos animados em anunciar que agora estamos usando QR codes para acesso ao Studium. <br>Com o uso do QR code, os alunos podem facilmente acessar sua agenda de atividades, visualizar tarefas pendentes, verificar prazos de entrega de trabalhos e muito mais. Tudo o que eles precisam fazer é usar a câmera do seu smartphone para escanear o código QR que está exposto na sala de aula e ser redirecionado diretamente para a página do Studium. <br>Em resumo, o uso de QR codes no acesso ao Studium é uma maneira eficiente e simples de garantir que os alunos tenham acesso rápido e fácil à sua agenda de atividades e a informações importantes. Faça uso desse recurso e aproveite todas as suas vantagens.</p>
        </div>
    </main>
    <script src="./src/public/js/post.js"></script>
</body>
</html>