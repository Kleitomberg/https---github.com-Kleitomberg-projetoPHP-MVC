<?php

namespace App\Session;

class Login{

// metodo que inicia a sessão

  private static function init(){
    //verifica se a sessão esta ativa
    if(session_status() !== PHP_SESSION_ACTIVE){
      //se não estiver então inicia um sessão
      session_start();
    }
  }

  //busca o usuario logado 

  public static function getusuariologado(){

     //chama o metodo que vai iniciar a sessão
     self::init();

     //retorna os dados do usserr ||array
     return self::isLogeed() ? $_SESSION['usuario'] : null;
  }



  //metodo que loga o usuario
   public static function login($obUsuario){
     //chama o metodo que vai iniciar a sessão
    self::init();

    $_SESSION['usuario'] =[

        'id'=>$obUsuario->idusuario,
        'nome'=>$obUsuario->nome,
        'email'=>$obUsuario->email,
        'perfil'=>$obUsuario->idperfil_usuario_fk,
        'tipo'=>$obUsuario->tipopfpj,
        'cpf'=>$obUsuario->CPF_CNPJ    

    ];
    // tendo iniciada a sessão 
    //redireciona para o index

   
    header('location:index.php');
    exit;
   }

   public static function logout(){
     //chama o metodo que vai iniciar a sessão
     self::init();

     //verifica se a sessão existe se sim ele remove-a
    
     unset($_SESSION['usuario']);

     // tendo revomido a sessão 
    //redireciona para o login

    header('location:login.php');
     
   }

  //verifica se usuario esta lagado
  public static function isLogeed(){

     //chama o metodo que vai iniciar a sessão
     self::init();

    //validacao da sessao
    return isset($_SESSION['usuario']['id']);
  }

  //define que para acessar uma pagina o usuario obrigatoriamente precisa esta logado
  public static function requereLogin(){
    if(!self::isLogeed()){
      header('location:login.php');
      exit;
    }
  }

  //define que para acessar uma pagina o usuario NÃO PODE ESTA LOGADO
  public static function requereLogout(){
    if(self::isLogeed()){
      header('location:index.php');
      exit;
    }
  }
}