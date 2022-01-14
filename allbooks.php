<?php
    include "connection.php";
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css  -->
    <style>
        body {
            margin: 0;
            background-image: url("main.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
            position: relative;
        }
        p{
            size: 20px;
            margin: 0;
            font-family: 'Heebo', sans-serif;
            font-family: 'Quicksand', sans-serif;
            display: inline;
        }
        #logout{
            visibility: hidden;
        }
        
        .nav {
            display: flex;
            position: fixed;
            background: rgb(179, 179, 186);
            background: linear-gradient(90deg, rgba(179, 179, 186, 1) 0%, rgba(0, 0, 0, 1) 0%, rgba(44, 51, 54, 0.2945553221288515) 100%);
            top: -20px;
            width: 100%;
            justify-content: space-between;
        }
        
        h1 {
            display: inline-block;
            font-family: 'Heebo', sans-serif;
            font-family: 'Quicksand', sans-serif;
            color: aliceblue;
        }
        
        ul {
            position: absolute;
            top: 15px;
            left: 1350px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        
        li {
            display: inline;
            float: left;
        }
        
        .navlink {
            display: block;
            padding: 8px;
            color: black;
            background-color: white;
            border: 1px solid;
            border-radius: 2px;
            border-color: white;
            text-decoration: none;
        }
        
        .navlink:hover {
            color: white;
            background-color: black;
            border-color: black;
        }
        .books{
            display: flex;
            justify-content: space-evenly;
            margin: 10px auto;
            left: 87px;
            width: 90%;
            height: 40px;  
            background: rgba(255, 255, 255, 0.767);        
            border: solid none;
            border-radius: 20px;

        }
        .gap{
            height: 100px;
            margin-top: 50px;

        }
        .bookinfo{
            margin-top: 8px;
        }
    </style>
</head>
<body>
<div class="nav">
        <h1>EBOOK MANAGEMENT SYSTEM</h1>
        <ul>
            <li><a href="admin.php" class="navlink">Home</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="about.html" class="navlink">About us</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="contactus.html" class="navlink">Contact us</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="login.php" class="navlink" >Logout</a></li>
            <li>&nbsp;&nbsp;</li>
        

        </ul>
    </div>
    <div class ="gap">
        <center><h1>All Books</h1></center>
    </div>
    <?php
        $sql="select * from books;";
        $query=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($query)){
            echo '
                <div class="books">
                <p class="bookinfo">'.$row['bookid'].'</p>
                <p class="bookinfo">'.$row['bname'].'</p>
                </div>';
        }
    ?>
</body>
</html>