<?php
include('dataclass.php');
$personname= $_GET['studentname'];
$bookname =$_GET['bookname'];
$days=$_GET['days'];
$issuedate=DATE('d/m/y');
echo $issuedate;
$returndate=DATE('d/m/y' ,strtotime('+'.$days.'days'));
echo $returndate;

$obj=new data();
$obj->setConnection();
$obj->issuebook($personname,$bookname,$days,$issuedate,$returndate);

// $returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));
?>

