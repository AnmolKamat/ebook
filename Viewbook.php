<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
       
    </style>
</head>
<body >
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
    <h2 class="buy">View Books</h2>
    <div>
        <?php
        $sql="select * from books";
        $result= mysqli_query($conn,$sql);
        
        while ($row=mysqli_fetch_assoc($result)){
            $i=1;
            echo '

            
            <form class="book" action="transaction.php" method="post">
            <div class="imag"></div>
                <div class="bookinfo">
                    <h1 class="bookname" name="bname">'.$row['bname']. '</h1>
                    
                    <h2 class="bookname"> RS  '.$row['price'].'</h2>
                    <h2 class="bookname">Rating :'.$row['rating'].'</h2> 
                    <h2 class="bookname">Author: '.$row['author'].'</h2>
                    <h2 class="bookname">Publisher: '.$row['publisher'].'</h2>
                    <h2 class="bookname">Category: '.$row['category'].'</h2>
 
                </div>
            </form>';
        }
            ?>
    </div>
        </div>
</body>
</html>