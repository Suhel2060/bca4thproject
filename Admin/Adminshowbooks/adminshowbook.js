var bookdata;
var flag = 0;
let flag1=0;
var I,book_index;
function showdetails(event) {
    event.stopPropagation();
    // console.log(bookdata)

        let x = event.clientX;
         let y = event.clientY;
        // let x = event.pageX;
        //  let y = event.pageY;
         var x1=x+40;
         var y1=y-350;
         if(flag1==0){
            flag1=1;
         book_index=document.elementFromPoint(x,y).parentElement.children[0].value;
         console.log(book_index);

         }
        //  console.log(x);
        //  console.log(y);

    if(flag==1){
        I.style.display="inline-block";
        console.log(book_index);
        document.querySelector('.hover-image').src=bookdata[book_index].image;
        document.querySelector('.hover-container h2').innerHTML=bookdata[book_index].bookname;
        document.querySelector('.hover-container .catagory').innerHTML=bookdata[book_index].catagory;
        document.querySelector('.hover-container .author').innerHTML=bookdata[book_index].authorname;
        document.querySelector('.hover-container .description').innerHTML=bookdata[book_index].description;

    }
    if (flag == 0) {
        let hover_data=` <div class='hover-container'> 
        <div class='image'>
        <img src=""alt='' class="hover-image">
        </div>
        <h2></h2>
        <p class='main-book-details catagory' ></p>
        <p class='main-book-details author'></p>
        <p class='main-book-details'>Publication Name</p>
        <p class='hover-book-description description'></p>
        </div>`
        document.querySelector('.book-details-container').insertAdjacentHTML('afterend', hover_data);

    }
    I = document.querySelector('.hover-container');
    I.style.top = `${y1}px`;
    I.style.left = `${x1}px`;
    flag = 1;


}
function hidedetails(){
    I.style.display="none";
    flag1=0;
}



//;oad all the books from the database

window.addEventListener("load",()=>{
    fetch("../../phpfile/showbooks.php")
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
        bookdata=data;
        let i=0;
        data.forEach(data => {
            let html=` <div class="book-details" >
            <input type="hidden" value="${i++}">
            <img src="${data.image}" alt="error" onmousemove="showdetails(event)" onmouseout="hidedetails()">
            <div class="icon" onclick="issuebooks(this)">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="book-description">
                <h3>${data.bookname}</h3>
            </div>
        </div>`
            document.querySelector('.book-details-container').insertAdjacentHTML("beforeend",html);
        });
    })
})



//adding issuing books using icon 

function issuebooks(t){
   
    let bookname=t.parentElement.children[3].children[0].innerHTML;
    let url =new URL("http://localhost/BCA4THPROJECT/admin/adminisuuebook/adminissuebook.php");
    url.searchParams.append('bookname',bookname);
    window.location.href=url;
}
