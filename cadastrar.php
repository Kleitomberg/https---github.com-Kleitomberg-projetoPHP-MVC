<?php

require __DIR__."/vendor/autoload.php";

define('TITLE','Cadastrar usuario');

use \App\Entity\Usuario;
use \App\Session\Login; 

//obriga usuario a estar logado
Login::requereLogin();


//instancia de usuario

$obUsuario = new Usuario;

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
  $obUsuario->senha =password_hash($_POST['senha'], PASSWORD_DEFAULT); 
  $obUsuario->tipo = $_POST['flexRadioDefault'];
 

  
  
  $obUsuario->cadastrar();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__ ."/includes/header.php";
include __DIR__ ."/includes/formulario.php";
include __DIR__ ."/includes/footer.php";

