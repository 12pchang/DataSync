<?php
// Set the number of seconds to wait before redirecting
$wait_time = 5;

// The page to redirect to after waiting
$redirect_url = "../../public/judge/scoring.php";

// Optional: Start a session if you need to pass data
// session_start();
// $_SESSION['process_completed'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Wait...</title>
    <meta http-equiv="refresh" content="<?php echo $wait_time; ?>;url=<?php echo $redirect_url; ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        
        .container {
            text-align: center;
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        
        p {
            color: #666;
            margin-bottom: 30px;
        }
        
        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #3498db;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        .progress-bar {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 4px;
            margin-top: 20px;
            overflow: hidden;
        }
        
        .progress {
            width: 0;
            height: 10px;
            background-color: #3498db;
            animation: progress <?php echo $wait_time; ?>s linear forwards;
        }
        
        .countdown {
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes progress {
            0% { width: 0; }
            100% { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Please Wait</h1>
        <p>We're processing your request. You will be redirected automatically.</p>
        
        <div class="loader"></div>
        
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        
        <div class="countdown">
            Redirecting in <span id="timer"><?php echo $wait_time; ?></span> seconds...
        </div>
    </div>

    <script>
        // Countdown timer
        let timeLeft = <?php echo $wait_time; ?>;
        const timerElement = document.getElementById('timer');
        
        const countdownTimer = setInterval(function() {
            timeLeft--;
            timerElement.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
            }
        }, 1000);
    </script>
</body>
</html>