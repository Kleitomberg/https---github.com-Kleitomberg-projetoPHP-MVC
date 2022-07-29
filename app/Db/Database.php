<?php

namespace App\Db;

use \PDO;
use \PDOException;

Class Database{

  // conexão com banco de dados

  const HOST = 'localhost';
  const NAME = 'mydb';
  const USER = 'root';
  const PASSWORD ='';

  //tabela que vai ser modificada 
  private $table;

  /**cria a conexão com o banco
   * @var PDO
   */  
  private $connection;


  /**construtor que define a tabela e instacia a conexão
   * Tabela do tipo String
   */  

  public function __construct($table = null){
    $this-> table = $table; //define a tabela
    $this->setConnection(); // chama a função que instacia a conexão

  }

  //cria conexão com o banco
  private function setConnection(){

    try{
      $this->connection = new PDO('mysql:host='.self::HOST.'; dbname='.self::NAME, self::USER, self::PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOExeption $e){
      die("ERROR: " .$e->getMessage() ); // mudar isso depois exibindo uma mensagem mais amigavel e armazenando a o erro no log

    }

  }

  //executa a query
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**Metodo que adiciona dados ao banco
   * pasando o nome do campo e o valo
   * @retorna um id do tipo int
   */

  public function insert($values){
    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

      $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields ).') VALUES ('. implode(',', $binds).')';
  
      $this->execute($query, array_values($values));


      return $this->connection->lastInsertId();
    }

      //metodo que realiza a consulta no banco
      public function select($where = null, $order = null, $limit = null, $fields = '*'){
       //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    //EXECUTA A QUERY
    return $this->execute($query);
    }

    //executa a atualização no banco

    public function update($where,$values){
      //DADOS DA QUERY
      $fields = array_keys($values);
  
      //MONTA A QUERY
      $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
  
      //EXECUTAR A QUERY
      $this->execute($query,array_values($values));
  
      //RETORNA SUCESSO
      return true;
    }
/**
   * Método responsável por excluir dados do banco
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //MONTA A QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTA A QUERY
    $this->execute($query);

    //RETORNA SUCESSO
    return true;
  }

}