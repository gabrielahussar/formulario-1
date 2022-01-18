<?php

$login = $_POST['login'];
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$senha = md5($_POST['senha']);
$connect = mysql_connect('localhost', 'root', 'senha');
$db = mysql_select_db ('cadastrologin');
$query_select = "SELECT login FROM usuarios WHERE login = 'login'";
$select = mysql_query ($query_select, $connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

if ($login == "" || $login == null) {
    echo"<script langue='javascript' type='text/javascript'>
    alert('O campo login é obrigatório'); 
    href='cadastro.html';</script>";

}else{
    if ($logarray == $login){
        echo"<script langue='javascript' type='text/javascript'>
        alert('Esse login já é existente'); 
        href='cadastro.html';</script>";
    }else{
        $query = "INSERT INTO usuarios (login,senha,nome,nascimento) VALUES ('$login','$senha','$nome','$nascimento')";
        $insert = mysql_query($query,$connect);

        if($insert){
            echo"<script langue='javascript' type='text/javascript'>
            alert('Usuário cadastrado'); 
            href='login.html';</script>";


        }else{
            echo"<script langue='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar'); 
            href='cadastro.html';</script>";

        }

    }

}


?> 