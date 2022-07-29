<main>

  <h3 class="mt-5 text-center"> Excluir usuairo </h3>

  <form method="Post" class=" bg-light  w-50 text-center center align-items-center position-absolute top-50 start-50 translate-middle">  


  <div class="form-group mt-3 ">

    <p class="text-center text-dark">  Deseja realmente excluir o usuario <strong> <?=$obUsuario->nome?> </strong>  ?</p>

   
  </div>

    <div class="form-group text-center mb-3 pb-3 inline ">

    <a href="index.php"> <button type="button" class="btn btn-success"> Cancelar </button> </a>
    
       <button name="excluir" type="submit"class="  btn btn-danger pd-t5"> Excluir</button>

    </div>

   </form>



</main>