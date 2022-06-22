<?php

function login () {
    include 'telas/login.php';
}

function cadastro () {
    if ($_POST) {
    $nome =  $_POST['nome'];
    $email =  $_POST['email'];
    $telefone =  $_POST['telefone'];

    $arquivo = fopen('dados/contatos.csv', 'a+');

    fwrite($arquivo, "{$nome}; {$email}; {$telefone}".PHP_EOL);

    fclose($arquivo);

    $mensagem = "Cadastro realizado com sucesso ✅";

    include 'telas/mensagem.php';
}    
    include 'telas/cadastro.php';
}

function home (){
    include 'telas/home.php';
}

function erro404 (){
    include 'telas/404.php';
}

function listar (){
    $contatos = file('dados/contatos.csv');

    include 'telas/listar.php';
}

function relatorio (){
    include 'telas/relatorio.php';
}

function excluir () {
    $id = $_GET['id'];

    $contatos = file('dados/contatos.csv');

    unset($contatos[$id]);

    unlink('dados/contatos.csv');

    $arquivo = fopen('dados/contatos.csv', 'a+');

    foreach ($contatos as $cadaContato) {
        fwrite($arquivo, $cadaContato);
    }
    $mensagem = 'Contato excluído com sucesso!' . '❎ ';
    include ('telas/mensagem.php');
}

function editar () {
    $id = $_GET['id'];

    $contatos = file('dados/contatos.csv');

    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $contatos[$id] = "{$nome};{$email};{$telefone}".PHP_EOL;

        unlink ('dados/contatos.csv');

        $arquivo = fopen('dados/contatos.csv', 'a+');


        foreach ($contatos as $cadaContato) {
            fwrite($arquivo, $cadaContato);
        }
        
        fclose($arquivo);

        $mensagem = 'Contato atualizado' . '🔂';
        include ('telas/mensagem.php');
    }

    $dados = explode(';', $contatos[$id]);


    include ('telas/editar.php');
}