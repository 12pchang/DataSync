<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $database = new Database();
    $mysqli = $database->getConnection(); 
    
    $email = $mysqli->real_escape_string($_POST["email"]);

    $checkIfExist = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($checkIfExist);

    $userAccount = $result->fetch_assoc();  

    if ($userAccount) {
        if (password_verify($_POST["password"], $userAccount["password"])) {
            session_start();  
            session_regenerate_id();
            $_SESSION["user_name"] = $userAccount["full_name"];    
            $_SESSION["user_id"] = $userAccount["id"];
            $_SESSION["user_role"] = $userAccount["role"];

            // Redirect based on role
            if ($userAccount["role"] === "admin") {
                header("Location: ../public/admin/dashboard.php");
            } elseif ($userAccount["role"] === "judge") {
                header("Location: ../public/judge/wait.php");
            } else {
                // Pending or unknown role
                header("Location: ../public/login.php?error=role");
            }
            exit;
        }
    }

    // header("Location: ../public/login.php?error=1");
}
?>
