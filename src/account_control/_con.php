<?php
    include_once('../include/config.php');

    if(isset($_POST['enviar']) and !empty($_POST['g-recaptcha-response'])) {

            $url = "https://www.google.com/recaptcha/api/siteverify"; 
            $secret = "6LefLe4jAAAAAEoAvEZG1EtnucLToy0S6znqJHWo";
            $response = $_POST['g-recaptcha-response']; 
            $variaveis = "secret=".$secret."&response=".$response;

            $ch = curl_init($url);
            curl_setopt( $ch, CURLOPT_POST, 1); 
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $variaveis);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $json_str = curl_exec($ch);
            $obj = json_decode($json_str);


            $cod = $conexao_adm->real_escape_string($_POST['cod']);

            if(isset($_POST['text'])) {
                $person = $conexao_adm->real_escape_string($_POST['text']);

                $sql_code = "SELECT * FROM administracao WHERE nome = '$person' AND cod = '$cod'";

                $sql_query = $conexao_adm->query($sql_code) or die("Falha na execução do código SQL: " . $conexao_adm->error);

                $quantidade = $sql_query->num_rows;


                if($quantidade == 1 and $obj->success == 1) {
            
                    $usuario = $sql_query->fetch_assoc();
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
        
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['session_type'] = "administration - ".$usuario['nome'];

                    if($usuario['nome'] == $person and $usuario['special'] == 'true'){
                        $_SESSION['nome'] = $usuario['nome'];
                        $_SESSION['session_type'] = "administration - ".$usuario['nome'];
                        $_SESSION['special'] = $usuario['special'];

                        echo "
                        <script>
                            var Erros = 0;
                            sessionStorage.setItem('Erros', Erros);
                            sessionStorage.setItem('Radio_type', 'aluno_radio');

                            window.location.href = 'administrador';
                        </script>";
                    }

                    if($usuario['nome'] == $person and $usuario['special'] == 'false'){
                        $_SESSION['nome'] = $usuario['nome'];
                        $_SESSION['session_type'] = "administration - ".$usuario['nome'];

                        echo "
                        <script>
                            var Erros = 0;
                            sessionStorage.setItem('Erros', Erros);
                            sessionStorage.setItem('Radio_type', 'aluno_radio');

                            window.location.href = 'administracao';
                        </script>";
                    }
                }else {
                    echo "
                    <script>
                        var Erros = sessionStorage.getItem('Erros', Erros);

                        if (isNaN(Erros)){
                            Erros = 0;
                        }

                        Erros++;
                        sessionStorage.setItem('Erros', Erros);
                        window.location.href = 'login';
                    </script>
                    ";
                }
                
            }else{
                $turma = $conexao_adm->real_escape_string($_POST['select']);

                if($_POST['type'] == 'Aluno'){
                    $sql_code = "SELECT * FROM turmas WHERE turma = '$turma' AND cod = '$cod'";
                }

                if($_POST['type'] == 'Representante'){
                    $sql_code = "SELECT * FROM representantes WHERE turma = '$turma' AND cod = '$cod'";
                }

                $sql_query = $conexao_adm->query($sql_code) or die("Falha na execução do código SQL: " . $conexao_adm->error);

                $quantidade = $sql_query->num_rows;

                $tipo = $conexao_adm->real_escape_string($_POST['type']);

                if($quantidade == 1 and $obj->success == 1) {
            
                    $usuario = $sql_query->fetch_assoc();
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
        
                    $_SESSION['turma'] = $usuario['turma'];

                    if($tipo == 'Representante'){
                        $_SESSION['session_type'] = "representative - ".$usuario['turma'];
                    }

                    if($tipo == 'Aluno'){
                        $_SESSION['session_type'] = "aluno - ".$usuario['turma'];
                    }

                    echo "
                    <script>
                        var Erros = 0;
                        sessionStorage.setItem('Erros', Erros);

                        if ('".$tipo."' == 'Aluno'){
                            window.location.href = 'home';
                        }

                        if ('".$tipo."' == 'Representante'){
                            window.location.href = 'representante';
                        }
                    </script>";
                }else {
                    echo "
                    <script>
                        var Erros = sessionStorage.getItem('Erros', Erros);

                        if (isNaN(Erros)){
                            Erros = 0;
                        }

                        Erros++;
                        sessionStorage.setItem('Erros', Erros);
                        window.location.href = 'login';
                    </script>
                    ";
                }

            }

        }
?>