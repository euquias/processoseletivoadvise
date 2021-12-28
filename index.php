<?php

require_once("config.php");

//CARREGANDO USUARIO....
//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

//CARREGANDO UM USUARIO
//$root = new Usuario();
//$root->loadbyId(2);
//echo $root;

//CARREGANDO UMA LISTA DE USUARIO.....
$lista = usuario::getList();
echo json_encode($lista)
?>