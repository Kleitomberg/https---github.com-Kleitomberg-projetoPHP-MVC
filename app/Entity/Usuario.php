<?php

namespace App\Entity;
use App\Db\Database;
use \PDO;


class Usuario{

  /**
   * atritubtos da classe usuario
   */

   public $idusuario;

  public $nome;
  public $cpf;
  public $email;
  public $numero;
  public $senha;

  /**Define se o usuario é pessoa fisica ou juridic
   *  @var String (pf/pj)
   * 
   */
  public $tipo;
  
  
    /**Define se o usuario é Admin, produtor ou Organização
   *  @var String (pf/pj)
   * 
   */
  public $perfil;


  /** metodo responsavel por casatrar um novo usuario ao banco
   * @return boolean
   */
  public function cadastrar(){
    

    $obDatabase = new Database('usuarios');
    $this->idusuario = $obDatabase->insert([
          'nome' => $this->nome,
          'CPF_CNPJ' => $this->cpf,
          'email' => $this->email,
          'numero' => $this->numero,
          'senha' => $this->senha,
          'tipopfpj' => $this->tipo
          //'idperfil_usuario_fk' => $this->perfil
    ]);

    

    return true;

  }

  //metodo de atualiza os dados do usuario
  public function atualizar(){
    return (new Database('usuarios'))->update('idusuario = '.$this->idusuario,[
          'nome' => $this->nome,
          'CPF_CNPJ' => $this->cpf,
          'email' => $this->email,
          'numero' => $this->numero,
          'senha' => $this->senha,
          'tipopfpj' => $this->tipo,
          'idperfil_usuario_fk' => $this->perfil
    ]);

  }


    /**
   * Método responsável por excluir a vaga do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('usuarios'))->delete('idusuario = '.$this->idusuario);
  }

  //metodo responsavel por buscar uma todos os usuarios do banco
  public static function getUsuarios($where = null, $order = null, $limit = null){

    return (new Database('usuarios'))->select($where,$order,$limit)
    ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

//retorna a quantidade de registros 
  public static function getQuantUsuarios($where = null){

    return (new Database('usuarios'))->select($where, null, null, 'COUNT(*) as qtd')
    ->fetchObject()
    ->qtd;
  }
  

    //metodo que pega usuario especifico do banco pelo id
  public static function getUsuario($idusuario){
      return (new Database('usuarios'))->select('idusuario = '. $idusuario)
      ->fetchObject(self::class);
      ;
  }

  public static function getUsuarioporEmail($email){
    return (new Database('usuarios'))->select('email = "'. $email.'"')
    ->fetchObject(self::class);
    ;
}

}