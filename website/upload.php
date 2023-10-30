<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <title>Document</title>
    <style>
    nav ul{
      display: flex;
    }
    ul{
      gap: 1rem;
      list-style: none;
    }
    li{
      font-weight: bold;
    }
    table{
      border: 1px;
    }
    .books{
      position: absolute;
      top: 10vh;
      left: 0;
    }
    .books table{
      width: 50%;
      height: auto;
    }
  </style>
</head>
<body>
<nav>
    <ul>
      <li href="index.php">HOME</li>
      <li href="community.php">COMMUNITY</li>
      <li href="logout.php"><a href="">LOG OUT</a></li>
    </ul>
  </nav>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include('database/connection_database.php');

        // Handle file upload
        $targetDirectory = "books/";

        // Check if a file was selected
        if (isset($_POST['submit'])) {
            $targetFile = $targetDirectory . basename($_FILES["bookFile"]["name"]);
            $bookName = $_POST["bookName"];
            $authorName = $_POST["authorName"];

            if (move_uploaded_file($_FILES["bookFile"]["tmp_name"], $targetFile)) {
                // Insert book details into the database
                $sql = "INSERT INTO books (name_book, author_book, book_path) VALUES ('$bookName', '$authorName', '$targetFile')";

                if ($con->query($sql)){
                    echo "Book uploaded successfully.";
                } else {
                    echo "Error uploading book: " . $con-> $error;
                }
            } else {
                echo "Error uploading book.";
            }
        } else {
            echo "No file selected or file upload error.";
        }

        $con->close();
    }
?>


<div id="uploadModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <h2>Upload Book</h2>
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
            <label for="authorName">Author Name:</label>
            <input type="text" id="authorName" name="authorName" required>
            <label for="bookFile">Upload Book File:</label>
            <input type="file" id="bookFile" name="bookFile" required>
            <input type="submit" value="Upload">
        </form>
    </div>
</div>

<script>
    var modal = document.getElementById("uploadModal");
    var uploadBtn = document.getElementsByClassName("button")[0];
    var closeBtn = document.getElementsByClassName("close")[0];

    uploadBtn.onclick = function() {
        modal.style.display = "block";
    }

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>