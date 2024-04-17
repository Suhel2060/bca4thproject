<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="usernavbar.css">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../user/userlogin/userlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Foldit:wght@300;500&family=Poppins:wght@400;500;600&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <script src="../user/usernavbar.js"></script>
</head>

<body>
    <div class="maincontainer" id="blur">
        <header>
            <div class="icon" onclick="shownavbar()">
                <i class="fa-solid fa-bars" id="list"></i>
                <i class="fa-solid fa-xmark" id="cross"></i>

            </div>
            <div class="logo">
                <h3>library Management System</h3>
            </div>
            <div class="user-search-book">
                <div class="searchbar searchfield">
                    <input type="text" id="" name="" placeholder="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!-- <div class="user-search-filter searchfield">
                    <select name="" id="">
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                    </select>
                </div>
                <div class="user-search-filter searchfield">
                    <select name="" id="">
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                    </select>
                </div> -->
            </div>
            <div class="login-user">
                <i class="fa-regular fa-user"></i>
                <span id="user-name">suhel maharjan</span>
            </div>
            <div class="loginbtn">
                <div class="btn" id="login">
                    <button onclick="show_login()">login</button>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
                <div class="btn" id="logout">
                    <button onclick="logout()">logout</button>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
            </div>


        </header>
        <div class="body-container">
            <aside>
                <div class="menu">
                    <i class="fa-solid fa-house"></i>
                    <span>HOME</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-bookmark"></i>
                    <span>BOOKMARKS</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-book"></i>
                    <span>ISSUED BOOKS</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-book"></i>
                    <span>ALL BOOKS</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>SEARCH BOOKS</span>
                </div>
            </aside>
            <section>
                <div class="scroll-container">
                    <i class="fa-solid fa-arrow-left" id="left" onclick="left(this)"></i>
                    <div class="slider-container">

                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>

                    </div>
                    <i class="fa-solid fa-arrow-right" id="right" onclick="right(this)"></i>
                </div>
                <div class="scroll-container">
                    <i class="fa-solid fa-arrow-left" id="left" onclick="left(this)"></i>
                    <div class="slider-container">

                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>

                    </div>
                    <i class="fa-solid fa-arrow-right" id="right" onclick="right(this)"></i>
                </div>
                <div class="scroll-container">
                    <i class="fa-solid fa-arrow-left" id="left" onclick="left(this)"></i>
                    <div class="slider-container">

                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>
                        <div class="book-slider" draggable="false">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                        </div>

                    </div>
                    <i class="fa-solid fa-arrow-right" id="right" onclick="right(this)"></i>
                </div>

            </section>
        </div>
    </div>
    <!-- include login html -->
    <?php include('../user/userlogin/userlogin.php'); ?>

    <script>
        let icon = document.querySelector('aside');
        let section = document.querySelector('section');
        let list = document.getElementById('list');
        let cross = document.getElementById('cross');
        let i = document.querySelector('i');

        function shownavbar() {
            console.log(i.classList);
            setTimeout(() => {
                icon.classList.toggle('showhidenavbar');
                console.log(icon.classList.contains('showhidenavbar'));
                if (icon.classList.contains('showhidenavbar')) {
                    list.style.opacity='0';
                    cross.style.opacity='1';
                    section.setAttribute('style', "width:99%;margin-left:15px;");

                } else {
                    list.style.opacity='1';
                    cross.style.opacity='0';
                    // section.setAttribute('style',"width:80%");
                }
            }, 100);

        }
        //scrolling
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
        // }


        //scrolling
        let scrolling, flag = 0;

        // const arrowbtns = document.querySelectorAll('.scroll-container i');
        const firstcardwidth = document.querySelector('.book-slider').offsetWidth + 25;
        let isdragging = false,
            startX, startscrollleft;

        // arrowbtns.forEach(btn=>{
        //     console.log(firstcardwidth);
        //     btn.addEventListener('click',()=>{
        //         console.log(this.innerHTML);
        //         scrolling.classList.remove("dragging");
        //         scrolling.scrollLeft+=btn.id=='left'?-firstcardwidth:(firstcardwidth+5);
        //     })
        // })
        function left(t) {

            scrolling = t.parentElement.children[1];
            scrolling.classList.remove("dragging");
            scrolling.scrollLeft -= firstcardwidth;
            if (flag == 0) {
                scrolling.addEventListener("mousemove", dragging);
                scrolling.addEventListener("mousedown", mousedragging);
                scrolling.addEventListener("mouseup", draggingStop);
            }
            flag == 1;

        }

        function right(t) {
            scrolling = t.parentElement.children[1];
            scrolling.classList.remove("dragging");
            scrolling.scrollLeft += (firstcardwidth + 5);
            if (flag == 0) {
                scrolling.addEventListener("mousemove", dragging);
                scrolling.addEventListener("mousedown", mousedragging);
                scrolling.addEventListener("mouseup", draggingStop);
            }
            flag == 1;
        }

        const mousedragging = (e) => {
            isdragging = true;
            scrolling.classList.add("dragging");
            //store the initial value of the scroll
            startX = e.pageX;
            startscrollleft = scrolling.scrollLeft;

        }
        const dragging = (e) => {
            if (!isdragging) return;
            //updates the scroll prosition of scrolling based on the cursor movement
            scrolling.scrollLeft = startscrollleft - (e.pageX - startX);

        }
        const draggingStop = () => {
            isdragging = false;
            scrolling.classList.remove("dragging");
        }



        //for login using fetch
    </script>
    <script src="../user/userlogin/userlogin.js"></script>
</body>

</html>