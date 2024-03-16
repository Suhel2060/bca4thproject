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
    <div class="Add-book-container">
        <form action="" method="" enctype="multipart/form-data">
            <div class="Add-book-formitems">
                <label for="ISBN">ISBN:</label>
                <input type="text" id="ISBN" name=""  class="form-inputs">
            </div>
            <div class="Add-book-formitems">
                <label for="BookName">Book Name:</label>
                <input type="text" id="BookName" name="" class="form-inputs">
            </div>
            <div class="Add-book-formitems">
                <label for="AuthorName">Author's Name:</label>
                <input type="text" id="AuthorName" name="" class="form-inputs">
            </div>
            <div class="Add-book-formitems">
                <label for="Tags">Tags:</label>
                <input type="text" id="Tags" name="" class="form-inputs">
            </div>
            <div class="Add-book-formitems">
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
                <input type="number" id="Quantity" name="" class="form-inputs" >
            </div>
        </form>
        <div class="message"></div>
        <div class="Add-book-formitems" id="form-btn">
                <input type="submit" value="Add" class="btn" onclick="insertbook()">
                <input type="button" value="Update" class="btn">
            </div>
    </div>
</body>

</html>