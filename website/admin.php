<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
  <title>Admin</title>
  <style>
    ul{
      display: flex;
      gap: 1rem;
      list-style: none;
    }
  </style>
</head>
<body>
  <nav>
    
    <h1>ADMINISTRATOR</h1>
    
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="community.php">COMMUNITY</a></li>
      <li><a href="#">LOG OUT</a></li>
    </ul>
    </nav>

    <main>
      <section class="add">
      <?php
// include "database/connection_database.php";

// if (mysqli_connect_error()) {
//     echo "ERROR connecting to the database: " . mysqli_connect_errno();
// }

// // BACKEND TO ADD STUDENTS..
// if (isset($_POST['add'])) {
//     $studentNumber = $_POST['studentNumber'];

//     // Start a new transaction.
//     mysqli_begin_transaction($con);

//     // Insert the new student into the database.
//     $sql = mysqli_query($con, "INSERT INTO login WHERE student_number VALUES ('$studentNumber')");

//     // Check for duplicate student numbers after inserting the new student.
//     $result = mysqli_query($con, "SELECT * FROM login WHERE student_number = '$studentNumber'");

//     if (mysqli_num_rows($result) > 1) {
//         // Delete the new student record from the database.
//         $sql = mysqli_query($con, "DELETE FROM login WHERE student_number = '$studentNumber'");
//     }

//     // Commit the transaction.
//     mysqli_commit($con);

//     // Display a message to the user.
//     if ($sql) {
//         $message = "Successfully added student.";
//     } else {
//         $message = "Error adding student: " . mysqli_error($con);
//     }
// }
?>

        <div class="add__student">
          <form action="admin.php" method="post">
            <label><?php //echo $message;?></label>
            <br>
            <label for="studentNumber">Add student:</label>
            <input type="text" name="studentNumber">
            <input type="submit" value="Add" name="add">
            <br>
            <label for="removeNumber">Add student:</label>
            <input type="text" name="removeNumber">
            <input type="submit" value="Delete" name="delete">
          </form>
        </div>
      </section>
    
    <section class="books">
    <?php
    // include("database/connection_database.php");
    // $fetch = mysqli_query($con, "SELECT * FROM books");
    // $row = mysqli_fetch_row($fetch);
    // if($row > 0){
    // while($r = mysqli_fetch_array($fetch)){

    // }
    // }
    ?>
    <div class="books__container">
      <div class="saved__books">
      <table>
  <thead>
    <td>BOOK NAME</td>
    <td>DELETE</td>
    <td>CHOOSE</td>
    <td>START TIME</td>
    <td>END TIME</td>
  </thead>
  <tbody>
    <tr>
      <td>The Lord of the Rings</td>
      <td><a href="#">Delete</a></td>
      <td><a href="#">Choose</a></td>
      <td>2023-11-01T05:52:59Z</td>
      <td>2023-11-01T06:52:59Z</td>
    </tr>
    <tr>
      <td>Harry Potter and the Sorcerer's Stone</td>
      <td><a href="#">Delete</a></td>
      <td><a href="#">Choose</a></td>
      <td>2023-11-01T07:52:59Z</td>
      <td>2023-11-01T08:52:59Z</td>
    </tr>
    <tr>
      <td>The Hitchhiker's Guide to the Galaxy</td>
      <td><a href="#">Delete</a></td>
      <td><a href="#">Choose</a></td>
      <td>2023-11-01T09:52:59Z</td>
      <td>2023-11-01T10:52:59Z</td>
    </tr>
    <tr>
      <td>Pride and Prejudice</td>
      <td><a href="#">Delete</a></td>
      <td><a href="#">Choose</a></td>
      <td>2023-11-01T11:52:59Z</td>
      <td>2023-11-01T12:52:59Z</td>
    </tr>
    <tr>
      <td>To Kill a Mockingbird</td>
      <td><a href="#">Delete</a></td>
      <td><a href="#">Choose</a></td>
      <td>2023-11-01T13:52:59Z</td>
      <td>2023-11-01T14:52:59Z</td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
      </section>
    </main>

  
</body>
</html>

























<!-- <!DOCTYPE html>
<html>
<head>
  <title>Book Club</title>
  <style>
    
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
  </style>
