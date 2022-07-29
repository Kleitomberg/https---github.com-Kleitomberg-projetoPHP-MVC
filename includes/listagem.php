
  <?php

$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

$resultados = '';

$perfil;



foreach($usuarios as $usuario){

  $perfil = $usuario->idperfil_usuario_fk;

  if ($perfil =='1') {
    $perfil ='Admin';
} elseif ($perfil =='2') {
  $perfil ='Produtor';
} else {
  $perfil ='Associação';
  
}


$cpfoucnpf = $usuario->tipopfpj ;

if ($cpfoucnpf  =='pf') {
  $cpfoucnpf  ='CPF';
} else {
  $cpfoucnpf  ='CNPJ';

}

  
  $resultados .= '<tr>
                    <td>'.$usuario->idusuario.'</td>
                    <td>'.$usuario->nome.'</td>
                    <td>'.$usuario->email.'</td>
                    <td>'.$usuario->numero.'</td>
                    <td>'.$usuario->CPF_CNPJ.'</td>                   
                    <td>'.($usuario->tipopfpj == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica').'</td>
                    <td>'.($usuario->idperfil_usuario_fk = $perfil)
                    
                    
                    .'</td>
                    <td>
                      <a href="editar.php?idusuario='.$usuario->idusuario.'">
                        <button type="button" class="btn btn-primary">Editar</button>
                      </a>
                      <a href="excluir.php?idusuario='.$usuario->idusuario.'">
                        <button type="button" class="btn btn-danger">Excluir</button>
                      </a>
                    </td>
                  </tr>';
}


$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="8" class="text-center">
                                                            Nenhum usuario encontrado
                                                     </td>
                                                  </tr>';

//Gets

    unset($_GET['status']);
    unset($_GET['pagina']);

      $gets = http_build_query($_GET);

    //paginação
    $paginação = '';
    $paginas = $obPagination->getPages();

      foreach($paginas as $key=>$pagina){

        $class = $pagina['atual'] ? 'btn-primary': 'btn-light';
        
        $paginação.=' <a href="?pagina='.$pagina['pagina']. '&'.$gets.'">

          <button 
          type="button"
          class="btn '.$class.'"> 

          '.$pagina['pagina'].' 

          </button> 

          </a>  ';

      }



  ?>

<main>

<?=$mensagem?>



<section>

  <a href="cadastrar.php">  <button class="btn btn-success"> Cadastrar usuario </button>  </a>

 
 </section>

 

    <section> 

    <h3 class="mt-5 mb-4"> Listagem de usuarios</h3>

    <form method="get">

      <div class="row"> 
      <div class="col">

      <label for=""> Buscar por nome</label>
      <input type="text" name="busca" class="form-control" value='<?=$busca?>'>
       </div>

       <div class="col">
          <label for=""> Tipo de usuario</label>
          <select name="tipodeusuario" class="form-control">

          <option value="" selected> Pessoa Fisica | Pessoa Juridica </option>
          <option value="pj" <?=$filtrocpf =='pj' ? 'selected' :'' ?>>  Pessoa Juridica </option>
          <option value="pf" <?=$filtrocpf =='pf' ? 'selected' :'' ?>> Pessoa Fisica </option>
          
          </select>
       </div> 

       <div class="col">
          <label for=""> Perfil</label>
          <select name="perfil" class="form-control">

          <option value="" selected> Selecionar perfil </option>
          <option value="1" <?=$filtroperfil =='1' ? 'selected' :'' ?>> Admin </option>
          <option value="2" <?=$filtroperfil =='2' ? 'selected' :'' ?>>  Produtor </option>
          <option value="3" <?=$filtroperfil =='3' ? 'selected' :'' ?>> Associação </option>
          
          </select>
       </div> 

       <div class="col d-flex align-items-end">
      <button type="submit" class="btn btn-primary"> Buscar</button>
       </div>
      
      
      </div>

    </form>
    </section>


 <section>
  <table class='table bg-light mt-3'> 
  
    <thead> 
    <tr>
      <th> ID </th>
      <th> Nome  </th>
      <th> Email  </th>
      <th> Numero  </th>
      <th> CPF/CNPJ </th>
      <th> Tipo </th>
      <th> Perfil </th>
      <th> Ações </th>
      </tr>
      </thead> 

      <tbody>
     
      <?=$resultados?>
      </tbody>


  </table>
  </section>

  <Section>
    
  <?=$paginação?>
  </section>
</main>