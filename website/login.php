<?php
include('database/connection_database.php');

if (mysqli_connect_error()) {
    echo "Connection failed: " . mysqli_connect_errno();
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNumber = $_POST["studentNumber"];
    $password1 = $_POST["password1"];

    // Check if the student number and password match the default password
    if ($password === "R1chField@2023") {
        // Check if the student number exists in the database
        $query = "SELECT * FROM login WHERE student_number = '$studentNumber'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Redirect the user to New_password.php for password change
            $_SESSION["studentNumber"] = $studentNumber;
            header("Location: update-credentials.php");
            exit();
        }
    } else{
                 // Check if the student number and password match in the database
        $query = "SELECT * FROM login WHERE student_number = '$studentNumber' AND password = '$password'";
        $result = mysqli_query($con, $query);
            // Redirect to index.php
            header("Location: update-credentials.php");
            exit();
    
    }
}


mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/login.css">	
</head>
<body>

<div class="navbar">
<img class="MainLogo"src="web-media/Book_Club_tps.png"  /><!--Image which has transparent background-->
  <ul>
    
  </ul>
  <ul>
  <li><a href="#"></a></li>
    <li><a href="#"></a></li>
	
  </ul>
</div>
<img class="MainLogo"src="web-media/Book_Club_tps.png"  /><!--Image which has transparent to make the background not see through-->

   <div class="wrapper"> 
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
	
    <form action="login.php" method="POST" enctype="multipart/form-data">
	           
        <div class="input-box">
        <input type="text" id="studentNumber" name="studentNumber" placeholder ="Student Number" required>
		<i class='bx bxs-user'></i>
		</div>
		
        <div class="input-box">
        <input type="password" id="password" name="password1" placeholder ="Password" required>
		<i class='bx bx-lock' ></i>
		</div>
		
		<div class="remember-forgot">
        <label><input type="checkbox"  required>Remember me</label>
		</div>
		
        <input type="submit" value="Login" class="btn" name="login">
        
		
		
		<div class ="register-link">
		<p><a href="https://www.whatsapp.com">Forgot password? Contact Our Club President </a></p>
		</div>
    </form>
	</div>
</body>
</body>
</html>