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
   
            header("Location:admin_service_dashboard.php?msg=Welcome Admin!!!");
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
        $q = "SELECT * from book where bookname='$bookname'";
        $result = $this->connection->query($q);
        if ($result->rowCount() > 0) {
            header("Location:admin_service_dashboard.php?msg=Book named $bookname already exists!!!");
        } else {
            $q = "INSERT INTO book(bookpic,bookname,bookdetail,bookauthor,bookpub,branch,bookprice,bookquantity,bookava,bookrent) 
        values('$bookpic','$bookname','$bookdetail','$bookauthor','$bookpub','$branch','$bookprice','$bookquant','$bookquant','0')";



            if ($this->connection->query($q)) {
                header("Location:admin_service_dashboard.php?msg=Book Added Successfully!!");
            } else {
                header("Location:admin_service_dashboard.php?msg=Book Not Added ..Try Again");
            }
        }

    }

    function addperson($name, $email, $pass, $type)
    {
        $this->username = $name;
        $this->useremail = $email;
        $this->userpass = $pass;
        $this->usertype = $type;

        $q = "SELECT * from user_data where email='$email' and name='$name'";
        $result = $this->connection->query($q);
        if ($result->rowCount() > 0) {
            header("Location:admin_service_dashboard.php?msg=User already Exist!!");
        } else {

            $q = "SELECT * from user_data where email='$email' or name='$name'";
            $result = $this->connection->query($q);
            if ($result->rowCount() > 0) {
                header("Location:admin_service_dashboard.php?msg=Enter unique Email-id and Student Name!!!");
            } else {

                $q = "INSERT INTO `user_data` (`name`,`email`,`password`,`type`) VALUES('$name','$email','$pass','$type')";
                if ($this->connection->exec($q)) {
                    header("Location:admin_service_dashboard.php?msg=Student Added Successfully!!!");
                } else {
                    header("Location:admin_service_dashboard.php?msg=Student Not Added ..Try Again");
                }
            }




        }

    }


    function registerperson($name, $email, $pass, $type){
        $this->username = $name;
        $this->useremail = $email;
        $this->userpass = $pass;
        $this->usertype = $type;

        $q = "SELECT * from user_data where email='$email' and name='$name'";
        $result = $this->connection->query($q);
        if ($result->rowCount() > 0) {
            header("Location:registernewuser.php?msg=User already Exist!!");
        } else {

            $q = "SELECT * from user_data where email='$email' or name='$name'";
            $result = $this->connection->query($q);
            if ($result->rowCount() > 0) {
                header("Location:registernewuser.php?msg=Enter unique Email-id and Student Name!!!");
            } else {

                $q = "INSERT INTO `user_data` (`name`,`email`,`password`,`type`) VALUES('$name','$email','$pass','$type')";
                if ($this->connection->exec($q)) {
                    header("Location:registernewuser.php?msg=Registered Successfully!!!");
                } else {
                    header("Location:registernewuser.php?msg=Registration Failed ...Try Again");
                }
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
            $username = $row['name'];
        }

        $q = "SELECT * from book  where bookname='$bookname'";
        $result = $this->connection->query($q);
        foreach ($result as $row) {
            $id = $row['id'];
            $bookavail = $row['bookava'] - 1;
            $bookrent = $row['bookrent'] + 1;


        }

        $q = "SELECT * from issue_book where userid='$userid' and issuebook='$bookname' ";
        $result = $this->connection->query($q);
        if ($result->rowCount() > 0) {
            header("Location:admin_service_dashboard.php?msg=Book named $bookname is already Issued to $username");

        } else {

            $q = "UPDATE book SET bookava= '$bookavail' , bookrent='$bookrent' where id='$id'";
            if ($this->connection->exec($q)) {

                $q = "INSERT into issue_book (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine) VALUES('$userid','$personname','$bookname','$type','$days','$issuedate','$returndate','0')";
                if ($this->connection->exec($q)) {
                    header("Location:admin_service_dashboard.php?msg=Book Issued Successfully!!");
                } else {
                    header("Location:admin_service_dashboard.php?msg=Book Not Issued but book status updated in db..Try Again ");
                }
            } 
            else {
                header("Location:admin_service_dashboard.php?msg=Book Not Issued and not updated..Try Again ");
            }
        }
    }
    function bookrecord()
    {
        $q = "SELECT * from book";
        $record = $this->connection->query($q);
        return $record;
    }

    function getissuebook()
    {
        $q = "SELECT * FROM book where bookava!=0";
        $result = $this->connection->query($q);
        return $result;
    }

    function getbookdetails($id)
    {
        $q = "SELECT * from book where id='$id'";
        $result = $this->connection->query($q);
        return $result;
    }

    function issuedata()
    {
        $q = "SELECT * from issue_book";
        $result = $this->connection->query($q);
        return $result;
    }

    function userlogin($email, $pass)
    {
        $q = "SELECT * from user_data where email='$email' and password='$pass'";
        $result = $this->connection->query($q);
        if ($result->rowCount() > 0) {
            $q = "SELECT * from user_data where email='$email'";
            $result = $this->connection->query($q);
            foreach ($result as $row) {
                $id = $row[0];
                $name = $row[1];
            }
            header("Location:user_service_dashboard.php?userid=$id&username=$name&msg=Welcome Back $name!!!");
        } else {
            $q = "SELECT * from user_data where email='$email'";
            $result = $this->connection->query($q);
            if ($result->rowCount() > 0) {
                header("Location:index.php?msg=Incorrect Password!!");
            } else {
                header("Location:index.php?msg=Login Failed....You are not member of our Library, Contact our Admin for Registration");
            }
        }
    }

    function fetchLoggedUser($id)
    {
        $q = "SELECT * from user_data where id='$id'";
        $result = $this->connection->query($q);
        return $result;
    }

    function userbookrequest($userid)
    {

        $q = "SELECT issuebook from issue_book where userid='$userid'";
        $notissuedbooks = "SELECT * from book where bookname not in($q) and bookava!=0";
        $result = $this->connection->query($notissuedbooks);
        return $result;


        // $q = "SELECT * from book";
        // $result = $this->connection->query($q);
        // return $result;
    }

    function personbookreport($userid)
    {
        $q = "SELECT * from issue_book where userid='$userid'";
        $result = $this->connection->query($q);
        return $result;
    }

    function requestbookclick($bookid, $userid )
    {
        $q = "SELECT * from user_data where id='$userid'";
        $result = $this->connection->query($q);
        foreach ($result as $row) {
            $usertype = $row[4];
            $username = $row[1];
        }
        $q = "SELECT * from book where id='$bookid'";
        $result = $this->connection->query($q);
        foreach ($result as $row) {

            $bookname = $row[2];

        }
        if ($usertype == 'student') {

            $q = "INSERT into request_book (userid,bookid,username,usertype,bookname,issuedays)VALUES('$userid','$bookid','$username','$usertype','$bookname','7')";
        } else {
            $q = "INSERT into request_book (userid,bookid,username,usertype,bookname,issuedays)VALUES('$userid','$bookid','$username','$usertype','$bookname','21')";
        }
        if ($this->connection->exec($q)) {
            header("Location:user_service_dashboard.php?userid=$userid&msg=Book named $bookname Requested Successfully!!&clicked=true&clickedbookid=$bookid");
        }
    }

    function fetchrequest()
    {
        $q = "SELECT * from request_book";
        $result = $this->connection->query($q);
        return $result;
    }



   




    function bookrequest($userid, $bookid, $personname, $usertype, $bookname, $days, $issuedate, $returndate)
    {

        $q = "INSERT INTO issue_book (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine) VALUES('$userid','$personname','$bookname','$usertype','$days','$issuedate','$returndate',0)";
        if ($this->connection->exec($q)) {

            $q = "DELETE from request_book where userid='$userid' and bookid='$bookid'";
            if ($this->connection->exec($q)) {
                $q = "SELECT * from book where bookname='$bookname'";
                $result = $this->connection->query($q);

                foreach ($result as $row) {
                    $bookavailable = $row['bookava'] - 1;
                    $booksonrent = $row['bookrent'] + 1;
                }

                $q = "UPDATE book SET bookava='$bookavailable' , bookrent='$booksonrent'   where bookname = '$bookname'";
                if ($this->connection->exec($q)) {

                    header("Location:admin_service_dashboard.php?msg=Book Requested by $personname is approved!!! ");
                }

            }
        }
    }

    function checkrequestedstatus($userid, $bookid)
    {
        $q = "SELECT * from request_book where userid='$userid' and bookid='$bookid'";
        $result = $this->connection->query($q);
        return $result;

    }




    function returnbook($userid, $bookname)
    {
        $q = "DELETE FROM issue_book where userid='$userid' and issuebook = '$bookname'";
        if ($this->connection->exec($q)) {
            $q = "SELECT * from book where bookname='$bookname'";
            $result = $this->connection->query($q);

            foreach ($result as $row) {
                $bookavailable = $row['bookava'] + 1;
                $booksonrent = $row['bookrent'] - 1;
            }

            $q = "UPDATE book SET bookava='$bookavailable' , bookrent='$booksonrent'   where bookname = '$bookname'";
            if ($this->connection->exec($q)) {
                header("Location:user_service_dashboard.php?userid=$userid&msg=Book named $bookname Returned Successfully!!!");
            }
        }

    }
}

?>