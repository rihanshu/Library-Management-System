<?php
include('dataclass.php');


$personname= $_GET['studentname'];
$bookname =$_GET['bookname'];
$days=$_GET['days'];
$issuedate=DATE('d/m/y');
$usertype=$_GET['usertype'];
$returndate=DATE('d/m/y' ,strtotime('+'.$days.'days'));




// $personname, $bookname, $days, $issuedate, $returndate
$userid=$_GET['userid'];
$bookid=$_GET['bookid'];
$obj=new data();
$obj->setConnection();
$obj->bookrequest($userid,$bookid,$personname,$usertype,$bookname,$days,$issuedate,$returndate);



?>