<?php
$userid="";
if(!empty($_REQUEST['userid'])){
    $userid=$_REQUEST['userid'];
}

$username="";
if(!empty($_REQUEST['username'])){
    $username=$_REQUEST['username'];
}

$msg = "";
if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}

$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
 
if($is_page_refreshed ) {
  $_REQUEST['view']="";
//   $msg="";
} 

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
            width: 79%;
        }

        .row {
            width:70%;
            margin:auto;
        }

        #addbook {
            text-align: center;
        }

        th,
        td {
            text-align: center;
            border:3px solid white;
            background-color:#caffc1;
        }
        table button{
            color:black;
            background-color: #fff8c6;
            width:80%;
            border-radius: 4px;
        }
        #bookdetails{
            background-color:#caffc1;
        }
        #bookdetails p{
            /* margin:0 auto; */
            /* float:right; */
            /* overflow: auto; */
        }
        .right{
            /* margin: auto; */
            /* border: 2px solid black; */
            width:500px;
            float:right;
            /* text-align: center; */
        }
        .clear{
            clear: both;
        }
        
    </style>
</head>

<body>



<div class="alert alert-success">
    <strong><?php echo $msg?></strong> 
  </div>
    <div class="outerdiv">
        <div class="row" ><img  class="imglogo" src="images/logo.png" /></div>
        <div class="tab">
           
            <button class="tablinks" onclick="openCity(event, 'myaccount')">MY ACCOUNT</button>
            <button class="tablinks" onclick="openCity(event, 'requestbook')">REQUEST BOOK</button>
            <button class="tablinks" onclick="openCity(event, 'bookreport')">BOOK REPORT</button>
            <a href="index.php"><button>LOG OUT</button></a>
            <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
        </div>

    

      <div class="tabcontent" id="myaccount">
      <div>
        <?php
        include('dataclass.php');
        $obj=new data();
        $obj->setConnection();
        $result = $obj->fetchLoggedUser($userid);
        foreach($result as $row){
            $username=$row[1];
            $useremail=$row[2];
            $usertype=$row[4];
        } 
        echo "User Name :".$username."<br>";
        echo "User Email :".$useremail."<br>";
        echo "User Type :".$usertype."<br>";
        
        
        ?>
        </div>
        </div>


        <div class="tabcontent" id="requestbook">
        <div>
            <?php
            $obj=new data();
            $obj->setConnection();
            $result=$obj->userbookrequest();
            $table = "<table style='width:100%'><tr><th>Book Photo</th><th>Book Name</th><th>Book Author</th><th>Branch</th><th>Price</th><th>Request Book</th></tr>";
            foreach($result as $row){
                $table.="<tr>";
                $table.="<td><img src='images/$row[1]' width='150px' height='150px' style='margin-top:10px;margin-bottom:10px'></td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                // $table.="<td><a href='user_service_dashboard.php'><button>Request Book</button></td>";
                $table.="<td><a href='user_service_dashboard.php?userid=$userid&username=$username'><button>Request Book</button></a></td>";

            }
            $table.="</table>";
            echo $table;

        ?>
        </div>
        </div>

            <div class="tabcontent" id="bookreport">

            <div>
                <?php
                
                    $obj=new data();
                    $obj->setConnection();
                    $result=$obj->personbookreport($userid);
                    $table="<table style='width:100%'><tr><th>Issued By</th><th>Book Name</th><th>Issue Date</th><th>Last Date</th><th>Fine</th><th>Return Book</th></tr>";
                    foreach($result as $row){
                        $table.="<tr>";
                        $table.="<td>$username</td>";
                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[6]</td>";
                        $table.="<td>$row[7]</td>";
                        $table.="<td>$row[8]</td>";
                        $table.="<td><a href='user_service_dashboard.php?username=$username&userid=$userid'><button>Return</button></a></td>";
                        $table.="</tr>";
                    }
                    $table.="</table>";
                    echo $table;
                
                ?>
            </div>

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




</body>

</html>