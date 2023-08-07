<?php

$openlink="";
if (!empty($_REQUEST['openlink'])) {
    $openlink = $_REQUEST['openlink'];
    echo '<script type="text/javascript">',
     'openCity(onload,$openlink);',
     '</script>'
;
}


$msg = "";
if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}

$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

if ($is_page_refreshed) {
    $_REQUEST['view'] = "";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .outerdiv {
            /* text-align:center; */
            margin: auto;
            margin-top: 3%;
            width: 80%;
        }

        .row {
            width: 70%;
            margin: auto;
        }


        th,
        td {
            text-align: center;
            border: 3px solid white;
            background-color: #caffc1;
        }

        table button {
            color: black;
            background-color: #fff8c6;
            width: 80%;
            border-radius: 4px;
        }

        #bookdetails {
            background-color: #caffc1;
        }

        #bookdetails p {
            /* margin:0 auto; */
            /* float:right; */
            /* overflow: auto; */
        }

        .right {
            /* margin: auto; */
            /* border: 2px solid black; */
            width: 500px;
            float: right;
            /* text-align: center; */
        }

        .clear {
            clear: both;
        }

        form {

            background-color: #caffc1;
            text-align: center;
            padding: 40px;

        }


        input,
        select {
            width: 60%;
            padding: 6px 10px;
            margin: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        h3 {
            text-align: center;
        }

        input[type=submit] {
            width: 45%;

            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .formstyle {

            width: 50%;
            text-align: right;
        }

        span {
            float: left;
            margin-left: 27%;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>



    <div class="alert alert-success">
        <strong>
            <?php echo $msg ?>
        </strong>
    </div>
    <div class="outerdiv">
        <div class="row"><img class="imglogo" src="images/logo.png" /></div>
        <div class="tab">

            <button class="tablinks" onclick="openCity(event, 'addbook')">ADD BOOK</button>
            <button class="tablinks" onclick="openCity(event, 'addstudent')">ADD STUDENT</button>
            <button class="tablinks" onclick="openCity(event, 'studentrecord')">STUDENT REPORT</button>
            <button class="tablinks" onclick="openCity(event, 'issuebook')">ISSUE BOOK</button>
            <button class="tablinks" onclick="openCity(event, 'bookrequest')">BOOK REQUESTS</button>
            <button class="tablinks" onclick="openCity(event, 'bookrecord')">BOOK REPORT</button>
            <button class="tablinks" onclick="openCity(event, 'issuereport')">ISSUE REPORT</button>
            <a href="index.php"><button>LOG OUT</button></a>
            <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
        </div>



        <!-- <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p>
        </div> -->

        <div id="addbook" class="tabcontent">
            <div>
                <form action="addbookserver_page.php" method="post">
                    <h3>ADD NEW BOOK</h3>
                    <div class="formstyle">
                        <label for="bookname">Book Name: </label><input type="text" name="bookname" id="bookname"> <br>
                        <label for="bookdetail">Detail: </label><input type="text" name="bookdetail" id="bookdetail">
                        <br>
                        <label for="bookauthor">Author: </label><input type="text" name="bookauthor" id="bookauthor">
                        <br>
                        <label for="bookpub">Publication: </label><input type="text" name="bookpub" id="bookpub"><br>
                        <span>Branch:</span>
                        <label class="radiocontainer">IT
                            <input type="radio" name="branch" id="IT" value="IT"></label>
                        <label class="radiocontainer">CSE
                            <input type="radio" name="branch" id="CSE" value="CSE"></label>
                        <label class="radiocontainer">EEE
                            <input type="radio" name="branch" id="EEE" value="EEE"></label>
                        <label class="radiocontainer">Civil
                            <input type="radio" name="branch" id="Civil" value="Civil"></label>



                        <br>

                        <label for="bookprice">Price: </label><input type="text" name="bookprice" id="bookprice"> <br>
                        <label for="bookquant">Quantity: </label><input type="text" name="bookquant" id="bookquant">
                        <br>
                        <label for="bookpic">Book Photo: </label><input type="file" name="bookpic" id="bookpic"> <br>
                    </div>
                    <input type="submit" name="submit" value="SUBMIT">
                </form>
            </div>
        </div>

        <div id="addstudent" class="tabcontent">
            <div>
                <form action="addpersonserver_page.php" method="post">
                    <h3>ADD STUDENT</h3>
                    <div class="formstyle">
                        <label for="username">Name: </label><input type="text" name="username" id="username"> <br>
                        <label for="useremail">Email: </label><input type="email" name="useremail" id="useremail"> <br>
                        <label for="userpass">Password: </label><input type="text" name="userpass" id="userpass"> <br>
                        <label>Choose Type: </label><select name="type">
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select><br>
                    </div>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>

        </div>

        <div class="tabcontent" id="studentrecord">
            <div>
                <?php
                include('dataclass.php');
                $obj = new data();
                $obj->setConnection();
                $store = $obj->studentrecord();
                $rowdata = $store->fetchALL();
                $table = "<table style='width:100%'><tr><th>ID</th><th>Name</th><th>Email</th><th>Type</th></tr>";
                foreach ($rowdata as $row) {
                    $table .= "<tr>";
                    $table .= "<td>$row[0]</td>";
                    $table .= "<td>$row[1]</td>";
                    $table .= "<td>$row[2]</td>";

                    $table .= "<td>$row[4]</td>";
                    $table .= "</tr>";
                }
                $table .= "</table>";
                echo $table;
                ?>
            </div>
        </div>

        <div class="tabcontent" id="issuebook">
            <div>
                <form action="issuebook_server.php" method="post">
                    <h3>ISSUE BOOK</h3>
                    <div class="formstyle">
                        <label>Choose Book: </label>
                        <select name="bookname">
                            <?php
                            $obj = new data();
                            $obj->setConnection();
                            $result = $obj->getissuebook();
                            foreach ($result as $row) {
                                // 2
                                // echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
                                echo "<option value='$row[2]'> $row[2]</option>";
                            }
                            ?>
                        </select>
                        </br>
                        <label>Select Student: </label>
                        <select name="studentname">
                            <?php

                            $obj = new data();
                            $obj->setConnection();
                            $result = $obj->studentrecord();
                            foreach ($result as $row) {
                                echo "<option>$row[1] </option>";
                            }

                            ?>
                        </select>
                        </br>
                        <label for="days">Days: </label><input type="number" name="days">
                        </br>
                    </div>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>


        <div class="tabcontent" id="bookrecord">
            <div>
                <?php
                // include('dataclass.php');
                $obj = new data();
                $obj->setConnection();
                $result = $obj->bookrecord();
                $rowdata = $result->fetchALL();
                $table = "<table style='width:100%'><tr><th>Book Name</th><th>Price</th><th>Quantity</th><th>Available</th><th>Rent</th><th>View</th></tr>";
                foreach ($rowdata as $row) {
                    $table .= "<tr>";
                    $table .= "<td>$row[2]</td>";
                    $table .= "<td>$row[7]</td>";
                    $table .= "<td>$row[8]</td>";
                    $table .= "<td>$row[9]</td>";
                    $table .= "<td>$row[10]</td>";
                    $table .= "<td><a href='admin_service_dashboard.php?view=$row[0]'><button type='button'>View BOOK</button</a></td>";
                    $table .= "</tr>";
                    // <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                }
                $table .= "</table>";
                echo $table;

                // $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                ?>
            </div>
        </div>

        <div class="tabcontent" id="bookdetails" style="<?php if (!empty($_REQUEST['view'])) {
            echo "display:block";
            $id = $_REQUEST['view'];
        } else {
            echo "display:none";
        } ?> ">
            <div>
                <h2 style="text-align: center;">Book Details</h2>

                <?php
                $obj = new data();
                $obj->setConnection();
                $result = $obj->getbookdetails($id);
                foreach ($result as $row) {
                    $bookid = $row[0];
                    $bookpic = $row[1];
                    $bookname = $row[2];
                    $bookdetail = $row[3];
                    $bookauthor = $row[4];
                    $bookpub = $row[5];
                    $branch = $row[6];
                    $bookprice = $row[7];
                    $bookquantity = $row[8];
                    $bookava = $row[9];
                    $bookrent = $row[10];

                }

                ?>
                <img src="images/<?php echo $bookpic ?>" width='150px' height='150px'
                    style='border:1px solid #333333; float:left;margin-left:80px;margin-top:20px'>
                <div class="right">

                    <p><b><u>Book Name:</u> &nbsp&nbsp</b>
                        <?php echo $bookname ?>
                    </p>
                    <p><b><u>Book Detail:</u> &nbsp&nbsp</b>
                        <?php echo $bookdetail ?>
                    </p>
                    <p><b><u>Book Author:</u> &nbsp&nbsp</b>
                        <?php echo $bookauthor ?>
                    </p>
                    <p><b><u>Book Publisher:</u>&nbsp&nbsp </b>
                        <?php echo $bookpub ?>
                    </p>
                    <p><b><u>Branch:</u>&nbsp&nbsp </b>
                        <?php echo $branch ?>
                    </p>
                    <p><b><u>Book Price:</u> &nbsp&nbsp</b>
                        <?php echo $bookprice ?>
                    </p>
                    <p><b><u>Book Available:</u> &nbsp&nbsp</b>
                        <?php echo $bookava ?>
                    </p>
                    <p><b><u>Book On Ren:</u> &nbsp&nbsp</b>
                        <?php echo $bookrent ?>
                    </p>

                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="tabcontent" id="issuereport">
            <div>
                <?php
                $obj = new data();
                $obj->setConnection();
                $result = $obj->issuedata();
                $table = "<table width='100%'><tr><th>Issuer's Name</th><th>Book Issued</th><th>Issuer's Type</th><th>Issued Date</th><th>Last Date</th><th>Fine</th></tr>";
                foreach ($result as $row) {
                    $table .= "<tr>";
                    $table .= "<td>$row[2]</td>";
                    $table .= "<td>$row[3]</td>";
                    $table .= "<td>$row[4]</td>";
                    $table .= "<td>$row[6]</td>";
                    $table .= "<td>$row[7]</td>";
                    $table .= "<td>$row[8]</td>";
                    $table .= "</tr>";
                }
                $table .= "</table>";
                echo $table;
                ?>
            </div>
        </div>

        <div class="tabcontent" id="bookrequest">
            <div>
                <?php
                $obj = new data();
                $obj->setConnection();
                $result = $obj->fetchrequest();
                $table = "<table width='100%'><tr><th>Username</th><th>Usertype</th><th>Bookname</th><th>Issuedays</th><th>Request</th></tr>";
                foreach ($result as $row) {
                    $table .= "<tr>";
                    $table .= "<td>$row[3]</td>";
                    $table .= "<td>$row[4]</td>";
                    $table .= "<td>$row[5]</td>";
                    $table .= "<td>$row[6]</td>";
                    $table .= "<td><a href='admin_bookrequest.php?userid=$row[1]&bookid=$row[2]&studentname=$row[3]&bookname=$row[5]&days=$row[6]&usertype=$row[4]'><button>Approve Request</button></a></td>";
                    $table .= "</tr>";
                }

                $table .= "</table>";
                echo $table;
                ?>
            </div>
        </div>




    </div>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>








    <!-- 
        <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/logo.png"/></div>
            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
    <!-- <br>
                <Button class="greenbtn" onclick="openpart('addbook')" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/>  ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" > <img class="icons" src="images/icon/open-book.png" width="30px" height="30px"/> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> STUDENT REPORT</Button>
                <Button class="greenbtn"  onclick="openpart('issuebook')"> <img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> <img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">
                <div class= "addbookclass" id="addbook">
                    <p>ADD NEW BOOK</p>
                    <form action ="addbookserver_page.php" method="post">
                        <label for ="bookname">Book Name: </label><input type = "text" name="bookname" id="bookname"> <br>
                        <label for ="bookdetail">Detail: </label><input type = "text" name="bookdetail" id="bookdetail"> <br>
                        <label for ="bookauthor">Author: </label><input type = "text" name="bookauthor" id="bookauthor"> <br>
                        <label for ="bookpub">Publication: </label><input type = "text" name="bookpub" id="bookpub"><br> 
                        <label>Branch: </label>
                        <input type = "radio" name="branch" id="IT" value="IT">IT
                        <input type = "radio" name="branch" id="CSE" value="CSE">CSE
                        <input type = "radio" name="branch" id="EEE" value="EEE">EEE
                        <input type = "radio" name="branch" id="Civil" value="Civil">Civil
                     <br>
                        <label for ="bookprice">Price: </label><input type = "text" name="bookprice" id="bookprice"> <br>
                        <label for ="bookquant">Quantity: </label><input type = "text" name="bookquant" id="bookquant"> <br>
                        <label for ="bookpic">Book Photo: </label><input type = "file" name="bookpic" id="bookpic"> <br>
                        <input type = "submit" name="submit" value="SUBMIT"> 
                    </form>
                </div>
            </div> -->




</body>

</html>