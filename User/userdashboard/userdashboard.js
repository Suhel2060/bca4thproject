// for scrolling
let firstcardwidth = 0;
let tags = [], result = [];
let bookdata;
window.addEventListener("load", () => {
    fetch("../../phpfile/userdashboard.php")
        .then((response) => response.json())
        .then((data) => {
            bookdata = data;
            for (let index = 0; index < 5; index++) {
                let result = (data[index].tag).split(',');
                result.forEach((tag) => {
                    if (!tags.includes(tag))
                        tags.push(tag);
                })
            }
            console.log(tags)
            tags.map((tags) => {
                let tag_data = { "tags": tags };
                fetch("../../phpfile/userdashboarddata.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json; Charset=UTf-8"
                    },
                    body: JSON.stringify(tag_data),
                })
                    .then((response) =>{ 
                        if (!response.ok) {
                            throw new Error('Network error');
                          }
                        return response.json()})
                    .then((data) => {
                        document.querySelector('section').innerHTML += `<div class="scroll-container">
                        <i class="fa-solid fa-arrow-left" id="left" onclick="left(this)"></i>
                        <h2 class="dashboard-tag">${tag_data.tags.charAt(0).toUpperCase() + tag_data.tags.slice(1)}</h2>
                        <div class="slider-container">
    
                            ${data.map((data) => {
                                let image = (data.image == "null") ? "https://img.freepik.com/free-vector/open-blue-book-white_1308-69339.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1716681600&semt=ais_user":'../../admin/adminaddbooks/bookimg/' + data.image;
                            return `<div class="book-slider" draggable="false" onclick="dashboarddata(this)">
                            <img src="${image}" />
                            <div class="show-data">
                                <div><h3>${data.bookname}</h3></div>
                                <div><p>${data.authorname}</p></div>
                                <div><p>${data.description}</p></div>
                                   
                                    </div>
                                </div>`;

                        }).join('')}

                        </div>
                        <i class="fa-solid fa-arrow-right" id="right" onclick="right(this)"></i>
                    </div>`;

                        // Accessing the width after rendering
                        firstcardwidth = document.querySelector('.book-slider').offsetWidth + 25;
                    }).catch(error=>console.log(error))
            })
        });
});

//scrolling
let scrolling, flag = 0;

// const arrowbtns = document.querySelectorAll('.scroll-container i');

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


    scrolling = t.parentElement.children[2];
    console.log(scrolling)
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
    scrolling = t.parentElement.children[2];
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

// document.addEventListener('DOMContentLoaded',()=>{
// let dashboarddata=document.querySelectorAll('.bookslider')
// dashboarddata.forEach((data)=>{
//     console.log("hello")
//     data.addEventListener('click',(e)=>{
//         let bookdata=e.target.children[0];
//         localStorage.setItem('bookdata',bookdata);
//         window.location.pathname="/BCA4THPROJECT/user/usersearchbook/usersearchbook.php"
//     })

// })
// })

// document.addEventListener('DOMContentLoaded', function() {
//     document.body.addEventListener('click', function(e) {
//         if (e.target.classList.contains('showdata')) {
//             let bookdata = e.target.children[0];
//             localStorage.setItem('bookdata', bookdata);
//             window.location.pathname = "/BCA4THPROJECT/user/usersearchbook/usersearchbook.php";
//         }
//     });
// });

function dashboarddata(t) {

    let bookdata = t.children[1].children[0].children[0].innerHTML
    localStorage.setItem('bookdata', bookdata);
    window.location.pathname = "/BCA4THPROJECT/user/usersearchbook/usersearchbook.php"
}