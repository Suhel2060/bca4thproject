<?php
session_start();
if(!(isset($_SESSION["loginstatus"])&&isset($_SESSION["admin_username"])&&isset($_SESSION["user_status"]))){
    header("Location:../../user/userdashboard/userdashboard.php");}
else{
    if($_SESSION["user_status"]=="user"){
        header("Location:../../user/userdashboard/userdashboard.php");    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../adminheader/adminnavcss.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Adminshowbook.css">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <script src="../adminshowbooks/adminshowbook.js<?php filemtime('../adminshowbooks/adminshowbook.js')?>"></script>
    <script src="../../admin/adminheader/adminheader.js<?php filemtime('../../admin/adminheader/adminheader.js')?>"></script>

</head>

<body style="width:100%;">
    <?php
    include('../adminheader/adminnav.php');
    ?>


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
        <div class="search">
            <input type="text" class="search_input" placeholder="search books" onkeyup="searchdata(event)">
            <i class="fa-solid fa-magnifying-glass"></i>
            <ol class="searchdatalist" style="list-style-type:none">
                
            </ol>


        </div>
    </div>

<script>
    

</script>

</body>

</html>