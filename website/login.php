<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Book_Club");

if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNumber = $_POST["studentNumber"];
    $password = $_POST["password"];

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
    } else {
        // Redirect the user to Book_Club_books.php
        header("Location: index.php");
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

.Richfield{
	 width:300px;
  height:90px;
   
  top:0;
  left: 0;
	
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
  margin-right: 0; /* Remove margin from the last item */
  margin-left: auto; /* Push the last item to the right */
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
	  background: url('https://cutewallpaper.org/27/black-and-white-classic-books-wallpaper/1705124284.jpg') no-repeat;
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
<img class="MainLogo"src="Book_Club_tps.png"  /><!--Image which has transparent background-->
  <ul>
    
  </ul>
  <ul>
  <li><a href="#">Home</a></li>
    <li><a href="#">Admin</a></li>
	
  </ul>
</div>
<img class="MainLogo"src="Book_Club_tps.png"  /><!--Image which has transparent to make the background not see through-->

   <div class="wrapper"> 
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
	
    <form method="POST" enctype="multipart/form-data">
	           
        <div class="input-box">
        <input type="text" id="studentNumber" name="studentNumber" placeholder ="Student Number" required>
		<i class='bx bxs-user'></i>
		</div>
		
       <div class="input-box">
        <input type="password" id="password" name="password" placeholder ="Password" required>
		<i class='bx bx-lock' ></i>
		</div>
		
		<div class="remember-forgot">
        <label><input type="checkbox"  required>Remember me</label>
		</div>
		
        <button type="submit" class="btn">Login</button>
		
		
		<div class ="register-link">
		<p><a href="https://www.whatsapp.com">Forgot password? Contact Our Club President </a></p>
		</div>
    </form>
	</div>
</body>
</body>
</html>