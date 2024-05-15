<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="LoginStyling.css">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="left-header"><img src="logochrist.jpg" class="logo" id="open"></div>
        <div class="right-header">
            <h1>Report Generator CHRIST (Deemed to be University) Delhi NCR</h1>
            <h2>School of Sciences</h2>
        </div>
    </div>

	<div class="screen">
		<div class="screen__content">
			<form class="login">    
				<div class="login__field">
					<input type="text" class="login__input" placeholder="UserId" name="userId">
				</div>
				<div class="login__field">
					<input type="text" class="login__input" placeholder="Current Password" name="current_password"> 
				</div>
				<div class="login__field">
					<input type="text" class="login__input" placeholder="New Password" name="new_password">
				</div>
				<div class="login__field">
					<input type="text" class="login__input" placeholder="Confirm Password" name="confirm_password">
				</div>
				
				<button class="button login__submit">
					<span class="button__text">Change Password</span>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

    <?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("127.0.0.1:3306", "root", "", "test1");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $user_id = $_SESSION['userId'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    

    if ($new_password !== $confirm_password) {
        echo "New password and confirm password do not match.";
    } else {
       
        $hashedNewPassword = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "SELECT userPassword FROM users WHERE userId='$user_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $storedHashedPassword = $row['userPassword'];
            if (password_verify($current_password, $storedHashedPassword)) {
               
                $updateSql = "UPDATE users SET userPassword='$hashedNewPassword' WHERE userId='$user_id'";
                
                if (mysqli_query($conn, $updateSql)) {
                    echo "Password changed successfully.";
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "User not found.";
        }
    }

    mysqli_close($conn);
}
?>


</body>
</html>