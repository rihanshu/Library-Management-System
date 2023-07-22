<?php
include('dataclass.php');
$personname= $_POST['studentname'];
$bookname =$_POST['bookname'];
$days=$_POST['days'];
$issuedate=DATE('d/m/y');

$returndate=DATE('d/m/y' ,strtotime('+'.$days.'days'));


$obj=new data();
$obj->setConnection();
$obj->issuebook($personname,$bookname,$days,$issuedate,$returndate);

// $returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));
?>

