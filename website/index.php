<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Please include this CSS file in all pages.-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="scripts/main.js" defer></script>
    <title>Home</title>
</head>
<body>
    <header class="header container">
        <nav class="navbar">
            <div class="navbar__logo">
                <img class="MainLogo" src="web-media/White_BC_transparent.png"/>
            </div>
            <!-- HAMBURGER MENU -->
            <a href="#" class="toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <!-- AMBURGER MENU -->
            <div class="navbar__links">
                <ul>
                    <li><a href="community.php">COMMUNITY</a></li>
                    <li><a href="admin.php">ADMIN</a></li>
                    <li><a href="login.php">LOG-OUT</a></li>
                </ul>
            </div>
        </nav>
    </header>
   <main class="container">
    <section class="current">
        <div class="current__book">
            <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
        </div>
        <div class="current__genre">
            <h1>Book Name: </h1>
            <h1>Genre: </h1>
            <h1>Author: </h1>
        </div>
        <div class="current__time">
            <div class="clock">
                COUNTDOWN
            </div>
        </div>
        <div class="current__download">
            <div class="current__button">
                <button>DOWNLOAD</button>
            </div>
        </div>
    </section>
    <section class="books">
        <?php
             session_start();
             $con = new mysqli("localhost", "root", "", "book_club");
        
                // Query to retrieve books from the database
                $sql = "SELECT * FROM books";
                $result = $con->query($sql);
        
                // Process the query result
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $bookId = $row["book_id"];
                        $bookName = $row["name_book"];
                        $bookAuthor = $row["author_book"];
                        $bookPath = $row["book_path"];
        
                        echo "<div class='books__pdf'>
                                <div class='books__img item1'>
                                    <embed src='$bookPath' height='90%' width='100%'>
                                    <div class='books__buttons'>
                                        <div class='books__download'><a href='$bookPath'><button>DOWNLOAD</button></a></div>
                                        <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                                    </div>
                                </div>
                                <div class='books__img item2'>
                                    <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
                                    <div class='books__buttons'>
                                        <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
                                        <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                                    </div>
                                </div>
                                <div class='books__img item3'>
                                    <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
                                    <div class='books__buttons'>
                                        <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
                                        <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                                    </div>
                                </div>
                                <div class='books__img item4'>
                                    <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
                                    <div class='books__buttons'>
                                        <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
                                        <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                                    </div>
                                </div>
                              </div>";
                    }
                } else {
                    echo "No books found.";
                }
        
                $con->close();
              
        ?>
        
        <div class="books__button">
            <a href="login.php" class="anchor__button"><button class="button">UPLOAD</button></a>
        </div>
    </section>
   </main>
   <footer></footer>
</body>
</html>
<?php
   