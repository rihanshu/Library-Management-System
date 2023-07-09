<?php
include('dataclass.php');
$useremail = $_REQUEST['useremail'];
$userpass = $_REQUEST['userpass'];


if($useremail == null || $userpass == null){
    header("Location:index.php?msg=Enter Email and Password");
    
    
}
else{
    $obj=new data();
    $obj->setConnection();
    $obj->userlogin($useremail,$userpass);
}
?>