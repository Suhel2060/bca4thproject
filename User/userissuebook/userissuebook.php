<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <link rel="stylesheet" href="userissubook.css">
    <link rel="stylesheet" href="../../user/usernavbar/usernavbar.css">
    <link rel="stylesheet" href="../../user/userlogin/userlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Foldit:wght@300;500&family=Poppins:wght@400;500;600&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>


</head>

<body>
    <div class="maincontainer">
        <?php require('../../user/usernavbar/usernavbar.php') ?>

        <div class="body-container" id="blur">
            <section>

            </section>
        </div>
    </div>
    <script src="../../user/usernavbar/usernavbar.js"></script>
    <?php include('../../user/userlogin/userlogin.php'); ?>
    <script src="../../user/userlogin/userlogin.js"></script>
    <script src="userissuebook.js"></script>


</body>

</html>