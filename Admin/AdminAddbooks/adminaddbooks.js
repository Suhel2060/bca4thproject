let updatebookimage;
let edittablerow//to get the row in which data to be edited
function insertbook(e){
    e.preventDefault();
    if(document.querySelector('#operationtype').value=="addbook"){
        console.log(document.querySelector('#operationtype').value)
    let ISBN=document.querySelector('#ISBN').value;
    let bookname=document.querySelector('#BookName').value;
    let authorname=document.querySelector('#AuthorName').value;
    let tag_data=document.querySelector('#Tags').value;
    // let tag=tag_data.split(",");
    let image=document.querySelector('#image');
    let description=document.querySelector('#Description').value;
    let quantity=document.querySelector('#Quantity').value;
    const form_data=new FormData();
    form_data.append("image",image.files[0]);
    form_data.append("ISBN",ISBN);
    form_data.append("bookname",bookname);
    form_data.append("authorname",authorname);
    form_data.append("tags",tag_data);
    form_data.append("description",description);
    form_data.append("quantity",quantity);
    // console.log(image.files[0],ISBN,bookname,authorname,tag_data,description,quantity)
    fetch("../../phpfile/adminaddbooks.php",{
        method:"POST",
        body: form_data,
    })
    .then((response) => response.json())
    .then((data)=>{
        console.log(data);
        if(data.status=="success"){
                        let bookdata = `<tr>
            <td>${data.bookid[0].book_id}</td>
            <td class="bookname_list">${data.bookname}</td>
            <td class="bookname_list">${data.isbn}</td>
            <td class="bookname_list">${data.authorname}</td>

            <td class="btn-td"><button onclick="edituser(this)">edit</button></td><td class="btn-td"><button onclick="removedata(this)" id="removebtn">delete</button></td>
            
        </tr>`;
                document.querySelector("tbody").insertAdjacentHTML("beforeend", bookdata)
        //     let bookdata = `<tr>
        //     <td>${}</td>
        //     <td>${data[i].bookname}</td>
        //     <td>${data[i].ISBN}</td>
        //     <td>${data[i].authorname}</td>

        //     <td class="btn-td"><button onclick="edituser(this)">edit</button></td><td class="btn-td"><button onclick="removedata(this)" id="removebtn">delete</button></td>
            
        // </tr>`;
        //         document.querySelector("tbody").insertAdjacentHTML("beforeend", bookdata)
        showmessage("Bookdata Insert Successfully","blue")

        }
        else if(data.bookexists==true){
            showmessage("Bookdata aldready exists","red")
        }
        else if(data.datainsert==false){
            showmessage("Bookdata Insert Unsuccessful","red")
        }
        else if(data.imageinsert==false){
            showmessage("Image Insert Unsuccessful","red")
        }
    })
}else{
    const form_data=new FormData();
    let ISBN=document.querySelector('#ISBN').value;
    let bookid=document.querySelector('#bookid').value;
    let bookname=document.querySelector('#BookName').value;
    let authorname=document.querySelector('#AuthorName').value;
    let tag_data=document.querySelector('#Tags').value;
    let description=document.querySelector('#Description').value;
    let quantity=document.querySelector('#Quantity').value;
    // let tag=tag_data.split(",");
    let image=document.querySelector('#image');
    if(image.files.length==0||updatebookimage==image.files[0].image){
        console.log("empty")
        form_data.append("imagedata","false");
    }else{

        form_data.append("imagedata","true");
        form_data.append("image",image.files[0]);
    
    }

    form_data.append("ISBN",ISBN);
    form_data.append("bookid",bookid);
    form_data.append("bookname",bookname);
    form_data.append("authorname",authorname);
    form_data.append("tags",tag_data);
    form_data.append("description",description);
    form_data.append("quantity",quantity);
    fetch("../../phpfile/adminupdatebooks.php",{
        method:"POST",
        body: form_data,
    })
    .then((response) => response.json())
    .then((data)=>{
        console.log(data)
        if(data.success){
            edittablerow.children[1].innerHTML=data.data[0].bookname;
            edittablerow.children[2].innerHTML=data.data[0].isbn;
            edittablerow.children[3].innerHTML=data.data[0].authorname;
        showmessage("Bookdata Update Successfully","blue");
    
        }
        else{
            showmessage("Bookdata Update Unsuccessful","red"); 
        }
    })}

}

