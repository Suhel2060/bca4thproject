var bookdata;
var flag = 0;
let flag1 = 0;
var I, book_index;
function showdetails(event) {
    event.stopPropagation();
    // console.log(bookdata)
    console.log(event.clientX)

    let x = event.clientX;
    let y = event.clientY;
    // let x = event.pageX;
    //  let y = event.pageY;
    var x1 = x + 40;
    var y1 = y - 250;
    if (flag1 == 0) {
        flag1 = 1;
        book_index = document.elementFromPoint(x, y).parentElement.children[0].value;
        console.log(book_index);

    }
    //  console.log(x);
    //  console.log(y);

    if (flag == 1) {
        I.style.display = "inline-block";
        console.log(book_index);
        document.querySelector('.hover-image').src = bookdata[book_index].image;
        document.querySelector('.hover-container .bookname').innerHTML = bookdata[book_index].bookname;
        document.querySelector('.hover-container .catagory').innerHTML = bookdata[book_index].tag;
        document.querySelector('.hover-container .author').innerHTML = bookdata[book_index].authorname;
        document.querySelector('.hover-container .description').innerHTML = bookdata[book_index].description;

    }
    if (flag == 0) {
        let hover_data = ` <div class='hover-container'> 
        <div class='image'>
        <img src="${bookdata[book_index].image}"alt='' class="hover-image">
        </div>
        <h4 style="display:inline">Book Name:</h4>
        <h4 style="display:inline" class="bookname">${bookdata[book_index].bookname}</h4>
        <p class='main-book-details catagory' >${bookdata[book_index].tag}</p>
        <p class='main-book-details author'>${bookdata[book_index].authorname}</p>
        <p class='hover-book-description description'>${bookdata[book_index].description}</p>
        </div>`
        document.querySelector('.book-details-container').insertAdjacentHTML('afterend', hover_data);

    }
    I = document.querySelector('.hover-container');
    I.style.top = `${y1}px`;
    I.style.left = `${x1}px`;
    flag = 1;


}
function hidedetails() {
    I.style.display = "none";
    flag1 = 0;
}



//;oad all the books from the database

window.addEventListener("load", () => {
    // setTimeout(() => {
    //     let userstatus=localStorage.getItem("userstatus");
    //     let user_name=localStorage.getItem("User-name")
    //   console.log(  localStorage.getItem("userstatus"));
    //     console.log(localStorage.getItem("User-name"));
    //     if(user_name==null||userstatus==null){
    //         window.location.href="../../user/usernavbar.php";
    //     }



    // },0);
    fetch("../../phpfile/showbooks.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data)
            bookdata = data;
            let i = 0;
            data.forEach(data => {
                let html = ` <div class="book-details" >
            <input type="hidden" value="${i++}">
            <img src="${data.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
            <div class="icon" onclick="issuebooks(this)">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="book-description">
                <h3>${data.bookname}</h3>
            </div>
        </div>`
                document.querySelector('.book-details-container').insertAdjacentHTML("beforeend", html);
            });
        })
})


//adding issuing books using icon 

function issuebooks(t) {

    let bookname = t.parentElement.children[3].children[0].innerHTML;
    let url = new URL("http://localhost/BCA4THPROJECT/admin/adminisuuebook/adminissuebook.php");
    url.searchParams.append('bookname', bookname);
    window.location.href = url;
}


function searchdata(e) {
    console.log(bookdata);
    console.log(e.key);
    let k = 0;
    let searchdata = document.querySelector('.search_input').value;
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
                    let count;
                    data.forEach(data => {
                        count = 0;
                        for (let i = 0; i < bookdata.length; i++) {

                            if (bookdata[i].bookname == data.bookname) {
                                break;
                            } else {
                                count = count + 1;
                            }
                        }
                        let html = ` <div class="book-details" >
            <input type="hidden" value="${count}">
            <img src="${data.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
            <div class="icon" onclick="issuebooks(this)">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="book-description">
                <h3>${data.bookname}</h3>
            </div>
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
        let count;
        bookdata.forEach(bookdata => {
            count = 0;
            let html = ` <div class="book-details" >
        <input type="hidden" value="${k}">
        <img src="${bookdata.image}" alt="error" onclick="showdetails(event)" onmouseout="hidedetails()">
        <div class="icon" onclick="issuebooks(this)">
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="book-description">
            <h3>${bookdata.bookname}</h3>
        </div>
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
