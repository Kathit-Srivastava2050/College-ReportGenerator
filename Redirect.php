<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect</title>
    <style>
        body {
            background: linear-gradient(135deg, #000428, #004e92); 
            color: #fff; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            gap: 1vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top: 4px solid #fff; 
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        h1 {
            font-size: 2rem;
            margin-top: 20px;
        }

        .countdown {
            font-size: 1.5rem;
            margin-top: 10px;
            animation: countdown 5s linear forwards;
        }

        @keyframes countdown {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="spinner"></div>
    <h1>You will be redirected shortly</h1>
    <div class="countdown" id="countdown">5</div>
    <script>
        let count = 5;
        const countdownElement = document.getElementById("countdown");

        setInterval(() => {
            count--;
            if (count >= 0) {
                countdownElement.textContent = count;
            } else {
                window.location.replace("Login.php");
            }
        }, 1000);
    </script>
</body>
</html>
