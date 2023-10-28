<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $conn = new mysqli("localhost", "root", "", "book_club");

        // Handle file upload
        $targetDirectory = "books/";

        // Check if a file was selected
        if (isset($_FILES["bookFile"]) && $_FILES["bookFile"]["error"] === UPLOAD_ERR_OK) {
            $targetFile = $targetDirectory . basename($_FILES["bookFile"]["name"]);
            $bookName = $_POST["bookName"];
            $authorName = $_POST["authorName"];

            if (move_uploaded_file($_FILES["bookFile"]["tmp_name"], $targetFile)) {
                // Insert book details into the database
                $sql = "INSERT INTO books (name_book, author_book, book_path) VALUES ('$bookName', '$authorName', '$targetFile')";

                if ($conn->query($sql) === TRUE) {
                    echo "Book uploaded successfully.";
                } else {
                    echo "Error uploading book: " . $conn->error;
                }
            } else {
                echo "Error uploading book.";
            }
        } else {
            echo "No file selected or file upload error.";
        }

        $conn->close();
    }
?>
<!--  -->

<div id="uploadModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form method="POST" enctype="multipart/form-data">
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

<!--  -->