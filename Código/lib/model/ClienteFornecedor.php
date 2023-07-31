<?php
class ClienteFornecedor{
    private $sql;

    public function __construct(){
        $this->sql= new Sql();
    }

    public function inserir($rs_nm,$nf_nc,$email,$tell,$ipessoafisica,$cnpj_cpf,$ie,$cep,$cidade,$idlinhavenda,$bairro,$rua,$nrlocal,$ifornecedor){
       
       
        $return=$this->sql->select("SELECT cnpj_cpf,ifornecedor FROM cliente_fornecedor WHERE cnpj_cpf = :CNPJCPF AND ifornecedor = :IFORNECEDOR",array(
            ":CNPJCPF"=>$cnpj_cpf,
            ":IFORNECEDOR"=>$ifornecedor,
        ));
       if (empty($return)) {
        $endereco = "$bairro - $rua";
        $this->sql->crud("INSERT into cliente_fornecedor (razaosocial_nomecompleto,nomefantasia_nomecomercial,email,nrfone,ipfisica,cnpj_cpf,ie,cep,cidade,idlinhavenda,endereco,nrlocal,ifornecedor) values(:RSNM,:NFNC,:EMAIL,:TELL,:IPESSOAFISICA,:CNPJCPF,:IE,:CEP,:CIDADE,:IDLINHAVENDA,:ENDERECO,:NRLOCAL,:IFORNECEDOR)",array(
            ":RSNM"=>$rs_nm,
            ":NFNC"=>$nf_nc,
            ":EMAIL"=>$email,
            ":TELL"=>$tell,
            ":IPESSOAFISICA"=>$ipessoafisica,
            ":CNPJCPF"=>$cnpj_cpf,
            ":IE"=>$ie,
            ":CEP"=>$cep,
            ":CIDADE"=>$cidade,
            ":IDLINHAVENDA"=>$idlinhavenda,
            ":ENDERECO"=>$endereco,
            ":NRLOCAL"=>$nrlocal,
            ":IFORNECEDOR"=>$ifornecedor

        ));
       } else {
        $_SESSION['mensagem']="CPF ou CNPJ já cadastrado para ";
       }

     


    }

    public function listar_linha(){
       $return =$this->sql->listar("SELECT cod,nome FROM linha_de_venda WHERE estatus = 'ativo'"
        );
        return $return;
       
    }
    public function excluir($cod){
        $this->sql->crud("DELETE from cliente_fornecedor where cod = :COD",array(
            ":COD"=>$cod
        ));

     }
}



?>