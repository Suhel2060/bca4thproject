<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('C:\xampp\htdocs\bca4thproject\Admin\AdminHeader\AdminNavcss.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Adminaddbook.css">
</head>

<body>
    <?php include('C:\xampp\htdocs\bca4thproject\Admin\AdminHeader\AdminNav.php'); ?>
    <div class="Add-book-container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="Add-book-formitems">
                <label for="BookId">Book Id:</label>
                <input type="text" id="BookId" name=""  class="form-inputs">
            </div>
            <div class="Add-book-formitems">
                <label for="BookName">Book Name:</label>
                <input type="text" id="BookName" name="" class="form-inputs" pattern="[A-z]">
            </div>
            <div class="Add-book-formitems">
                <label for="AuthorName">Author's Name:</label>
                <input type="text" id="AuthorName" name="" class="form-inputs">
            </div>
            <div class="Add-book-formitems">
                <label for="PublicationName">Publication Name:</label>
                <input type="text" id="PublicationName" name="" class="form-inputs">
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

            <div class="Add-book-formitems" id="form-btn">
                <input type="submit" value="Add" class="btn" >
                <input type="button" value="Update" class="btn">
            </div>
        </form>
    </div>
</body>

</html>