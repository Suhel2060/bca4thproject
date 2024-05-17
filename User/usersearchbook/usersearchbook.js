var bookdata;
var flag = 0;
let flag1 = 0;
var I, book_index;
let imageurl='../../admin/adminaddbooks/bookimg/';
let click=0;
let bookdetails;
function showdetails(event) {
    click=1;
    event.stopPropagation();
    // console.log(bookdata)


    let x = event.clientX;
    let y = event.clientY;
    let x1,y1;
    if(x>1080){
        x1 = x - 360
        y1 = y - 150; 
        console.log('x:'+x)
        console.log('y:'+y)
    }else{
    console.log('x:'+x)
    console.log('y:'+y)
    // let x = event.pageX;
    //  let y = event.pageY;
    x1 = x + 40;
    y1 = y - 150;
    }
    if (flag1 == 0) {
        flag1 = 1;
        book_index = document.elementFromPoint(x, y).parentElement.children[0].value;
        console.log(book_index);
       bookdetails=bookdata.filter((data)=>{if(data.book_id==book_index)return data})
       console.log(bookdetails)
    }
    //  console.log(x);
    //  console.log(y);

    if (flag == 1) {
        I.style.display = "inline-block";
        let bookstatus=bookdetails[0].currentquantity==0?"Unavailable":"available";
        console.log(book_index);
        document.querySelector('.hover-image').src = imageurl+bookdetails[0].image;
        document.querySelector('.bookstatus h3').innerHTML = bookstatus;
        document.querySelector('.bookstatus h3').style.color = bookdetails[0].currentquantity==0?"red":"green";
        document.querySelector('.hover-container .bookname').innerHTML = bookdetails[0].bookname;
        document.querySelector('.hover-container .catagory').innerHTML = bookdetails[0].tag;
        document.querySelector('.hover-container .author').innerHTML = bookdetails[0].authorname;
        document.querySelector('.hover-container .description').innerHTML = bookdetails[0].description;
        document.querySelector('.bookstatus i').style.color = bookdetails[0].currentquantity==0?"red":"green";
        document.querySelector('.bookstatus i').style.backgroundColor = bookdetails[0].currentquantity==0?"red":"green";
        document.querySelector('.hover-container .description').innerHTML = bookdetails[0].description;


    }
    if (flag == 0) {
        let hover_data = ` <div class='hover-container'> 
        <div class='image'>
        <img src="${imageurl+bookdetails[0].image}"alt='' class="hover-image">
        <div class='bookstatus'>
        <span><i class="fa-regular fa-circle" style='color:${bookdetails[0].currentquantity==0?"red":"green"};background-color:${bookdetails[0].currentquantity==0?"red":"green"}'></i></span>
        <h3 style='display:inline-block; color:${bookdetails[0].currentquantity==0?"red":"green"};'>${bookdetails[0].currentquantity==0?"Unavailable":"available"}</h3>
        </div>
        </div>
        <h4 style="display:inline" class="bookname" style="word-break:break-all">${bookdetails[0].bookname}</h4>
        <p class='main-book-details catagory' style="word-break:break-all">${bookdetails[0].tag}</p>
        <p class='main-book-details author'style="word-break:break-all">${bookdetails[0].authorname}</p>
        <p class='hover-book-description description'>${bookdetails[0].description}</p>
        </div>`
        document.querySelector('.book-details-container').insertAdjacentHTML('afterend', hover_data);

    }
    I = document.querySelector('.hover-container');
    I.style.top = `${y1}px`;
    I.style.left = `${x1}px`;
    flag = 1;


}
function hidedetails() {
    if(click==1){
    I.style.display = "none";click=0;
    }

    flag1 = 0;
}




//;oad all the books from the database

window.addEventListener("load", () => {

    if(localStorage.getItem('bookdata')==null){
    fetch("../../phpfile/showbooks.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data)
            bookdata = data;
            data.forEach(data => {
                let html = ` <div class="book-details" >
            <input type="hidden" value="${data.book_id}">

            <img src="${imageurl+data.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
            <div class="book-description">
                <h3>${data.bookname}</h3>
            </div>
            <input type="hidden" value="${data.book_id}">
        </div>`
                document.querySelector('.book-details-container').insertAdjacentHTML("beforeend", html);
            });
        })}
        else{
            fetch("../../phpfile/showbooks.php")
            .then(response => response.json())
            .then((data) => {
                console.log(data)
                bookdata = data;
                console.log(localStorage.getItem('bookdata'))
                document.querySelector('.search_input').value=localStorage.getItem('bookdata');
                searchbooks(localStorage.getItem('bookdata'));
                localStorage.removeItem('bookdata');

            });
        

        }
})


//adding issuing books using icon 

function issuebooks(t) {

    let bookid= t.parentElement.children[4].innerHTML;
    let bookname = t.parentElement.children[3].children[0].innerHTML;
    let url = new URL("http://localhost/BCA4THPROJECT/admin/adminisuuebook/adminissuebook.php");
    url.searchParams.append('bookname', bookname);
    url.searchParams.append('bookid', bookid);
    window.location.href = url;
}


function searchdata(e) {
    console.log(bookdata);
    console.log(e.key);
    let searchdata = document.querySelector('.search_input').value;
    if(e.key=="Enter"){
        searchbooks(searchdata);
    }else{
        searchbooks(searchdata);
    }
}
const searchbooks=(searchdata)=>{
    if (!(searchdata == "" || searchdata == null)) {
        let formdata = new FormData();
        formdata.append("searchdata", searchdata);
        formdata.append("searchtype", "book");
        fetch("../../phpfile/searchdata.php", {
            method: "POST",
            body: formdata,
        })
            .then(response => response.json())
            .then((data) => {
                document.querySelector(".searchdatalist").style.display = "block";
                console.log(data);
                console.log(data.length);
                let i = 0, j = 0;
                if (data.length > 0) {
                    data.forEach((data) => {
                        // let j=0;
                        let html = `<li>${data.bookname}</li>`
                        if (j < 1) { document.querySelector('.searchdatalist').innerHTML = html; }
                        else {
                            document.querySelector('.searchdatalist').innerHTML += html;

                        }
                        j++;


                    })
                    data.forEach(data => {

                        let html = ` <div class="book-details" >
                        <input type="hidden" value="${data.book_id}">
            <img src="${imageurl+data.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
            <div class="book-description">
                <h3>${data.bookname}</h3>
            </div>
            <input type="hidden" value="${data.book_id}">
        </div>`
                        if (i == 0) {
                            document.querySelector('.book-details-container').innerHTML = html;

                        } else {
                            document.querySelector('.book-details-container').innerHTML += html;
                        }
                        i++
                    });
                }
                else {
                    document.querySelector('.searchdatalist').innerHTML = "No Result Found";
                    document.querySelector('.book-details-container').innerHTML = "No Book Found";
                }
            })
    }
    else {
        console.log("hello")
        let k=0;
        bookdata.forEach(bookdata => {
            let html = ` <div class="book-details" >
            <input type="hidden" value="${bookdata.book_id}">
        <img src="${imageurl+bookdata.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
        <div class="book-description">
            <h3>${bookdata.bookname}</h3>
        </div>
        <input type="hidden" value="${bookdata.book_id}">
    </div>`
            if (k == 0) {
                document.querySelector('.book-details-container').innerHTML = html;

            } else {
                document.querySelector('.book-details-container').innerHTML += html;
            }
            k++
        });
        document.querySelector(".searchdatalist").style.display = "none";
    }
}

function hidesearch(){
    document.querySelector(".searchdatalist").style.display = "none";
}


