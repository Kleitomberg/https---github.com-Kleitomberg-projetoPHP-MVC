<?php

require __DIR__.'/vendor/autoload.php';


use \App\Entity\Usuario;
use \App\Session\Login; 

//instancia de usuario

$obUsuario = new Usuario;

//obriga usuario a não estar logado
Login::requereLogout();

$alertlogin ='';



if(isset($_POST['logar'])){
  
  //busca usuario por email, verififcando se ele existe no banco
  $obUsuario = Usuario::getUsuarioporEmail($_POST['email']);
  

  
  //valida a instancia de EMAIL le SENHA
  if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'],$obUsuario->senha)){    
    
    $alertlogin ='E-mail e/ou Senha inválido(s)';

     
  }else{

    //$alertlogin ='Usuario logado';
    Login::login($obUsuario);

}
}



include __DIR__ ."/includes/header.php";
include __DIR__ ."/includes/formularioLogin.php";
include __DIR__ ."/includes/footer.php";

