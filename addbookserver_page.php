<?php

include('dataclass.php');
$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookauthor=$_POST['bookauthor'];
$bookpub=$_POST['bookpub'];
$branch=$_POST['branch'];
$bookprice=$_POST['bookprice'];
$bookquant=$_POST['bookquant'];
$bookpic=$_POST['bookpic'];


$obj=new data();
$obj->setConnection();
$obj->insertBook($bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquant,$bookpic);


?>