</head>
<body>
  <h1>Book Club</h1>

  <h2>Add/Remove Students</h2>
  <form>
    
    <label for="addStudent">Add Student:</label>
    <input type="text" id="addStudent" />
    <button type="button" onclick="addStudent()">Add</button>

    
    <label for="removeStudent">Remove Student:</label>
    <input type="text" id="removeStudent" />
    <button type="button" onclick="removeStudent()">Remove</button>
  </form>

  <h2>Most Voted Books</h2>
  <table id="mostVotedTable">
  
    <tr>
      <th>Rank</th>
      <th>Title</th>
      <th>Votes</th>
      <th>Start Date</th>
      <th>Finish Date</th>
    </tr>
  </table>

  <h2>Vote for Books</h2>
  <form>
   
    <label for="bookDropdown">Choose a book:</label>
    <select id="bookDropdown">
      <option value="book1">Book 1</option>
      <option value="book2">Book 2</option>
      <option value="book3">Book 3</option>
      <option value="book4">Book 4</option>
    </select>
    <button type="button" onclick="voteForBook()">Choose</button>
  </form>

  <script>
    // Initialize the students array and bookVotes object
    var students = [];
    var bookVotes = {
      "book1": { votes: 0, startDate: "", finishDate: "" },
      "book2": { votes: 0, startDate: "", finishDate: "" },
      "book3": { votes: 0, startDate: "", finishDate: "" },
      "book4": { votes: 0, startDate: "", finishDate: "" }
    };

   
    function addStudent() {
      var studentInput = document.getElementById("addStudent");
      var studentName = studentInput.value;
      if (studentName) {
        students.push(studentName);
        studentInput.value = "";
        updateStudentsTable();
      }
    }


    function removeStudent() {
      var studentInput = document.getElementById("removeStudent");
      var studentName = studentInput.value;
      var index = students.indexOf(studentName);
      if (index > -1) {
        students.splice(index, 1);
        studentInput.value = "";
        updateStudentsTable();
      }
    }

    // Function to update the most voted books table
    function updateStudentsTable() {
      var table = document.getElementById("mostVotedTable");
      table.innerHTML = `
        <tr>
          <th>Rank</th>
          <th>Title</th>
          <th>Votes</th>
          <th>Start Date</th>
          <th>Finish Date</th>
        </tr>
      `;
      // Sort the books based on votes in descending order
      var sortedVotes = Object.keys(bookVotes).sort(function(a, b) {
        return bookVotes[b].votes - bookVotes[a].votes;
      });
      // Display the top 3 voted books in the table
      for (var i = 0; i < 3; i++) {
        var book = sortedVotes[i];
        var row = table.insertRow(-1);
        var rankCell = row.insertCell(0);
        var titleCell = row.insertCell(1);
        var votesCell = row.insertCell(2);
        var startDateCell = row.insertCell(3);
        var finishDateCell = row.insertCell(4);
        rankCell.innerHTML = i + 1; // Display the rank
        titleCell.innerHTML = book; // Display the book title
        votesCell.innerHTML = bookVotes[book].votes; // Display the vote count
        startDateCell.innerHTML = `<input type="date" id="${book}-start-date" onchange="updateStartDate('${book}')">`; // Display the start date input
        finishDateCell.innerHTML = `<input type="date" id="${book}-finish-date" onchange="updateFinishDate('${book}')">`; // Display the finish date input
      }
    }

    // Function to vote for a book
    function voteForBook() {
      var bookDropdown = document.getElementById("bookDropdown");
      var selectedBook = bookDropdown.value;
      if (selectedBook) {
        bookVotes[selectedBook].votes++;
        updateStudentsTable();
      }
    }

    // Function to update the start date for a book
    function updateStartDate(book) {
      var startDateInput = document.getElementById(`${book}-start-date`);
      bookVotes[book].startDate = startDateInput.value;
    }

    // Function to update the finish date for a book
    function updateFinishDate(book) {
      var finishDateInput = document.getElementById(`${book}-finish-date`);
      bookVotes[book].finishDate = finishDateInput.value;
    }
  </script>
</body>
</html> -->