<?php
    include "connection.php";
    session_start();
    error_reporting(0);  
    $name=$_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>

    <!-- css -->
    <style>
        body {
            margin: 0;
            background-image: url("main.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
            position: relative;
        }
        p{
            size: 200px;
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
        .buy{
            position: absolute;
            left:800px;
            font-family: 'Heebo', sans-serif;
            font-family: 'Quicksand', sans-serif;
            color:white;
            display: inline;
            position: absolute;
            top:50px;
        }
        .book {
            margin: 2px auto 2px auto;
            background: rgba(255, 255, 255, 0.767);
            width: 90%;
            border: solid none;
            border-color: none;
            height: 200px;
            border-radius: 20px;
        }
        
        .imag {
            float: right;
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQg4h9HOwMPH64ECXOo1KlJ84P-xTNdjVSOp8KoLKGPNZ_PDTLTm5Q0ONfKvag9XKmkbf0&usqp=CAU ");
            margin: 10px 10px auto 10px;
            background-size: cover;    
            border-radius: 50%; 
            width: 10%; 
            height: 155px;
            
           }
        
        .bookinfo {
            position: absolute;
            margin: 0px;
            margin-left: 10px;
        }
        
        .bookname {
            margin: 0%;
            color: black;
            /* display: inline; */
        }
        .gap{
            height: 100px;
        }
        .checked {
        color: orange;
        }
        .buybtn{
            position: absolute;
            padding:8px;
            background-color:#ff8960;
            border: solid #ff8960;
            color: black;
            border-radius: 10px;
            text-decoration: none;
            top :150px;        
        }
        .bname{
            visibility: hidden;
        }
       

    </style>
</head>
<body>
     <div class="nav">
        <h1>EBOOK MANAGEMENT SYSTEM</h1>
        
        <ul>
            <li><a href="home.php" class="navlink">Home</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="about.html" class="navlink">About us</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="contactus.html" class="navlink">Contact us</a></li>
            <li>&nbsp; &nbsp;</li>
            <li><a href="login.php" class="navlink" >Logout</a></li>
            <li>&nbsp;&nbsp;</li>


        </ul>
    </div>
    <div class="gap"></div>
    <h2 class="buy">Buy Books</h2>
    <div>
       <?php
        $sql="select * from books where bookid not in (select bid from userbooks where uid =(select uid from users where username='$name')); ";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query)){
            echo'
            <div  class="book">
            <div class="imag"></div>
            <form class ="bookinfo" action="transaction.php" method="POST">
                <p class="bookname">'.$row['bname'].'</p>
                <p class="bookname">Price: '.$row['price'].'</p>
                <p class="bookname">Category: '.$row['category'].'</p>
                <p class="bookname">Rating: '.$row['rating'].'</p>
                <p class="bookname">ategory'.$row['bnmae'].'</p>
                <p class="bookname">By : '.$row['author'].'</p>
                <p class="bookname">Published By: '.$row['publisher'].'</p>
                <input type="text" class="bname" name="bname" value="'.$row['bname'].'">
                <input type="submit" class="buybtn" name="buybtn" value="BUY">
                
        
        
            </form>
            </div>
            ';
        }
       ?>
    </div>
</body>
</html>
