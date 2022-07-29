  
  <?php

$alertlogin = strlen($alertlogin) ? '<div class="alert alert-danger">'.$alertlogin.'</div>' :'';

  ?>

  
  <Div class="jumbotron text-light">

        <div class="row" > 

              <div class="col">
                  <form method="Post"> 

                          <h2 class="text-center mt-5"> Login </h2>

                          <?=$alertlogin?>

                          <div class="form-group">                           
                            <label class="">Email</label>
                            <input type="email" name="email" class="form-control" require>

                          </div>
                          <div class="form-group mt-3">                           
                            <label class="">Senha</label>
                            <input type="password" name="senha" class="form-control" require>

                          </div>

                          <div class="form-group mt-3 text-center">                           
                            <button name="logar" value="logar" type="submit" class="btn btn-primary"> Entrar</button>
                          <p> Ainda não possui um cadastro? <a href="cadastro.php"> <strong>Criar conta </strong> </a></p>
                          </div>



                  </form>

              </div>

        </div>

  </div>