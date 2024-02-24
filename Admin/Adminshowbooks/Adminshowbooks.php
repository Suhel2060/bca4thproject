<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../AdminHeader/AdminNavcss.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Adminshowbook.css">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <script src="../Adminshowbooks/adminshowbook.js"></script>

</head>

<body>
    <?php
    include('../AdminHeader/AdminNav.php');
    ?>


    <div class="showbook-main-container">
        <div class="book-details-container">
            <div class="book-details" onmousemove="showdetails(event)" onmouseout="hidedetails()">
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
            </div>
        </div>
        <div class="search">
            <input type="text" class="search_input" placeholder="search books">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="book-search-option">
                <label for="searchby">Search By:</label>
                <select name="" id="searchby">
                    <option value="">Book ID</option>
                    <option value="" selected>Book Name</option>
                    <option value="">Author Name</option>
                    <option value="">Publication</option>
                </select>
            </div>
            <div class="book-search-option">
                <label for="filter">Filter:</label>
                <select name="" id="filter">
                    <option value="">Story</option>
                    <option value="">Story</option>
                    <option value="">Story</option>
                    <option value="">Story</option>
                    <option value="">Story</option>
                </select>
            </div>

        </div>
    </div>



</body>

</html>