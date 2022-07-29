<?php

namespace App\Db;

class Pagination{

  //numero maximo de rgistros por pagina
  private $limit;

  //quantidade de resultados 
  private $results;

  //quantidade de paginas
  private $pages;

  //pega a pagina atual
  private $currentPage;

  //construtor que incia a pagina na 1 e mostra 10 registros por pagina
  public function __construct($results, $currentPage = 1,$limit = 10 ){

      $this->results = $results;     
      $this->limit = $limit;
      $this->currentPage = ( is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
  
      $this->calculate();
    }

  //metodo que calcula a paginação
  private function calculate(){
      //calcula o total de paginas
    $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

    //verifica de a pagina não é maior que o total existente

    $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage :$this->pages;
  }

  //clausula SQL de limit  | String
  public function getLimit(){
      $offset = ($this->limit * ($this->currentPage - 1));
      return  $offset.','.$this->limit;
  }

  //retorna opções de paginas disponiveis ||array
    public function getPages(){
      //verifica se a pagina é unica
      if($this->pages == 1){      return [];    }

      $paginas = [];

        for($i = 1; $i <=$this->pages; $i++){
          $paginas [] = [
            'pagina' => $i,
            'atual' => $i == $this->currentPage

          ];
        }
        
      return $paginas;

    }



}