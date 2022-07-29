<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar usuario');

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

if(isset (
    $_POST['nome'], 
    $_POST['cpf'],
    $_POST['email'],
    $_POST['numero'],
    $_POST['senha'],
    $_POST['flexRadioDefault']
       
  )){
 
  

  $obUsuario->nome = $_POST['nome'];
  $obUsuario->cpf = $_POST['cpf'];
  $obUsuario->email = $_POST['email'];
  $obUsuario->numero = $_POST['numero'];
  $obUsuario->senha = $_POST['senha'];
  $obUsuario->tipo = $_POST['flexRadioDefault'];
 

  
  
  $obUsuario->atualizar();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__ ."/includes/header.php";
include __DIR__ ."/includes/formupdate.php";
include __DIR__ ."/includes/footer.php";

