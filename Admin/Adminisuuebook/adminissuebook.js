let bookname;
let url;
window.addEventListener("load", () => {
    url = new URLSearchParams(window.location.search);
    bookname = url.get("bookname");
    console.log(bookname);
    document.querySelector('#BookName').value = url.get("bookname");
})


function issuebook() {
    let username = document.querySelector('#Username').value;
    let studentname = document.querySelector('#Studentname').value;
    console.log(username, studentname, bookname);
    let data = {
        "username": username,
        "studentname": studentname,
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
            //console.log(data);
            // url.delete("bookname");
            // console.log(url.get("bookname"));
            if (data.userstatus == "found") {
                if ( data.bookstatus == "found") {
                    if (!(data.usertakenbook)) {
                        if (data.booktaken == "lessthanfive") {
                            if (data.issuebook) {
                                document.querySelector(".message").innerHTML = "Book Issued succesfully"
                                messageDisplay();
                            }
                        } else {
                            document.querySelector(".message").innerHTML = "limit have been reached"
                            messageDisplay();
                        }
                    } else {
                        document.querySelector(".message").innerHTML="Already taken this book"
                        messageDisplay();

                    }
                }else{
                     document.querySelector(".message").innerHTML="Book not found"
                     messageDisplay();
                   
                }
            }else{
                document.querySelector(".message").innerHTML="User not found"
                messageDisplay();
            }

        })
}

function messageDisplay(){
                document.querySelector(".message").style.display="block";
                setTimeout(() => {
                    document.querySelector(".message").style.display="none";
                }, 3000);
}
