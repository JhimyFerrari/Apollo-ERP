<?php

class Model
{
    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function listar($tabela)
    {
        $sql = "";
        $cabeçalho = "";
        $corpo = "";
        switch ($tabela) {


            case 'usuario':
                $sql = "SELECT cod,nome,email,estatus FROM usuario";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';


                break;

            case 'cliente':
                $sql = "SELECT cod,razaosocial_nomecompleto,nomefantasia_nomecomercial,email,cep,cidade,cnpj_cpf,nrfone,nrlocal,endereco,ie,estatus FROM cliente_fornecedor WHERE ifornecedor = 0";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Razao Social <br> Nome Completo</th>
                    <th scope="col">Nome Fantasia <br> Nome Comercial</th>
                    <th scope="col">Email</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">CNPJ <br> CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">N°</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">IE</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';

                break;

            case 'fornecedor':
                $sql = "SELECT cod,razaosocial_nomecompleto,nomefantasia_nomecomercial,email,cep,cidade,cnpj_cpf,nrfone,nrlocal,endereco,ie,estatus FROM cliente_fornecedor WHERE ifornecedor = 1";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Razao Social <br> Nome Completo</th>
                    <th scope="col">Nome Fantasia <br> Nome Comercial</th>
                    <th scope="col">Email</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">CNPJ <br> CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">N°</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">IE</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';
                break;
            case 'vendedor':
                $sql = "SELECT cod,nome,email,rg,cpf,dtnascimento,nrfone,nrlocal,endereco,cep,cidade,dtcontratacao,dtdemissao,estatus FROM vendedor";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">N°</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Data Contração</th>
                    <th scope="col">Data Demissão</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';
                break;


            case 'setor':
                $sql = "SELECT cod,nome,descric,estatus FROM setor";
                $cabeçalho = '
                    <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col"> </th>
                    </tr>
                </thead> 
                <tbody>';
                break;

            case 'linha_de_venda':
                $sql = "SELECT cod,nome,descric,estatus FROM linha_de_venda";
                $cabeçalho = '
                        <thead>
                            <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Status</th>
                            <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>';
                break;

            case 'marca':
                $sql = "SELECT cod,nome,descric,estatus FROM marca";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';
                break;
            case 'categoria':
                $sql = "SELECT cod,nome,descric,estatus FROM categoria";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';
                break;
            case 'produto':
                $sql = "SELECT cod,nome,descric,estatus FROM categoria";
                $cabeçalho = '
                <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>
                </tr>
            </thead> 
            <tbody>';
                break;
        }
        $results = $this->sql->listar($sql);
        foreach ($results as $key) {
            $corpo .= "<tr>";
            $cont = true;
            foreach ($key as $value) {
                if ($cont) {
                    $corpo .= "<th scope=\"row\">" . $value . "</th>";
                    $cod= $value;
                    $cont = false;
                } else {
                    $corpo .= "<td>" . $value . "</td>";
                }
            }
            $corpo .=
            "<td>
                <a href=\"relgerais.php?cod=$cod&&tabela=$tabela\" class=\"btn btn-danger\" onclick=\"return confirm('Confimar exclusão')\"> <i class=\"bi bi-trash-fill\"> </i></a>
                <a href=\"\" class=\"btn btn-warning\" > <i class=\"bi bi-pencil-fill\">  </i></a>
                </td>
            </tr>";
        }
        $table = $cabeçalho . $corpo . "</tbody>";
        return $table;
    }
}
