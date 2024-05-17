
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <link rel="stylesheet" href="usersearchbook.css">
    <link rel="stylesheet" href="../../user/usernavbar/usernavbar.css">
    <link rel="stylesheet" href="../../user/userlogin/userlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Foldit:wght@300;500&family=Poppins:wght@400;500;600&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
</head>

<body style="width:100%;">
<div class="maincontainer">
    <?php
    include('../usernavbar/usernavbar.php');
    ?>
 <div class="body-container"  id="blur">
<section>
    <div class="showbook-main-container">
        <div class="book-details-container">
            <!-- <div class="book-details" onmousemove="showdetails(event)" onmouseout="hidedetails()">
                <img src="harrypotter.png" alt="error">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>
                </div>
            </div>
            <div class="book-details" onmousemove="showdetails(event)" onmouseout="hidedetails()">
                <img src="mathbook.png" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>
                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">

                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">

                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">

                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div>
            <div class="book-details" onmousemove="showdetails(event)" onmouseout="hidedetails()">
                <img src="" alt="">
                <div class="icon">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="book-description">
                    <h3>Book Name</h3>

                </div>
            </div> -->
        </div>
        <div class="search" >
            <input type="text" class="search_input" placeholder="search books" onblur="hidesearch()" onkeyup="searchdata(event)" >
            <i class="fa-solid fa-magnifying-glass"></i>
            <ol class="searchdatalist" style="list-style-type:none">
                
            </ol>


        </div>
    </div>
    </section>
</div>
    </div>

    <script src="../../user/usernavbar/usernavbar.js"></script>
    <?php include('../../user/userlogin/userlogin.php'); ?>
    <script src="../../user/userlogin/userlogin.js"></script>
    <script src="usersearchbook.js"></script>
</body>

</html>