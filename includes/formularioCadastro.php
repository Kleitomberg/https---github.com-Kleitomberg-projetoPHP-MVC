<?php

$alertcadastro = strlen($alertcadastro) ? '<div class="alert alert-danger">'.$alertcadastro.'</div>' :'';

  ?>

<main>

<section>

  
 </section>

  <h3 class="mt-5 text-center"> <?=TITLE?> </h3>
<?=$alertcadastro?>
  <form method="Post" class="mt-5">

 
  <label > Tipo de usuario</label>
<div>  



  <div class="form-check form-check-inline mt-1">
 
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="pf" value="pf" checked>
  <label class="form-check-label" for="flexRadioDefault1">
    Pessoa Fisica
  </label>
</div>

<div class="form-check form-check-inline mt-1">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="pj" value="pj" >
  <label class="form-check-label" for="flexRadioDefault2">
    Pessoa Juridica
  </label>
</div>

</div>

  <div class="form-group mt-3">
    <label> CPF ou CNPJ </label>
    <input type="text" name="cpf" id="cpf" class="form-control" require>
  </div>

  <div class="form-group mt-3">
    <label> Nome </label>
    <input type="text" name="nome" id="nome" class="form-control" require>
  </div>

 

  <div class="form-group mt-3">
    <label> Email </label>
    <input type="email" name="email" id="email" class="form-control" require>
  </div>
  
  <div class="form-group mt-3">
    <label> Numero </label>
    <input type="text" name="numero" id="numero" class="form-control"require >
  </div>

  <div class="form-group mt-3">
    <label> Senha </label>
    <input type="password" name="senha" id="senha" class="form-control"  require>
  </div>


  
    <div class="form-group text-center mb-3">
    
       <button name="cadastrar" value="cadastrar"  type="submit"class="mt-4  btn btn-success"> Cadastrar</button>
       <p> Possui uma conta? <a href="login.php"> <strong>Fazer login </strong> </a></p>
    </div>
   </form>



</main>