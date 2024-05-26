
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
    <link rel="stylesheet" href="adminaddbook.css">
    <script src="../adminaddbooks/adminaddbooks.js"></script>
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <script src="../../admin/adminheader/adminheader.js"></script>
</head>

<body>
    <?php include('../adminheader/adminnav.php'); ?>
    <div class="container">
        <div class="Add-book-container">
            <h2 style="text-align: center;"></h2>
            <form onsubmit="insertbook(event)">
                    <input type="text" id="bookid" name="" class="form-inputs" value="0" hidden>
                    <input type="text" id="operationtype" name="" class="form-inputs" value="addbook" hidden>
                <div class="Add-book-formitems">
                    <label for="ISBN">ISBN:</label>
                    <input type="text" id="ISBN" name="" class="form-inputs" minlength="12" maxlength="12" pattern="\d{12}" title="ISBN must be 12 digits"/>
                </div>
                <div class="Add-book-formitems">
                    <label for="BookName">Book Name:</label>
                    <input type="text" id="BookName" name="" class="form-inputs" title="Bookname is Required" required>
                </div>
                <div class="Add-book-formitems">
                    <label for="AuthorName">Author's Name:</label>
                    <input type="text" id="AuthorName" name="" class="form-inputs">
                </div>
                <div class="Add-book-formitems">
                    <label for="Tags">Tags:</label>
                    <input type="text" id="Tags" name="" class="form-inputs" value="Unknown">
                </div>
                <div class="Add-book-formitems">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="">
                </div>
                <div class="Add-book-formitems">
                    <label for="Description">Description:</label>
                    <textarea name="" id="Description" cols="30" rows="10"></textarea>
                </div>

                <div class="Add-book-formitems">
                    <label for="Quantity">Quantity:</label>
                    <input type="number" id="Quantity" name="" class="form-inputs" title="Quantity is Required" required>
                </div>
                <div class="add-book-message">
                    <span></span>
                </div>
                <div class="message"></div>
                <div class="Add-book-formitems" id="form-btn">
                    <input type="submit" value="Add" class="addbtn btn"  style="display: inline-block;">
                    <input type="submit" value="Update" class="updatebtn btn" id="updatebutton"style="display: none;">
                    <input type="button" value="Cancel" class="updatebtn btn" id="cancelbtn" style="display: none;" onclick="cancelupdate()">
                </div>
            </form>
        </div>
        <div class="table-container">
        <h2>All The Books</h2>
        <table>
          
            <thead>
                <tr  class="tablehead">
                    <th>Book ID</th>
                    <th class="bookname_list">Book Name</th>
                    <th>Book ISBN</th>
                    <th>Book Author</th>
                    <th>Edit</th>
                    <th>Remove</th>
             
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
        </div>
        
    </div>
</body>

</html>