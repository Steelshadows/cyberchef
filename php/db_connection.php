<?php


class db_connection
{
    function __construct() { 
        $host = "localhost";
        $username = "root";
        $password = "";
        $database_name = "cyberchef";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database_name",$username,$password);
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
            console.log($e);
            console.log($conn);
        }
    }

    function query($sql,$args = []){
        $conn = $this->conn;
        try {            
            if (!($stmt = $conn->prepare($sql))) {
                return ["status"=>false,"msg"=>["Prepare failed:", $conn->errorInfo()]];
            }           
            if (!$stmt->execute($args)) {
                return ["status"=>false,"msg"=>["Execute failed:", $stmt->errorInfo()]];
            }           
            if($res = $stmt->fetchAll()){
                return ["status"=>true,"msg"=>$res];
            }else{
                return ["status"=>false];
            }
        } catch (PDOException $e) {
            return ["status"=>false,"msg"=>'query failed: ' . $e->getMessage(),"conn" => $conn];
        }
    }
}