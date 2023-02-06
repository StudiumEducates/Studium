<?php
  $dbHost = 'localHost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName_adm = 'studium';
  $dbName_turma = 'turmas';

  $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword);
    if ($mysqli->connect_errno) {
        echo "Falha na conexão: (" .$mysqli->connect_errno .") " . $mysqli->connect_errno;
    }

    // Criando Banco de Dados
    $cbd = ("CREATE DATABASE $dbName_adm");
    $mysqli->query($cbd);

    $cbd_turmas = ("CREATE DATABASE $dbName_turma");
    $mysqli->query($cbd_turmas);

    $conexao_adm = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName_adm);
    $conexao_turma = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName_turma);

    // Tabela usada para guardar apenas os usuários do tipo administração
    $ctb_adm = mysqli_query($conexao_adm,"CREATE TABLE administracao (
        id INT(100) PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(25) NOT NULL,
        special VARCHAR(25) NOT NULL,
        cod INT(25) NOT NULL)
        ");

    // Tabela usada para guardar apenas as turmas
    $ctb_aluno = mysqli_query($conexao_adm,"CREATE TABLE turmas (
        id INT(100) PRIMARY KEY AUTO_INCREMENT,
        turma VARCHAR(25) NOT NULL,
        cod INT(25) NOT NULL)
        ");

    // Tabela usada para guardar apenas os usuários do tipo representante
    $ctb_lider_sala = mysqli_query($conexao_adm,"CREATE TABLE representantes (
        id INT(100) PRIMARY KEY AUTO_INCREMENT,
        turma VARCHAR(25) NOT NULL,
        cod INT(25) NOT NULL)
        ");
  
?>

