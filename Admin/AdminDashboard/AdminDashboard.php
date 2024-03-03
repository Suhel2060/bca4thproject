<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('../adminheader/adminnavcss.php');?>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="main-container">
        <?php include('../adminheader/adminnav.php');?>
     
        <div class="child-container" id="admin-body">
            <div>
                <h2>Admin Dashboard</h2>
            </div>
            <div class="admin-body-items-container">
                <div class="admin-body-items">
                    
                    <i class="fa-solid fa-user-group"></i><br>
                    <h3>Users</h3>
                    <h2>0</h2>
                </div>
                <div class="admin-body-items">
                    <i class="fa-solid fa-book"></i><br>
                    <h3>Total Books</h3>
                    <h2>0</h2>
                </div>
                <div class="admin-body-items">
                    <i class="fa-solid fa-list"></i><br>
                    <h3>Catagories</h3>
                    <h2>0</h2>
                </div>
                <div class="admin-body-items">
                    <i class="fa-solid fa-user"></i><br>
                    <h3>Authors</h3>
                    <h2>0</h2>
                </div>
                <div class="admin-body-items">
                    <i class="fa-solid fa-recycle"></i><br>
                    <h3>Book Issued</h3>
                    <h2>0</h2>
                </div>
                <div class="admin-body-items">
                    <i class="fa-solid fa-recycle"></i><br>
                    <h3>Retuned Books</h3>
                    <h2>0</h2>
                </div>

            </div>
        </div>
    </div>
</body>

</html>