<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "book_club");

if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if the new username exists in the database
    $query = "SELECT * FROM login WHERE username = '$newUsername'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $error="Username already exists. Please enter a new username.";
    } else {
        // Validate the new password
        if (preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$*%])[A-Za-z\d@#$*%]{5,}$/", $newPassword)) {
            // Check if the new password matches the confirm password
            if ($newPassword === $confirmPassword) {
                $studentNumber = $_SESSION["studentNumber"];

                // Update the username and password in the database
                $updateQuery = "UPDATE login SET username = '$newUsername', password = '$newPassword' WHERE student_number = '$studentNumber'";
                if (mysqli_query($con, $updateQuery)) {
                    // Username and password updated successfully
                    $error= "Password and Username saved successfully!</div>";
                    exit();
                } else {
                    $error= "Error updating username and password: " . mysqli_error($con);
                }
            } else {
               $error= "New password and confirm password do not match.";
            }
        } else {
           $error= "Invalid password format. Password must have 5 or more characters, 1 capital letter, 1 special character (@, #, $, *, %), and 4 numbers.";
        }
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
    <link rel="stylesheet" href="css/update-credentials.css">
</head>
<body>

<div class="navbar">
<img class="MainLogo"src="Book_Club_tps.png"/><!--Image which has transparent background-->
  <ul>
    
  </ul>
  <ul>
  <li><a href="#">Home</a></li>
    <li><a href="#">Admin</a></li>
	
  </ul>
</div>
<img class="MainLogo"src="Book_Club_tps.png" /><!--Image which has transparent to make the background not see through-->

   <div class="wrapper"> 	
    <form method="POST" enctype="multipart/form-data">
	       <h2>Please Enter A New Password</h2>    
        <div class="input-box">
        <input type="text" id="username" name="username" placeholder ="Username" required>
		<i class='bx bxs-user'></i>
		</div>
		
       <div class="input-box">
        <input type="password" id="newPassword" name="newPassword" placeholder ="New Password" required>
		<i class='bx bx-lock' ></i>
		</div>
		
		 <div class="input-box">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder ="Confirm Password" required>
		<i class='bx bx-lock' ></i>
		</div>
		
        <button type="submit" class="btn">Send Password</button>
		
		<!--This is for displaying error messages from php -->
		<br>
		<br>
		<?php if (!empty($error)) { ?>
		<div class="messageConfirm">
		<span>
		</strong>* 
		<?php echo $error; ?>
         </span>		
		</strong>
		</div>
		 <?php } ?>
		
		<div class ="register-link">
		<p><a href="login.php">Return to Login Page </a></p>
		</div>
    </form>
	</div>
</body>
</body>
</html>