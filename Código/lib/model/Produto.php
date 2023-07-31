<?php

class Produto {

    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function inserir($nome,$descric,$idmarca,$idcategoria,$idsetor,$vlcompra){
        $this->sql->crud("INSERT into produto (nome,descric,idmarca,idcategoria,idsetor,vlcompra) values (:NOME,:DESCRIC,:IDMARCA,:IDCATEGORIA,:IDSETOR,:VLCOMPRA)");
        
    }

    public function listar_setor(){
       $return= $this->sql->listar("SELECT cod,nome from setor where estatus ='ativo'");

       return $return;
    }
    public function listar_marca(){
       $return= $this->sql->listar("SELECT cod,nome from marca where estatus ='ativo'");

       return $return;
    }
    public function listar_categoria(){
       $return= $this->sql->listar("SELECT cod,nome from categoria where estatus ='ativo'");

       return $return;
    }
    public function excluir($cod){
        $this->sql->crud("DELETE from produto where cod = :COD",array(
            ":COD"=>$cod
        ));

     }
}

?>