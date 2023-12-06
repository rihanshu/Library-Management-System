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


    // $name_file = $_FILES["bookpic"]["name"];
    // $tmp_name=$_FILES["bookpic"]["tmp_name"];
    // $local_image = "uploads/";
    // move_uploaded_file($tmp_name , $local_image.$name_file);

//   if (copy($_FILES['file']['tmp_name'], $path)) {
    // if (copy($_FILES["bookpic"]["tmp_name"],"uploads/" . $_FILES["bookpic"]["name"])) {

    //     $bookpic=$_FILES["bookpic"]["name"];
    
    $obj=new data();
    $obj->setConnection();
    $obj->insertBook($bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquant,$bookpic);
    //   } 
    //   else {
    //      echo "File not uploaded";
    //   }
   

    
    
    ?>





?>