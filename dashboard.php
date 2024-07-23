<?php
ob_start();
session_start();

$setTime= time();
$previousTime=$_SESSION['activity'];


$lifeSpan = ini_get('session.gc_maxlifetime');
$diff = $lifeSpan-($setTime-$previousTime);
$elpasedTime=$setTime-$previousTime;


if($elpasedTime>$lifeSpan-60){
    header("Location:Redirect.php");
}
$connect=mysqli_connect("localhost", "root", "", "test1");
$userID=$_SESSION['user_id'];
$string="SELECT * FROM TRANSACTIONS WHERE user_id='$userID';";
$result=mysqli_query($connect,$string);
if(mysqli_num_rows($result)==0){
header("Location:Redirect.php");
}
mysqli_close($connect);

    $conn=mysqli_connect("localhost", "root", "", "test1");
    if(!$conn){
        echo "Connection Failed!";
    }
    $username=$_SESSION['user_name'];
    $userID=$_SESSION['user_id'];
    $userpass=$_SESSION['user_pass'];
    $query1="select count(*) from transactions where user_id='$userID';";
    $sql=mysqli_query($conn,$query1);
    if(mysqli_num_rows($sql)>0){
        while($rows=mysqli_fetch_assoc($sql)){
            $reportNo=$rows['count(*)'];
        }
    }
    $store=$reportNo;
    $query2="select date_of_generation from transactions where user_id='$userID' order by transaction_id desc limit 1;";
    $sql=mysqli_query($conn,$query2);
    if(mysqli_num_rows($sql)>0){
        while($rows=mysqli_fetch_assoc($sql)){
            $prevDate=$rows['date_of_generation'];
        }
    }
    $reportDate=$prevDate;
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="dashboardStyling.css">
    <script src="timeScript.js"></script>
</head>
<script>
    
    
</script>
<body onload="calcTime(); addListener(); attachEventScroll();" id="body">
<div class="header-border">
    <div class="header">
        <div class="left-header"><img src="logochrist.jpg" class="logo" id="open"></div>
        <div class="right-header">
            <h1>Report Generator CHRIST (Deemed to be University) Delhi NCR</h1>
            <h2>School of Sciences</h2>
        </div>
    </div>
    <div class="scroll-progress-border">
            <div class="scroll-progress-bar"></div>
        </div>
</div>
    <div class="box-container">
        <div class="left-box" id="left-box">
            <div class="profile-container"><img src="images/dashboardprofile.png" class="profile-pic"></div>
            
            <h1>Profile Details: </h1>
            <div class="category">
            
            <p class="category-name">Username: <span class="category-value"><?php echo $username?></span></p>
            <p class="category-name">ID: <span class="category-value"><?php echo $userID?></span></p>
            <p class="category-name">Password: <span class="category-value"><?php echo $userpass?></span></p>
            <p class="category-name">Department: <span class="category-value">Sciences</span></p>
        </div>
        </div>
        <div class="right-container">
        <div class="right-upper-box">
            <div class="cell">
            <div class="img-container">
                <img src='images/stack.svg' class="icon">
            </div>
                <div class="cell-text"><p class="text">Number of Reports Generated: </p></div>
                <div class="cell-value"><p class="value"><?php echo $store?></p></div>
                
                
            </div>
            <div class="cell">
            <div class="img-container">
                <img src='images/alarm.svg' class="icon">
            </div>
            <div class="cell-text"><p class="text">Time Left Before Time-Out: </p></div>
                <div class="cell-value"><p ><span class="value" id="Hours"><?php echo gmdate("H", $diff);?></span><span class="colon">:</span><span class="value" id="Minutes"><?php echo gmdate("i", $diff);?></span><span class="colon">:</span><span class="value" id="Seconds"><?php echo gmdate("s", $diff);?></span></p></div>
                <div class="progress-bar-border">
                    <div class="progress-bar-full">
                        <div class="progress-bar-current" id="current-bar">
                            
                        </div>
                    </div>
                </div>
                <p id="timecheck"><?php echo $diff?></p>
                
                
               
            </div>
            <div class="cell">
            <div class="img-container">
                <img src='images/calendar-check.svg' class="icon">
            </div>
            <div class="cell-text"><p class="text">Date of Generation of Previous Report: </p></div>
                <div class="cell-value"><p class="value" style="margin-top: 7%;"><?php echo $reportDate?></p></div>
            </div>
        </div>
        <div class="right-lower-box">
            <?php
            echo "<table>";
                echo "<tr id='first-row'>";
                echo "<th>Transaction ID</th>";
                echo "<th>Name of the Event</th>";
                echo "<th>Date of Generation</th>";
                echo "</tr>";
                $query3="select transaction_id,eventname,date_of_generation from transactions where user_id='$userID' order by transaction_id desc limit 3;";
                $sql=mysqli_query($conn,$query3);
                if(mysqli_num_rows($sql)>0){
                    while($rows=mysqli_fetch_assoc($sql)){
                        echo "<tr class='not-first'>";
                        echo "<td>".$rows['transaction_id']."</td>";
                        echo "<td>".$rows['eventname']."</td>";
                        echo "<td>".$rows['date_of_generation']."</td>";
                        echo "</tr>";
                    }
                }
            echo "</table>";
            mysqli_close($conn);
            ?>
        </div>
        </div>
        
    </div>
    <div class="themeTrigger" id="toggleTheme">
                <img src='images/lightbulb.svg' class='trigger' id='on'>
                <img src='images/lightbulb-off.svg' class='trigger' id='off'>


    </div>
    
</body>
</html>