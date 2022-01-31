<?php
    include "connection.php";
    if (isset($_POST['buybtn']))
    {

    
    session_start();
    $uname=$_SESSION['username'];
    $bname=$_POST['bname'];
    
    
    $sql="select * from books;";
    $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($query))
    {
        if ($row['bname']==$bname) 
        {
            $bid=$row['bookid'];
            $price=$row['price'];
        }
    }
    $_SESSION['bid']=$bid;
    $_SESSION['price']=$price;
    // $bookid=(int) $bid;
    // $totalamt=(int) $price;

    $sql0="select * from users;";
    $query0=mysqli_query($conn,$sql0);
    while($row0=mysqli_fetch_assoc($query0)){
        if($uname==$row0['username'])
            $uid=$row0['id'];
    }
    $_SESSION['uid']=$uid;

}
    if(isset($_POST['bbtn']))
    {
        session_start();
        $bid=$_SESSION['bid'];
        $price=$_SESSION['price'];
        $tid=rand(100,1000);
        $date=date("Y/m/d");
        $uid=$_SESSION['uid'];
        $mot=filter_input(INPUT_POST, 'mot', FILTER_SANITIZE_STRING);
        $sql1="insert into transaction values('$tid','$mot','$date','$price')";
        $query1=mysqli_query($conn,$sql1);
        $sql2="insert into orders values('$uid','$bid','$tid','$date')";
        $query2=mysqli_query($conn,$sql2);
        $sql3="insert into userbooks values('$uid','$bid')";
        $query3=mysqli_query($conn,$sql3);
        }
  ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .bookname{
            font-size: 30px;
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
            margin-top: 30px;
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
        .main{
            height: 400px;
            width: 600px;
            border-radius: 20px;
            margin-left: 620px;
            
            background-color: rgba(255, 255, 255, 0.767);
        }
        .gap{
            height: 100px;
        }
        .main_head{
            color: black;
        }
        .bookname{
            display: block;
        }
        
        select{
            display: block;
        }
        .btn {
        background: #49b4fc;
        background-image: -webkit-linear-gradient(top, #49b4fc, #0084d6);
        background-image: -moz-linear-gradient(top, #49b4fc, #0084d6);
        background-image: -ms-linear-gradient(top, #49b4fc, #0084d6);
        background-image: -o-linear-gradient(top, #49b4fc, #0084d6);
        background-image: linear-gradient(to bottom, #49b4fc, #0084d6);
        -webkit-border-radius: 16;
        -moz-border-radius: 16;
        border-radius: 16px;
        -webkit-box-shadow: 3px 6px 7px #666666;
        -moz-box-shadow: 3px 6px 7px #666666;
        box-shadow: 3px 6px 7px #666666;
        font-family: Arial;
        color: #ffffff;
        font-size: 31px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        margin-top: 100px;
        }

        .btn:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
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
    <div class="main">
        <form action="transaction.php" method="post" class="form">
        <center><h1 class="main_head">Buy book</h1></center>
        <center><p class="bookname">Book:<?php echo $bname?></p></center>
        <center><select name="mot"  class="select" style="width:200px;" >
            <option value="none">------</option>
            <option value="upi">UPI</option>
            <option value="debit">Debit Card</option>
            <option value="credit">Credit Card</option>
            <option value="net">Net Banking</option>
        </select></center>
        <center><input type="submit" value="buy" name="bbtn" class="btn"></center>
        </form>
    </div>
    

</body>
</html>