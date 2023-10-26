<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Please include this CSS file in all pages.-->
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
</head>
<body>
   <header class="header container">
        <nav>
            <ul class="header__logo">
                <li><img class="header__img" src="web-media/logo (2).png" alt="logo"></li>
                <li><a class="header__logolink" href="index.php">BOOK CLUB</a></li>
            </ul>
            <ul class="header__menu">
                <li><a class="header__links" href="community.php">COMMUNITY</a></li>
                <li><a class="header__links" href="admin.php">ADMIN</a></li>
            </ul>
        </nav>
   </header>
   <main class="container">
    <section class="current">
        <div class="curren__book"></div>
        <div class="current__summary"></div>
        <div class="current__time"></div>
        <div class="current__download"></div>
    </section>
    <section class="books">
        <?php
            for($i = 1; $i <= 3; $i++){
                echo "<div class='books__pdf'>";
            for($z=1; $z <=4; $z++){
                echo "<div class='books__img'>
                <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
                <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
                </div>";
            }
                 echo "</div>";
        }
        ?>
        <div class="bookdislplay">
            
        </div>
        <div class="books__button">
            <a href="#" class="button">
                <div class="button__line"></div>
                <div class="button__line"></div>
                <span class="button__text">UPLOAD</span>
                <div class="button__drow1"></div>
                <div class="button__drow2"></div>
            </a>
        </div>
    </section>
   </main>
   <footer></footer>
</body>
</html>