<?php

require __DIR__.'/vendor/autoload.php';



use \App\Entity\Usuario;

use \App\Session\Login; 

//obriga usuario a estar logado
Login::requereLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['idusuario']) or !is_numeric($_GET['idusuario'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA o Usuario

$obUsuario = Usuario:: getUsuario($_GET['idusuario']);

//VALIDAÇÃO Do Usuario
if(!$obUsuario instanceof Usuario){
  header('location: index.php?status=error');
  exit;
}


//validando se os dados chegaram

if(isset ( $_POST['excluir'])){
 
  
  $obUsuario->excluir();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__ ."/includes/header.php";
include __DIR__ ."/includes/confirmarExclusao.php";
include __DIR__ ."/includes/footer.php";

