<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
  <title>Admin</title>
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
    include("database/connection_database.php");
    $fetch = mysqli_query($con, "SELECT * FROM books");
   $row = mysqli_fetch_row($fetch);
   if($row > 0){
    while($r = mysqli_fetch_array($fetch)){

   }
   }
  ?>
  <div class="books">
    <div class="saved__books">
      <table>
        <thead>
          <td>BOOK NAME</td>
          <td>DELETE</td>
          <td>CHOOSE</td>
          <td>START TIME</td>
          <td>END TIME</td>
        </thead>
          <tr>
            <td><?php echo $r['book'];?></td>
          </tr>
      </table>
    </div>
  </div>
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