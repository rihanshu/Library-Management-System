<?php
include('db.php');
class data extends db
{
    private $ademail;
    private $adpass;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquant;
    private $bookpic;
    private $bookava;
    private $bookrent;

    private $username;
    private $useremail;
    private $userpass;
    private $usertype;
    private $personselect;
    private $bookselect;
    private $days;
    private $issuedate;
    private $returndate;


    function adminlogin($admail, $adpass)
    {

        $q = "SELECT * FROM admin where email='$admail' and password='$adpass'";
        $count = $this->connection->query($q);
        $result = $count->rowCount();
        if ($result > 0) {
            echo "Logged In";
            header("Location:admin_service_dashboard.php");
        } else {
            header("Location:index.php?msg=Invalid Credentials");
        }

    }
    function insertBook($bookname, $bookdetail, $bookauthor, $bookpub, $branch, $bookprice, $bookquant, $bookpic)
    {
        $this->bookname = $bookname;
        $this->bookdetail = $bookdetail;
        $this->bookauthor = $bookauthor;
        $this->bookpub = $bookpub;
        $this->branch = $branch;
        $this->bookprice = $bookprice;
        $this->bookquant = $bookquant;
        $this->bookpic = $bookpic;
        $q = "INSERT INTO book(id,bookpic,bookname,bookdetail,bookauthor,bookpub,branch,bookprice,bookquantity,bookava,bookrent) 
        values('','$bookpic','$bookname','$bookdetail','$bookauthor','$bookpub','$branch','$bookprice',$bookquant,'$bookquant','0')";



        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=Book Added Successfully!!");
        } else {
            header("Location:admin_service_dashboard.php?msg=Book Not Added ..Try Again");
        }

    }

    function addperson($name, $email, $pass, $type)
    {
        $this->username = $name;
        $this->useremail = $email;
        $this->userpass = $pass;
        $this->usertype = $type;

        $q="SELECT * from user_data where email='$email'";
        $result=$this->connection->query($q);
        if($result->rowCount()>0){
            header("Location:admin_service_dashboard.php?msg=Email already Exist!!");
        }
        else{
        $q = "INSERT INTO user_data (id,name,email,password,type) VALUES('','$name','$email','$pass','$type')";
        if ($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=fail");
        } else {
            header("Location:admin_service_dashboard.php?msg=Student Not Added ..Try Again");
        }
    }

    }
    function studentrecord()
    {
        $q = "SELECT * from user_data";
        $rowcount = $this->connection->query($q);
        return $rowcount;
    }

    function getBook()
    {
        $q = "SELECT * from book";
        $result = $this->connection->query($q);
        return $result;
    }


    function issuebook($personname, $bookname, $days, $issuedate, $returndate)
    {
        $this->personselect = $personname;
        $this->bookselect = $bookname;
        $this->days = $days;
        $this->issuedate = $issuedate;
        $this->returndate = $returndate;

        $q = "SELECT * from user_data where name='$personname'";
        $result = $this->connection->query($q);
        foreach ($result as $row) {
            $userid = $row['id'];
            $type = $row['type'];
        }

        $q = "SELECT * from book  where bookname='$bookname'";
        $result = $this->connection->query($q);
        foreach ($result as $row) {
            $id = $row['id'];
            $bookavail = $row['bookava'] - 1;
            $bookrent = $row['bookrent'] + 1;


        }
        $q = "UPDATE book SET bookava= '$bookavail' , bookrent='$bookrent' where id='$id'";
        if ($this->connection->exec($q)) {

            $q = "INSERT into issue_book (id,userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine) VALUES('','$userid','$personname','$bookname','$type','$days','$issuedate','$returndate','0')";
            if ($this->connection->exec($q)) {
                header("Location:admin_service_dashboard.php?msg=Book Issued Successfully!!");
            } 
            else {
                header("Location:admin_service_dashboard.php?msg=Book Not Issued..Try Again ");
            }
        } 
        else {
            header("Location:admin_service_dashboard.php?msg=Book Not Issued..Try Again ");
        }
    }
    function bookrecord(){
        $q="SELECT * from book";
        $record=$this->connection->query($q);
        return $record;
    }

    function getissuebook(){
        $q="SELECT * FROM book where bookava!=0";
        $result = $this->connection->query($q);
        return $result;
    }

    function getbookdetails($id){
        $q="SELECT * from book where id='$id'";
        $result=$this->connection->query($q); 
        return $result;
    }

    function issuedata(){
        $q="SELECT * from issue_book";
        $result=$this->connection->query($q);
        return $result;
    }

    function userlogin($email,$pass){
        $q="SELECT * from user_data where email='$email' and password='$pass'";
        $result=$this->connection->query($q);
        if($result->rowCount()>0){
            $q="SELECT * from user_data where email='$email'";
            $result=$this->connection->query($q);
            foreach($result as $row){
                $id=$row[0];
                $name=$row[1];
            }
            header("Location:user_service_dashboard.php?userid=$id&username=$name&msg=Welcome Back $name!!!");
        }
        else
        {
            $q="SELECT * from user_data where email='$email'";
        $result=$this->connection->query($q);
        if($result->rowCount()>0){
            header("Location:index.php?msg=Incorrect Password!!");
        }
        else{
            header("Location:index.php?msg=Login Failed....You are not member of our Library, Contact our Admin for Registration");
        }
    }
    }

    function fetchLoggedUser($id){
        $q="SELECT * from user_data where id='$id'";
        $result=$this->connection->query($q);
       return $result;
    }

    function userbookrequest(){
        $q="SELECT * from book";
        $result = $this->connection->query($q);
        return $result;
    }

    function personbookreport($userid){
        $q="SELECT * from issue_book where userid='$userid'";
        $result=$this->connection->query($q);
        return $result;
    }
}

?>