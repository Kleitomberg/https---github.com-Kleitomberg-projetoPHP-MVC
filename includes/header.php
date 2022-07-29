
<?php

use \App\Session\Login;

$usuariologado = Login::getusuariologado();


//var_dump($_SESSION['usuario']);

$usuario = $usuariologado ?
           $usuariologado['nome'].' <a href="logout.php" class=" ml-2 font-wight-bold text-light text-decoration-none"> Sair</a>':
           ' <a href="login.php" class=" ml-2 font-wight-bold text-light text-decoration-none"> Entrar</a> <a href="cadastro.php" class=" ml-2 font-wight-bold text-light text-decoration-none"> Cadastrar</a>';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard - Painel do Admin</title>
  </head>

  <style>
  .radios{
    display:flex;
    gap: 8px;
  }
  
   </style>

  <body class="bg-dark text-light">

  <div class="container">  
  
  <div class="jumbotron bg-success container"> 
    <h1 class="text-center pt-2"> Caprinu</h1>
    <p class="text-center "> Painel do Admin </p>

    <hr class='border light'>

    <div class="d-flex justify-content-between mb-2 pb-2 pl-2 pr-2"> <?=$usuario?> </div>


  </div>
  
  
    
 