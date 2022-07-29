<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Usuario;
use \App\Db\Pagination;
use \App\Session\Login; 


//obriga usuario a estar logado
Login::requereLogin();

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//BUSCA por tipo de usuario
$filtrocpf = filter_input(INPUT_GET, 'tipodeusuario', FILTER_SANITIZE_STRING);

//BUSCA por perfil de usuario | Produtor / Associação
$filtroperfil = filter_input(INPUT_GET, 'perfil', FILTER_SANITIZE_STRING);


//filtra o tipo de informação que passa para a busca
$filtrocpf = in_array($filtrocpf,['pf', 'pj'])? $filtrocpf:'';
$filtroperfil = in_array($filtroperfil,['1','2', '3'])? $filtroperfil:'';



//Condições da busca SQL
$condicoes = [
strlen($busca) ? 'nome LIKE "%'.str_replace('','%',$busca ).'%"': null,

strlen($filtrocpf) ? 'tipopfpj = "'.$filtrocpf.'"' : null,

strlen($filtroperfil) ? 'idperfil_usuario_fk = "'.$filtroperfil.'"' : null

];

//remove as condições vazias da busca
$condicoes = array_filter($condicoes);


//CLAUSULA WHERE SEPARADOR PARA FILTROS

$where = implode(' AND ', $condicoes);


//Quantidade total de registros

$quantUsers = Usuario:: getQuantUsuarios($where);



//paginação
  $obPagination = new Pagination($quantUsers, $_GET['pagina'] ?? 1, 6);


//obtem todos os usuarios
$usuarios = Usuario:: getUsuarios($where, null, $obPagination->getLimit());

include __DIR__ ."/includes/header.php";

include __DIR__ ."/includes/listagem.php";

include __DIR__ ."/includes/footer.php";

