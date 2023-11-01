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
            <img class="MainLogo"src="web-media/White_BC_transparent.png"  />
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
                    <li><a href="">LOG-OUT</a></li>
                </ul>
            </div>
        </nav>
    </header>
   <main class="container">
    <section class="current">
        <div class="current__book">
            <embed src='books/Atomic-Habits-old.pdf' height='100%' width='100%'>
        </div>
        <div class="current__genre">
            <h1>Book: Name: Atomic-Habits</h1>
            <h1>Genre: Slef-Help</h1>
            <h1>Author: James Clear</h1>
        </div>
        <div class="current__time">
            <div class="clock">
                <h1>COUNTDOWN</h1>
                <br>
                <h2 id="counter" class="text-center"></h2>
            </div>  
            <?php 
                $dateTime = strtotime('November 1, 2023 18:00:00');
                $getDateTime = date("F d, Y H:i:s", $dateTime); 
            ?>
            <script>
                var countDownTimer = new Date("<?php echo "$getDateTime"; ?>").getTime();
                // Update the count down every 1 second
                var interval = setInterval(function() {
                var current = new Date().getTime();
                // Find the difference between current and the count down date
                var diff = countDownTimer - current;
                // Countdown Time calculation for days, hours, minutes and seconds
                var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
                minutes + "m " + seconds + "s ";
                // Display Expired, if the count down is over
                if (diff < 0) {
                    clearInterval(interval);
                    document.getElementById("counter").innerHTML = "EXPIRED";
                }
                }, 1000);
            </script>
        </div>
        <div class="current__download">
            <div class="current__button">
                <a href="books/Atomic-Habits-old.pdf"><button>DOWNLOAD</button></a>
            </div>
        </div>
    </section>
    <section class="books">
        <div class="books__pdf-wrapper">

        
        <div class="books__pdf item1">
            <div class="books__img">
                <embed src="books/Atomic-Habits-old.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Atomic-Habits-old.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>   
        <div class="books__pdf item2">
            <div class="books__img">
                <embed src="books/Foundations-of-python-network-programmin-pdf-free-download.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href=books/Foundations-of-python-network-programmin-pdf-free-download.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        <div class="books__pdf item3">
            <div class="books__img">
                <embed src="books/Kali-AWS-Testing.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Kali-AWS-Testing.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        <div class="books__pdf item4">
            <div class="books__img">
                <embed src="books/linux-basic-for-hacking.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/linux-basic-for-hacking.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div> 
        <div class="books__pdf item1">
            <div class="books__img">
                <embed src="books/A day of Fallen night.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/A day of Fallen night.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div> 
        <div class="books__pdf item2">
            <div class="books__img">
                <embed src="books/All the dangerous things.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/All the dangerous things.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div> 
        <div class="books__pdf item3">
            <div class="books__img">
                <embed src="books/Brief answers to the big questions.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Brief answers to the big questions.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div> 
        <div class="books__pdf item4">
            <div class="books__img">
                <embed src="books/Corrupt.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Corrupt.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div> 
        <div class="books__pdf item1">
            <div class="books__img">
                <embed src="books/Hell bent.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Hell bent.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        <div class="books__pdf item2">
            <div class="books__img">
                <embed src="books/Kiss her once for me.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/Kiss her once for me.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        <div class="books__pdf item3">
            <div class="books__img">
                <embed src="books/summer sons.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/summer sons.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        <div class="books__pdf item4">
            <div class="books__img">
                <embed src="books/The damned.pdf">
                <div class='books__buttons'>
                    <div class='books__download'><a href='books/The damned.pdf'><button>DOWNLOAD</button></a></div>
                    <div class='books__vote'><span>VOTE: <input type='checkbox' name='vote'></span></div>
                </div>
            </div>
        </div>
        </div>
    <div class="books__button">
        <a href="upload.php" class="anchor__button"><button class="button">UPLOAD</button></a>
    </div>
 

    </section>
    </main>
    <footer>
        <center><h2>Designed by Ziaee Technologies</h2></center>
    </footer>
</body>
</html>