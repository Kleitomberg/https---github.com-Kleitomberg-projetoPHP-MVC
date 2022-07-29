<main>

<section>

  <a href="index.php">

  <button class="btn btn-success"> voltar </button>
  </a>
 </section>

  <h3 class="mt-5 text-center"> <?=TITLE?> </h3>

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
    <input type="text" name="cpf" id="cpf" class="form-control" >
  </div>

  <div class="form-group mt-3">
    <label> Nome </label>
    <input type="text" name="nome" id="nome" class="form-control" >
  </div>

 

  <div class="form-group mt-3">
    <label> Email </label>
    <input type="email" name="email" id="email" class="form-control" >
  </div>
  
  <div class="form-group mt-3">
    <label> Numero </label>
    <input type="text" name="numero" id="numero" class="form-control" >
  </div>

  <div class="form-group mt-3">
    <label> Senha </label>
    <input type="password" name="senha" id="senha" class="form-control" >
  </div>

  <div class="form-group">
  <input type="hidden" name="perfil" value="2">
  </div>
  
    <div class="form-group text-center mb-3">
    
       <button type="submit"class="mt-4  btn btn-success"> Cadastrar</button>
    </div>
   </form>



</main>