<?php

include("dataclass.php");

$adminemail=$_GET['adminemail'];
$adminpass=$_GET['adminpass'];

$obj = new data();
$obj->setConnection();
$obj->adminlogin($adminemail, $adminpass);
// $msg1="";
// if(!empty($_REQUEST['msg1'])){
//     $msg1=$_REQUEST['msg1'];
// }
// echo $msg1;






?>

