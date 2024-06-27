let bookname;
let url;
let searchbookdata;
window.addEventListener("load", () => {
    url = new URLSearchParams(window.location.search);
    bookname = url.get("bookname");
    bookid=url.get('bookid');
    console.log(bookid)
    console.log(bookname);
    document.querySelector('#BookName').value = url.get("bookname");})


function issuebook(e) {
    e.preventDefault();
    let username = document.querySelector('#Username').value;
    let bookid = document.querySelector('#bookid').value;
    if (bookname == null) {
        bookname = document.querySelector('#BookName').value;
    }
    console.log(username, bookid, bookname);
    let data = {
        "username": username,
        "bookid": bookid,
        "bookname": bookname
    }
    fetch("../../phpfile/adminissuebook.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; Charset=UTf-8"
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then((data) => {
            bookname = null;
            console.log(data);
            //console.log(data);
            // url.delete("bookname");
            // console.log(url.get("bookname"));
            if (data.userstatus == "found") {
                if (data.bookstatus == "found") {
                    if (!(data.usertakenbook)) {
                        if (data.booktaken == "lessthanfive") {
                            if (data.issuebook) {
                                document.querySelector(".message").innerHTML = "Book Issued succesfully"
                                messageDisplay();
                                document.querySelector("#studentimg").style.display = "none";
                                bookname = null;
                                url.delete('bookid')
                                url.delete('bookname')
                                window.history.replaceState({}, '', url);

                            }
                        } else {
                            document.querySelector(".message").innerHTML = "limit have been reached"
                            messageDisplay();
                        }
                    } else {
                        document.querySelector(".message").innerHTML = "Already taken this book"
                        messageDisplay();

                    }
                } else {
                    document.querySelector(".message").innerHTML = "Book not found"
                    messageDisplay();

                }
            } else {
                document.querySelector(".message").innerHTML = "User not found"
                messageDisplay();
            }

        })
}

function messageDisplay() {
    document.querySelector(".message").style.display = "block";
    setTimeout(() => {
        document.querySelector(".message").style.display = "none";
    }, 3000);
}

function userimage() {
    let username = document.getElementById('Username').value;
    let data = {
        "username": username
    }
    fetch("../../phpfile/userimage.php", {
        method: "POST",
        header: {
            "Content-Type": "application/json; Charset=UTf-8"
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then((data) => {
            document.querySelector(".issue-book-formitems img").src = '../addstudents/studentimg/'+data.image[0];
            document.querySelector("#studentimg").style.display = "block";



        })
}

function bookdata_search() {
    let data, count = 0,i=0;
    let bookname = document.querySelector("#BookName").value;
    let bookid = document.querySelector("#bookid").value;
    if (bookname == "" || bookname == null) {
        data = {
            "searchdataid": bookid,
            "searchdataname": "null"
        }
    }
    else if (bookid == "" || bookid == null) {
        data = {
            "searchdataid": "null",
            "searchdataname": bookname
        }
    }
    else {
        data = {
            "searchdataid": bookid,
            "searchdataname": bookname
        }
    }

    fetch("../../phpfile/bookdatasearch.php", {
        method: "POST",
        header: {
            "Content-Type": "application/json; Charset=UTf-8"
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then((data) => {
            searchbookdata=data;
            console.log(data);
            document.querySelector(".list").style.display = "block";
            if (data.length > 0) {
                data.forEach(data => {
                    let html = `<div onclick=loadbookid(this) id="${i}" style="width:100%">${data.individual_book_id}</div>`
                    // if (bookname == "" || bookname == null) {
                    //     document.querySelector(".list").style.display = "none";
                    // }
                     if (count == 0) {
                        document.querySelector(".list").innerHTML = html;
                        count = 1;
                    }
                    else
                        document.querySelector(".list").innerHTML += html;

                        i++;

                });
            } else {
                document.querySelector(".list").innerHTML = "<h3>no result found</h3>";
            }
    

        })


}
function hidesearch(){
    setTimeout(() => {
        document.querySelector(".list").style.display = "none"; 
    }, 100);

}

function loadbookid(t){
    let bookname = document.querySelector("#BookName").value;
    let bookid = document.querySelector("#bookid");
    bookid.value=t.innerHTML;
    console.log(t.innerHTML)
    if(bookname==""||bookname==null){
        let id=t.id;
        document.querySelector("#BookName").value=searchbookdata[id].bookname;
    }
            document.querySelector(".list").style.display = "none";
}