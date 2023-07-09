<?php
class db{
    protected $connection ;

    function __construct(){
        // echo "Constructor called";
    }

    function setConnection(){
        $this->connection=new PDO("mysql:hostname=localhost;dbname=mylibraryproject","root","");
    }
}


?>