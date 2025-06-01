<?php 
include 'Includes/dbcon.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    
    $query = "SELECT * FROM tblstudents WHERE email = '$email'"; 
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){
        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['registrationNumber'] = $rows['registrationNumber'];
        $_SESSION['firstName'] = $rows['firstName'];
       
        echo "<script type = \"text/javascript\">
        window.location = (\"Student/viewAttendance.php\")
        </script>";
    }
    else{
        $message = "Invalid Email! Please check your email and try again.";
        echo "<script>showMessage('" . $message . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="admin/img/logo/attnlg.png" rel="icon">
    <title>Student Login - AttendX</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <style>
        .student-login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .back-to-main {
            text-align: center;
            margin-top: 20px;
        }
        .back-to-main a {
            color: #3498db;
            text-decoration: none;
        }
        .back-to-main a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="student-login-container">
        <h1>Student Login</h1>
        <div id="messageDiv" class="messageDiv" style="display:none;"></div>

        <form method="post" action="">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <input type="submit" class="btn-login" value="Login" name="login" />
        </form>

        <div class="back-to-main">
            <a href="index.php">← Back to Main Login</a>
        </div>
    </div>

    <script>
        function showMessage(message) {
            var messageDiv = document.getElementById('messageDiv');
            messageDiv.style.display = "block";
            messageDiv.innerHTML = message;
            messageDiv.style.opacity = 1;
            setTimeout(function() {
                messageDiv.style.opacity = 0;
            }, 5000);
        }
    </script>
</body>
</html> 