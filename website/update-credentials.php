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
	
	<style>
	   @import url("https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500&family=Roboto+Slab:wght@300&display=swap");


/* Define the CSS animation */
@keyframes popUp {
  0% { transform: scale(0); opacity: 0; }
  80% { transform: scale(1.1); opacity: 1; }
  100% { transform: scale(1); opacity: 1; }
}

/* Apply the animation to the image */
.MainLogo{
	 display:flex;
  animation: popUp 0.5s ease-in-out;
  width:200px;
  height:100px;
position: absolute;
  top: 0;
  left: 0;
   
}

.messageConfirm{
font-size: 14.5px;
text-align:center;
	color: white;
	
}

.navbar {
	opacity: 0.5; 
  background-color: white;
  width: 100%;
  height: 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
}

.navbar ul {

  list-style-type: none;
  margin: 0;
  padding: 0;
}

.navbar li {
  display: inline-block;
  margin-right: 20px;
}

.navbar li:last-child {
  margin-right: 0;
  margin-left: auto; 
}

.navbar a {
  text-decoration: none;
  color: black;
  font-weight: bold;
  font-size: 20px;
}


*{
    margin:0;
    padding:0;
	box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
    font-family: 'Roboto Slab', serif;
  }
  body {
	  display:flex;
	  justify-content: center;
	  align-items: center;
	  min-height:100vh;
	  background: url('https://c.wallhere.com/photos/de/37/light_bulb_lights_books-70236.jpg!d') no-repeat;
      background-size:cover;
	  background-position:center;
	  
  }
  .wrapper {
	  width: 420px;
	  background: transparent;
	  border : 2px solid rgba(255, 255, 255, .2);
	  backdrop-filter:blur(20px);
	  box-shadow:0 0 10px rgba(0, 0, 0, .2);
	  color: #fff;
	    border-radius: 10px;
	  padding:30px 40px;
	  
  }
  .wrapper h1{
	  font-size: 36px;
	  text-align: center;
	  
  }
  .wrapper .input-box{
	  position:relative;
	  width:100%;
	  height:50px;
	  margin:30px 0;
	  
  }
  .input-box input{
	  width:100%;
	  height:100%;
	  background: transparent;
	  border :none;
	  outline:none;
	  border : 2px solid rgba(255, 255, 255, .2);
	  border-radius: 40px;
	  font-size:16px;
	  color:#fff;
	  padding:  20px 45px 20px 20px;
	  
  }
  .input-box input::placeholder{
	  color:#fff;
	   
  }
  .input-box i {
	  position : absolute;
	  right: 20px;
	  top:50%;
	  transform: translateY(-50%);
	  font-size:20px;
	  
	  
  }
  .wrapper .remember-forgot{
	  display: flex;
	  justify-content: space-between;
	  font-size: 14.5px;
	  margin : -15px 0 15px;
	  
	  
  }
  .remember-forgot label input{
	  accent-color: #fff;
	  margin-right: 3px;
	  
  }
  .wrapper .btn {
	  width:100%;
	  height:45px;
	  background:black;
	  border: none;
	  outline:none;
	  border-radius: 40px;
	  border-show: 0 0 10px rgba(0, 0, 0, -1);
	  cursor: pointer;
	  font-size:16px;
	  color:white;
	  font-weight:600;
  
  }
  .wrapper .register-link {
	  font-size: 14.5px;
	  text-align:center;
	  margin: 20px 0 15px;
	  
  }
  .register-link p a{
	  color: #fff;
	  text-decoration: none;
	  font weight:600;
	  
	  
  }
  .register-link p a:hover{
	  text-decoration: underline;
	  
  }
  

	
	
	</style>
	
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