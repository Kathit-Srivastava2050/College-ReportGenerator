    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
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
			<form class="login"  method="POST">
				<div class="login__field">

					<input type="text" class="login__input" placeholder="UserId" name="userId">
				</div>
				<div class="login__field">
					<input type="password" class="login__input" placeholder="Password" name="userPassword">
				</div>
				<button class="button login__submit">
					<span class="button__text">Login</span>
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

            $userId = $_POST["userId"];
            $password = $_POST["userPassword"];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM users WHERE userId='$userId';";
            $result = mysqli_query($conn, $sql) or die("Query failed");

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $storedHashedPassword = $row['userPassword'];

             
                if (password_verify($password, $storedHashedPassword)) {
                    $storingname=$row['userName'];
                    $storingid=$row['userId'];
                    $_SESSION['user_id'] = $storingid;
                    $_SESSION['user_name']= $storingname;
                    $_SESSION['user_pass']=$password;
                    $_SESSION['activity']=time();
                    $_SESSION['timestamp']=new DateTime();
                    header("location: index.php");
                } else {
                    echo "Invalid username or password.";
                }
            } else {
                echo "Invalid username or password.";
            }

            mysqli_close($conn);
        }
        ?>


    </body>

    </html>