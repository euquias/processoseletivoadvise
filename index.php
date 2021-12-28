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
/* $lista = usuario::getList();
echo json_encode($lista) */

/* iserindo usuario
$pessoa = new Usuario("euquias", "euquiasa@gmail.com", "61991631462");
$pessoa->insert();
echo $pessoa; */

$usuario = new Usuario();
$usuario->loadById(1);
$usuario->update("Luciana", "luciana@gmail.com", "61991631462");
echo $usuario;
?>