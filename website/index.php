<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Please include this CSS file in all pages.-->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
</head>
<body>
   <header class="header container">
        <nav>
            <ul class="header__logo">
                <li><img class="header__img" src="web-media/logo (2).png" alt="logo"></li>
            </ul>
            <ul class="header__menu">
                <div class="header__dropdown">
                <li><a class="header__links" href="community.php">COMMUNITY</a></li>
                <li><a class="header__links" href="login.php">LOG OUT</a></li>
                <li><a class="header__links" href="admin.php">ADMIN</a></li>
                </div>
            
            <label for="nav" style="color: white;" id="toggle">&#9776;</label>
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
                echo "<div class='books__pdf'>
                        <div class='books__img item1'>
                            <embed src='books/Atomic-Habits-old.pdf' height='90%' width='100%'>
                            <div class='books__buttons'>
                                <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
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
        ?>
        
        <div class="books__button">
            <a href="#"><button class="button">UPLOAD</button></a>
        </div>
    </section>
   </main>
   <footer></footer>
</body>
</html>