<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastro');

use \App\Entity\Usuario;
use \App\Session\Login; 

//obriga usuario a não estar logado
Login::requereLogout();

$alertcadastro = '';
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

    $obemail = Usuario::getUsuarioporEmail($_POST['email']);

    if($obemail instanceof Usuario){
      $alertcadastro ='Já existe um usuario cadastrado com esse e-mail';
    }else{
 

 

  $obUsuario->nome = $_POST['nome'];
  $obUsuario->cpf = $_POST['cpf'];
  $obUsuario->email = $_POST['email'];
  $obUsuario->numero = $_POST['numero'];
  $obUsuario->senha =password_hash($_POST['senha'], PASSWORD_DEFAULT); 
  $obUsuario->tipo = $_POST['flexRadioDefault'];



 

  
  
  $obUsuario->cadastrar();
  Login::login($obUsuario);

  /*
  header('location: index.php?status=success');
  exit;
*/
}
}

include __DIR__ ."/includes/header.php";
include __DIR__ ."/includes/formularioCadastro.php";
include __DIR__ ."/includes/footer.php";

