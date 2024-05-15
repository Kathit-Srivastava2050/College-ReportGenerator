<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Generator</title>
</head>

<body>
    <h2>Hash Generator</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="text">Enter Text:</label>
        <input type="text" id="text" name="text" required>
        <input type="submit" value="Generate Hash">
    </form>

    <?php
    $conn = mysqli_connect("127.0.0.1:3306", "root", "", "test1");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $faculty = array(
        array('id' => 1, 'name' => 'Dr. BOSCO PAUL ALAPATT'),
        array('id' => 2, 'name' => 'Dr. ASHISH SHARMA'),
        array('id' => 3, 'name' => 'Dr. ABHINAV SINGHAL'),
        array('id' => 4, 'name' => 'Prof. AMRIT KAUR SAGGU'),
        array('id' => 5, 'name' => 'Dr. ANSA MATHEW'),
        array('id' => 6, 'name' => 'Dr. ELLUMKALAYIL MERLIN THOMAS'),
        array('id' => 7, 'name' => 'Prof. GARIMA ANAND'),
        array('id' => 8, 'name' => 'Prof. INDU VERMA'),
        array('id' => 9, 'name' => 'Dr. KAMAL UPRETI'),
        array('id' => 10, 'name' => 'Prof. LATA YADAV'),
        array('id' => 11, 'name' => 'Prof. LAWRENCE KUJUR'),
        array('id' => 12, 'name' => 'Prof. MADAN SINGH'),
        array('id' => 13, 'name' => 'Dr. MANJULA SHANBHOG'),
        array('id' => 14, 'name' => 'Prof. NEHA SAINI'),
        array('id' => 15, 'name' => 'Dr. PREETY'),
        array('id' => 16, 'name' => 'Dr. RAMESH CHANDRA POONIA'),
        array('id' => 17, 'name' => 'Dr. RIYA BABY'),
        array('id' => 18, 'name' => 'Dr. RUCHI KAUSHIK'),
        array('id' => 19, 'name' => 'Dr. SHILPA SRIVASTAVA'),
        array('id' => 20, 'name' => 'Dr. STEPHEN RAJ S'),
        array('id' => 21, 'name' => 'Dr. SWATI AGRAWAL'),
        array('id' => 22, 'name' => 'Prof. VANDANA MEHNDIRATTA'),
        array('id' => 23, 'name' => 'Dr. VANDANA SHARMA'),
        array('id' => 24, 'name' => 'Dr. VARUNA GUPTA'),
        array('id' => 25, 'name' => 'Dr. VIDUSHI')
    );

    $passwords = array();

    foreach ($faculty as $f) {
        $password = 2294 + $f['id']; // Generate password based on faculty ID
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $passwords[] = array('id' => $f['id'], 'password' => $hashedPassword);
    
        // Insert into MySQL database
        $query = "INSERT INTO users (userId, userName, userPassword) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            die("Error preparing statement: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, 'iss', $f['id'], $f['name'], $hashedPassword);
        if (!mysqli_stmt_execute($stmt)) {
            die("Error executing statement: " . mysqli_stmt_error($stmt));
        }
        mysqli_stmt_close($stmt);
    }
    
    

    mysqli_close($conn);

    print_r($passwords);
    ?>
</body>

</html>
