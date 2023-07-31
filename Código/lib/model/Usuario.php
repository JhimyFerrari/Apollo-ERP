<?php


class Usuario
{
private $sql;
    public function __construct(){
     $this->sql = new Sql();
    }
    public function inserir($nome, $email, $senha, $admin)
    {
        $return=$this->sql->select("SELECT email FROM usuario WHERE email = :EMAIL",array(
            ":EMAIL"=>$email
        ));
        if (empty($return)) {
            $hashSenha= password_hash($senha,PASSWORD_DEFAULT);
      
            $this->sql->crud(
                "INSERT into usuario (nome,email,senha,iadmin) values (:NOME,:EMAIL,:SENHA,:IADMIN)",
                array(
                    ":NOME" => $nome,
                    ":EMAIL" => $email,
                    ":SENHA" => $hashSenha,
                    ":IADMIN" => $admin
    
                )
            );
            
        } else {
            $_SESSION['mensagem']="Email já cadastrado";
        }
        

      
        
    }
    public function logar($email,$senha){
        $return= $this->sql->select("SELECT * FROM usuario WHERE email = :EMAIL AND estatus = 'ativo' ",array(
             ":EMAIL"=>$email
         ));
         
         if (!empty($return)) {
             $usuarioBanco = $return[0]["nome"];
             $hashSenha = $return[0]["senha"];
             $iadmin = $return[0]["iadmin"];
             $email= $return[0]["email"];
 
            if (password_verify($senha, $hashSenha)) {
                 $_SESSION['usuario']=$usuarioBanco;
                 $_SESSION['iadmin']=$iadmin;
                 $_SESSION['email']=$email;
 
                 $_SESSION['mensagem']="Login efetuado";
                
                 header("Location:index.php");
                 
             } else {
                 //Senha incorreta
                 $_SESSION['mensagem'] = "Usuario ou senha incorretos";
               
             }
          
         } else {
             //Usuario não encontrado
             $_SESSION['mensagem'] = "Usuario ou senha incorretos";
             
             
         }
 
 
 
     }
     public function excluir($cod){
        $this->sql->crud("DELETE from usuario where cod = :COD",array(
            ":COD"=>$cod
        ));

     }

     public function logout(){
        session_destroy();
        
     }

}
