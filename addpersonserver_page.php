<?php
include('dataclass.php');
$name=$_POST['username'];
$email=$_POST['useremail'];
$pass=$_POST['userpass'];
$type=$_POST['type'];

$obj=new data();
$obj->setConnection();
$obj->addperson($name,$email,$pass,$type);

?>