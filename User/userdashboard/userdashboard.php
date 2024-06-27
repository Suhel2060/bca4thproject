<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userdashboard.css">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../userlogin/userlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Foldit:wght@300;500&family=Poppins:wght@400;500;600&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../usernavbar/usernavbar.css">
</head>

<body>
    <div class="maincontainer">
    <?php require('../usernavbar/usernavbar.php')?>

        <div class="body-container" id="blur">
            <section>

            </section>
        </div>
    </div>
    <script src="userdashboard.js"></script>
    <script src="../usernavbar/usernavbar.js"></script>

    <!-- include login html -->
    <?php include('../userlogin/userlogin.php'); ?>


    
        <!-- //scrolling
        //     const scrolling = document.querySelector('.slider-container');
        //     const arrowbtns = document.querySelectorAll('.scroll-container i');
        //     const firstcardwidth=document.querySelector('.book-slider').offsetWidth+25;
        //     let isdragging = false,startX,startscrollleft;

        //     arrowbtns.forEach(btn=>{
        //         console.log(firstcardwidth);
        //         btn.addEventListener('click',()=>{
        //             console.log(this.innerHTML);
        //             scrolling.classList.remove("dragging");
        //             scrolling.scrollLeft+=btn.id=='left'?-firstcardwidth:(firstcardwidth+5);
        //         })
        //     })
        //     // function leftclick(t){
        //     //     console.log(this);
        //     // }
        //     // function rightclick(t){
        //     //     cnsole.log(t);
        //     // }

        //     const mousedragging = (e) => {
        //         isdragging = true;
        //         scrolling.classList.add("dragging");
        //         //store the initial value of the scroll
        //         startX=e.pageX;
        //         startscrollleft=scrolling.scrollLeft;

        //     }
        //     const dragging = (e) => {
        //         if (!isdragging) return;
        //         //updates the scroll prosition of scrolling based on the cursor movement
        //         scrolling.scrollLeft = startscrollleft-(e.pageX-startX);

        //     }
        //     const draggingStop = () => {
        //         isdragging = false;
        //         scrolling.classList.remove("dragging");
        //     }
        //     scrolling.addEventListener("mousemove", dragging);
        //     scrolling.addEventListener("mousedown", mousedragging);
        //     scrolling.addEventListener("mouseup", draggingStop);
        //  -->
    <script src="../userlogin/userlogin.js"></script>
</body>

</html>