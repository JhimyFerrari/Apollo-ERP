<?php


class Genericas{
//Categoria, linha de venda,setor, marca
   private $sql;

   public function __construct(){
    $this->sql = new Sql();
   }
    public function inserir($nome, $descric,$tabela)
    {
 
  
            $return=$this->sql->select("SELECT nome FROM $tabela WHERE nome = :NOME ",array(
              ":NOME"=>$nome,
          ));
          if (empty($return)) {
            $this->sql->crud(
              "INSERT into $tabela (nome,descric) values (:NOME,:DESCRIC)",
              array(
                ":NOME" => $nome,
                ":DESCRIC" => $descric
              )
            );
          } else {
            $_SESSION['mensagem']="Nome já cadastrado";
          }  
        }
        public function excluir($cod,$tabela){
          $this->sql->crud("DELETE from $tabela where cod = :COD",array(
              ":COD"=>$cod
          ));
  
       }

        
}
