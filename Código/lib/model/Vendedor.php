<?php
Class Vendedor{

    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function inserir($nome,$email,$nrfone,$cpf,$rg,$dtnascimento,$dtcontratacao,$cep,$cidade,$bairro,$rua, $nrlocal){
        $endereco = "$bairro - $rua";
        $this->sql->crud("INSERT into vendedor (nome,email,nrfone,cpf,rg,dtnascimento,dtcontratacao,cep,cidade,endereco,nrlocal) values (:NOME,:EMAIL,:NRFONE,:CPF,:RG,:DTNASCIMENTO,:DTCONTRATACAO,:CEP,:CIDADE,:ENDERECO,:NRLOCAL) ",array(
            ":NOME" =>$nome,
            ":EMAIL"=>$email,
            ":NRFONE"=>$nrfone,
            ":CPF"=>$cpf,
            ":RG"=>$rg,
            ":DTNASCIMENTO"=>$dtnascimento,
            ":DTCONTRATACAO"=>$dtcontratacao,
            ":CEP"=>$cep,
            ":CIDADE"=>$cidade,
            ":ENDERECO"=>$endereco,
            ":NRLOCAL"=>$nrlocal
        ));
    }
    public function excluir($cod){
        $this->sql->crud("DELETE from vendedor where cod = :COD",array(
            ":COD"=>$cod
        ));

     }
}


?>