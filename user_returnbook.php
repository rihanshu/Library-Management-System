<?php
include('dataclass.php');
$userid = $_GET['userid'];
$bookname = $_GET['bookname'];
$obj=new data();
$obj->setConnection();
$obj->returnbook($userid,$bookname);


?>