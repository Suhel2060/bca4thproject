
const fetchUserIssuedBooks=()=>{
    if(localStorage.getItem('User-name')){
        let username={
            username:localStorage.getItem('User-name')
        }
    fetch("../../phpfile/userissuebook.php",{
        method:"POST",
        headers:{
          "Content-Type":"application/json; Charset=UTF-8",
        },
        body:JSON.stringify(username),
    })
    .then((response)=>response.json())
    .then((post_data)=>{
        document.querySelector('.body-container').style.border="none"

        console.log(post_data)
        let index=1;

        post_data.forEach((data) => {
            let html=`                <div class="container">
            <div class="bookdetailscontainer">
                <div class="img"><img src=${'../../admin/adminaddbooks/bookimg/'+data.image} alt="Error"></div>
  
                <div class="bookdetails">
                    <div class="booktitle">
                        <h2>${data.bookname}</h2>
                    </div>
                    <div class='book-details-body-container'>
                    <div class='book-details-body'>
                    <div class="authorame">
                        <p>${data.authorname}</p>
                    </div>
                    <div class="tags">
                        <p>${data.tag}</p>
                    </div>
                    <p class="description">${data.description}</p>
                
                </div>
                <div class="bookdate">
                <div style="display:flex;flex-direction:row;align-items:center;margin:0px;padding:0px;">
                <span>Issued Date</span>
                <div class="remainingtime">${data.issueddate}</div></div>
                <div style="display:flex;flex-direction:row;align-items:center;margin:0px;padding:0px;">
                <span>Return Date</span>
                <div class="returndate">${data.returndate}</div>
                </div>
                <div class=remaining${index} style='margin-right:70px'></div>
            </div>
            </div>

            </div>





        </div>`
    if(index==1){set_interval1(index,data.returndate) ;}
    else if(index==2){set_interval2(index,data.returndate) ;}
    else if(index==3){set_interval3(index,data.returndate) ;}
    else if(index==4){set_interval4(index,data.returndate) ;}
    else if(index==5){set_interval5(index,data.returndate) ;}

        document.querySelector('section').insertAdjacentHTML('beforeend',html);
        index+=1;
        });

      
     
        // setInterval(() => {
        //     let day=date.getDate();
        //     let month=date.getMonth();
        //     let year=date.getFullYear();
        //     console.log(`${year}-${month}-${day}`)
        //     // console.log(year)
        // }, 100);
    })
}else{

    show_login();
    // let html=`<h2 class='container' style="text-align:center">Please Login to see the Book Issued By You`
    // document.querySelector('section').insertAdjacentHTML('beforeend',html)
}

}




window.addEventListener("load",()=>{
    fetchUserIssuedBooks();

})





let interval
const set_interval1=(index,data)=>{
interval=setInterval(function(){setdata1(index,data)},1000); 
}
function setdata1(index,data){
    let currentDate = new Date();

    let targetDateString = data;
    // Target date (replace "yyyy-mm-dd" with your target date)
let targetDate = new Date(targetDateString);

let differenceInMilliseconds = targetDate - currentDate;
// Calculate the difference in milliseconds

// Convert milliseconds to hours, minutes, and seconds
    let remainingHours = Math.floor(differenceInMilliseconds / (1000 * 60 * 60));
    let remainingMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
let remainingSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);
document.querySelector(`.remaining${index}`).innerHTML=`${remainingHours} H : ${ remainingMinutes}M : ${remainingSeconds} S`
if(remainingHours<0||remainingMinutes<0){
clearInterval(interval);
}
}



let interval2
const set_interval2=(index,data)=>{
    interval2=setInterval(function(){setdata2(index,data)},1000); 


}
function setdata2(index,data){
    let currentDate = new Date();
    let targetDateString = data;
    // Target date (replace "yyyy-mm-dd" with your target date)
let targetDate = new Date(targetDateString);

let differenceInMilliseconds = targetDate - currentDate;
// Calculate the difference in milliseconds

// Convert milliseconds to hours, minutes, and seconds
    let remainingHours = Math.floor(differenceInMilliseconds / (1000 * 60 * 60));
    let remainingMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
let remainingSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);
document.querySelector(`.remaining${index}`).innerHTML=`${remainingHours} H : ${ remainingMinutes}M : ${remainingSeconds} S`
if(remainingHours<0||remainingMinutes<0){
    clearInterval(interval2);
    }
}


let interval3
const set_interval3=(index,data)=>{
    interval3=setInterval(function(){setdata3(index,data)},1000)
}
function setdata3(index,data){
    let currentDate = new Date();

    let targetDateString = data+"T00:00:00";
    // Target date (replace "yyyy-mm-dd" with your target date)
let targetDate = new Date(targetDateString);

let differenceInMilliseconds = (targetDate - currentDate);

// Calculate the difference in milliseconds

// Convert milliseconds to hours, minutes, and seconds
    let remainingHours = Math.floor(differenceInMilliseconds / 3600000);
    let remainingMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
    // let remainingMinutes = Math.floor(differenceInMilliseconds%1000/60000);
let remainingSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);
document.querySelector(`.remaining${index}`).innerHTML=`${remainingHours} H : ${ remainingMinutes}M : ${remainingSeconds} S`
if(remainingHours<0||remainingMinutes<0){
    clearInterval(interval3);
    }
}

let interval4
const set_interval4=(index,data)=>{
    interval4=setInterval(function(){setdata4(index,data)},1000)
}
function setdata4(index,data){
    let currentDate = new Date();

    let targetDateString = data+"T00:00:00";
    // Target date (replace "yyyy-mm-dd" with your target date)
let targetDate = new Date(targetDateString);

let differenceInMilliseconds = (targetDate - currentDate);

// Calculate the difference in milliseconds

// Convert milliseconds to hours, minutes, and seconds
    let remainingHours = Math.floor(differenceInMilliseconds / 3600000);
    let remainingMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
    // let remainingMinutes = Math.floor(differenceInMilliseconds%1000/60000);
let remainingSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);
document.querySelector(`.remaining${index}`).innerHTML=`${remainingHours} H : ${ remainingMinutes}M : ${remainingSeconds} S`
if(remainingHours<0||remainingMinutes<0){
    clearInterval(interval4);
    }
}

let interval5
const set_interval5=(index,data)=>{
    interval5=setInterval(function(){setdata5(index,data)},1000)
}
function setdata5(index,data){
    let currentDate = new Date();

    let targetDateString = data+"T00:00:00";
    // Target date (replace "yyyy-mm-dd" with your target date)
let targetDate = new Date(targetDateString);

let differenceInMilliseconds = (targetDate - currentDate);

// Calculate the difference in milliseconds

// Convert milliseconds to hours, minutes, and seconds
    let remainingHours = Math.floor(differenceInMilliseconds / 3600000);
    let remainingMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
    // let remainingMinutes = Math.floor(differenceInMilliseconds%1000/60000);
let remainingSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);
document.querySelector(`.remaining${index}`).innerHTML=`${remainingHours} H : ${ remainingMinutes}M : ${remainingSeconds} S`
if(remainingHours<0||remainingMinutes<0){
    clearInterval(interval5);
    }
}


const clearissuedbooks=()=>{
  
    clearInterval(interval5)
    clearInterval(interval)
    clearInterval(interval2)
    clearInterval(interval3)
    clearInterval(interval4)
    let data=document.querySelectorAll('.container');
    data.forEach((element)=>{
        element.remove();
        console.log("hello")
    })
}


