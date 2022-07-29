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
 
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="pf" value="pf" checked >
  <label class="form-check-label" for="flexRadioDefault1">
    Pessoa Fisica
  </label>
</div>

<div class="form-check form-check-inline mt-1">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="pj" value="pj" <?=$obUsuario->tipopfpj == 'pj' ? 'checked' : ''?> >
  <label class="form-check-label" for="flexRadioDefault2">
    Pessoa Juridica
  </label>
</div>

</div>

  <div class="form-group mt-3">
    <label> CPF ou CNPJ </label>
    <input type="text" name="cpf" id="cpf" class="form-control"  value="<?=$obUsuario->CPF_CNPJ?>">
  </div>

  <div class="form-group mt-3">
    <label> Nome </label>
    <input type="text" name="nome" id="nome" class="form-control" value="<?=$obUsuario->nome?>">
  </div>

 

  <div class="form-group mt-3">
    <label> Email </label>
    <input type="email" name="email" id="email" class="form-control" value="<?=$obUsuario->email?>">
  </div>
  
  <div class="form-group mt-3">
    <label> Numero </label>
    <input type="text" name="numero" id="numero" class="form-control" value="<?=$obUsuario->numero?>">
  </div>

  <div class="form-group mt-3">
    <label> Senha </label>
    <input type="password" name="senha" id="senha" class="form-control" value="<?=$obUsuario->senha?>">
  </div>

  <div class="form-group mt-3">
  <label> Perfil </label>
  <select name="perfil" class="form-select" aria-label="Default select example">
  <option  selected>Atualizar Perfil do usuario</option>
  <option  value="1" <?=$obUsuario->idperfil_usuario_fk == '1' ? 'selected' : ''?>>Admin</option>
  <option  value="2" <?=$obUsuario->idperfil_usuario_fk == '2' ? 'selected' : ''?>>Produtor</option>
  <option  value="3" <?=$obUsuario->idperfil_usuario_fk== '3' ? 'selected' : ''?>>Associação</option>
</select>
  </div>
  
    <div class="form-group text-center mb-3">
    
       <button type="submit"class="mt-4  btn btn-success"> Atualizar</button>
    </div>
   </form>



</main>