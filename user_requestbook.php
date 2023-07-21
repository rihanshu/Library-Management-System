<?php
include('dataclass.php');
$bookid=$_GET['bookid'];
$username=$_GET['username'];
$userid=$_GET['userid'];

$obj=new data();
$obj->setConnection();
$obj->requestbookclick($bookid,$userid);



?>