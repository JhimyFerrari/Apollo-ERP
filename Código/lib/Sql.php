<?php


    class Sql extends PDO {
const HOSTNAME= '127.0.0.1';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = "apollo_erp";
private $conn;

public function __construct()
{
    try {	$this->conn = new PDO(
        "mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
        Sql::USERNAME,
        Sql::PASSWORD
    );
        
    } catch (\Throwable $th) {
        echo "Exceção capturada: " . $th->getMessage();
    }
    }

private function setParametros($stmt,$parametros=array()){
    foreach ($parametros as $key => $value) {
        $this->bindParametros($stmt,$key,$value);
    }
}
private function bindParametros($stmt,$key,$value){
    $stmt->bindParam($key,$value);

}

public function select($consulta,$parametros=array()){
    $stmt = $this->conn->prepare($consulta);
    $this->setParametros($stmt,$parametros);
    $stmt->execute();
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
  
    return $results;

}

public function crud($query,$parametros=array()){

   try {
     $stmt = $this->conn->prepare($query);
    $this->setParametros($stmt,$parametros);
    $stmt->execute();
   } catch (\Throwable $th) {
    echo "Exceção capturada: " . $th->getMessage();
   }
}

public function listar($query){
    $stmt=$this->conn->prepare($query);
    $stmt->execute();

    return $stmt ->fetchAll(PDO::FETCH_ASSOC);
}



}
