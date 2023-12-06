<?php
class db{
    protected $connection ;

    function __construct(){
        // echo "Constructor called";
    }

    function setConnection(){
        $this->connection=new PDO("mysql:host=localhost;dbname=id21063945_onlinehostedlibrary","root","");

    }
}


?>