<?php
session_start();

$lifeSpan=ini_get('session.gc_maxlifetime');
$elapsedTime=time();

$conn=mysqli_connect("localhost","root","","test1");
if(!$conn){
    echo "Connection Failed";
}
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])&&isset($_SESSION['activity'])&&$elapsedTime-$_SESSION['activity']<$lifeSpan-60){


$storevalue=$_SESSION['user_id'];
$sql="SELECT * FROM transactions where user_id='$storevalue';";
$query=mysqli_query($conn,$sql);

}
else{
    header("Location:Redirect.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User History</title>
    <link rel='stylesheet' href='history.css'>
</head>
<body>
    

    <?php
    $i=0;
    echo "<table>";
    echo "<tr id='headerrow'>";
    echo "<th>Transaction Number</th>";
    echo "<th>Name of the Event</th>";
    echo "<th>Date of Generation of Report</th>";
    echo "</tr>";
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){

            echo "<tr class='transactions'>";
            echo "<td id='transaction$i'>".$row['transaction_id']."</td>";
            echo "<td>".$row['eventname']."</td>";
            echo "<td>".$row['date_of_generation']."</td>";
            echo "</tr>";
            $i++;
        }
    }
    echo "</table>";
    
    ?>
    <script>
        var transactionArray=document.getElementsByClassName("transactions");
        for(let i=0; i<transactionArray.length; i++){
            document.getElementsByClassName("transactions")[i].addEventListener("click", function(){
                    let idvalue=document.getElementById(`transaction${i}`).textContent;
                    var cookieSentence=`theID=${idvalue}; path=/`;
                    document.cookie=cookieSentence;
                    window.location.href="report2.php";
            });
        }
        
    </script>
</body>
</html>