const showmessage=(message,colordetails)=>{
    document.querySelector('.add-book-message span').innerHTML=message;
            document.querySelector('.add-book-message').setAttribute("style",`color:${colordetails}`);
            document.querySelector('.add-book-message').style.opacity=1;
            setTimeout(() => {
                document.querySelector('.add-book-message').style.opacity=0;
    
            }, 900);
}


//to load all the data when window loadqa
window.addEventListener("load", () => {
    fetch("../../phpfile/bookdetails.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            
            bookdata = data;
            for (let i = 0; i < data.length; i++) {
                let bookdata = `<tr>
            <td>${data[i].book_id}</td>
            <td class="bookname_list">${data[i].bookname}</td>
            <td class="bookname_list">${data[i].ISBN}</td>
            <td class="bookname_list">${data[i].authorname}</td>

            <td class="btn-td"><button onclick="edituser(this)">edit</button></td><td class="btn-td"><button onclick="removedata(this)" id="removebtn">delete</button></td>
            
        </tr>`;
                document.querySelector("tbody").insertAdjacentHTML("beforeend", bookdata)
                document.querySelector('.Add-book-container h2').innerHTML="Add Books"

            }
        })
});


//update the book
// let usernameforupdate,imageforupdate;


function edituser(t){
    edittablerow=t.parentElement.parentElement;
    console.log(edittablerow)
    let bookid=t.parentElement.parentElement.children[0].innerHTML;
    let formdata=new FormData();
    formdata.append("bookid",bookid);
    //get the data of the user to be updated
    fetch("../../phpfile/bookupdatedata.php", {
        method: "POST",
        body: formdata,
    })
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            // document.querySelector('#updateStudentForm').style.display="block"
            // document.querySelector('#studentadd-form').style.display="none"
            let allhtml=document.querySelectorAll(".form-inputs");
            console.log(allhtml)
            // usernameforupdate=data.username;
            // imageforupdate=data.image;
            document.querySelector('.Add-book-container h2').innerHTML="Update Books"
            allhtml[0].value=data.book_id;
            allhtml[1].value="updatebook";
            allhtml[2].value=data.ISBN;
            allhtml[3].value=data.bookname;
            allhtml[4].value=data.authorname;
            allhtml[5].value=data.tag;
            allhtml[6].value=data.quantity;
            updatebookimage=data.image;
            document.querySelector('textarea').value=data.description
            document.querySelector('.addbtn').style.display="none";
            document.querySelectorAll('.updatebtn').forEach((btn)=>{
                btn.style.display="inline-block";
            })
        }
        );
}

function cancelupdate(){
    document.querySelector('.addbtn').style.display="inline-block";
    document.querySelectorAll('.updatebtn').forEach((btn)=>{
        btn.style.display="none";

    })
    document.querySelectorAll('.form-inputs').forEach((data)=>{
        data.value=""

    })
    document.querySelector('textarea').value=""
    document.querySelector('#operationtype').value="addbook";
    document.querySelector('.Add-book-container h2').innerHTML="Add Books"

}


//delete books
function removedata(t){
    let confirmremove=confirm("Do you want to delete the book data")
    if(confirmremove){
    const bookid=t.parentElement.parentElement.children[0].innerHTML;
    console.log(bookid)
    const form_data=new FormData();
    form_data.append("bookid",bookid);
    fetch("../../phpfile/deletebook.php", {
        method: "POST",
        body: form_data,
    })
        .then(response => response.json())
        .then((data) => {
            if(data.remove){
            t.parentElement.parentElement.remove()
            alert("Data removed successfully")
            }
        else alert("Data failed to remove")
        })
    }
}
