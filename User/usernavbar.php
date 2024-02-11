<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="usernavbar.css">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Foldit:wght@300;500&family=Poppins:wght@400;500;600&family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="icon"  onclick="shownavbar()">
            <i class="fa-solid fa-bars" id="list"></i>
            <i class="fa-solid fa-xmark" id="cross"></i>

        </div>
        <div class="logo">
            <h3>library Management System</h3>
        </div>
        <div class="user-search-book">
            <input type="search" id="" name="" placeholder="">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="user-search-filter">
            <select name="" id="">
                <option value="">Book name</option>
                <option value="">Book name</option>
                <option value="">Book name</option>
                <option value="">Book name</option>
                <option value="">Book name</option>
            </select>
        </div>
        <div class="user-search-filter">
            <select name="" id="">
                <option value="">story</option>
                <option value="">story</option>
                <option value="">story</option>
                <option value="">story</option>
                <option value="">story</option>
            </select>
        </div>
        <div class="loginbtn">
            <button>login</button>
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
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
            <div class="slider-container">
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
                <div class="book-slider">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, recusandae.</p>
                </div>
            </div>
        </section>
    </div>
    <script>
        let icon=document.querySelector('aside');
         let section=document.querySelector('section');
         let list=document.getElementById('list');
         let cross=document.getElementById('cross');
         let i=document.querySelector('i');
        function shownavbar(){
            console.log(i.classList);
            setTimeout(() => {
                icon.classList.toggle('showhidenavbar');
            console.log(icon.classList.contains('showhidenavbar'));
            if(icon.classList.contains('showhidenavbar')){
              list.setAttribute('style',"display:block;");
              cross.setAttribute('style',"display:none;");
                section.setAttribute('style',"width:99%;margin-left:15px;");
            }
            else{
                list.setAttribute('style',"display:none;");
              cross.setAttribute('style',"display:block;");
                // section.setAttribute('style',"width:80%");
            }
            },100);


            //scrolling
            const scrolling=document.querySelector('.slider-container');
            let isdragging=false;
            const mousedragging=()=>{
                isdragging=true;

            }
            const dragging=(e)=>{
                if(!isdragging) return;
                scrolling.scrollLeft=e.pageX;

            }
            const draggingStop=()=>{
                isdragging=true;
            }


            scrolling.addEventListener("mousemove",dragging)
            scrolling.addEventListener("mousedown",mousedragging)
            scrolling.addEventListener("mouseup",draggingStop);

           
        }
    </script>

</body>

</html>