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
    <link rel="stylesheet" href="adminissuebook.css">
    <script src="../adminisuuebook/adminissuebook.js"></script>
    <script src="../../admin/adminheader/adminheader.js"></script>
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('../adminheader/adminnav.php'); ?>
    <div class="issue-book-container">
        <form onsubmit="issuebook(event)">
        <input type="hidden" value='' id='book'>
            <div class="issue-book-formitems">
                <label for="Username" >Username:</label>
                <input type="text" id="Username" name=""  class="form-inputs" onblur="userimage()">
            </div>
            <div class="issue-book-formitems" id="studentimg">
                <img src="" alt="">
            </div>
            <div class="issue-book-formitems">
                <label for="BookName">Book Name:</label>
                <input type="text" id="BookName" name="" class="form-inputs" onkeyup="bookdata_search()">
            </div>
            <div class="issue-book-formitems">
                <label for="Studentname">Book id:</label>
                <input type="text" id="bookid" name="" class="form-inputs" onkeyup="bookdata_search()" onblur="hidesearch()">
                <div class="list"></div>
            </div>


            <!-- <div class="issue-book-formitems">
                <label for="Catagories">Catagories:</label><br>
                <select name="" id="Catagories">
                    <option value="" selected hidden>Select</option>
                    <option value="">story</option>
                    <option value="">story</option>
                    <option value="">story</option>
                    <option value="">story</option>
                    <option value="">story</option>
                    <option value="">story</option>
                </select>
            </div>
            <div class="issue-book-formitems">
                <label for="image">Image:</label>
                <input type="file" id="image" name="">
            </div>
            <div class="issue-book-formitems">
                <label for="Description">Description:</label>
               <textarea name="" id="Description" cols="30" rows="10"></textarea>
            </div>

            <div class="issue-book-formitems">
                <label for="Quantity">Quantity:</label>
                <input type="number" id="Quantity" name="" class="form-inputs" >
            </div> -->
            <div class="issue-book-formitems" id="form-btn">
                <input type="submit" value="Add" class="btn">
                <!-- <input type="button" value="Update" class="btn"> -->
            </div>
        </form>
        <div class="message"></div>

    </div>
</body>

</html>