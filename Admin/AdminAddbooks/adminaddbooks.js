let updatebookimage;
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
    fetch("../../phpfile/adminaddbooks.php",{
        method:"POST",
        body: form_data,
    })
    .then((response) => response.json())
    .then((data)=>{
        console.log(data);
        if(data.status=="success"){
            document.querySelector(".message").innerHTML="Data insert successful"
            document.querySelector(".message").classList.add("success");
            let bookdata = `<tr>
            <td>${data.bookid[0].book_id}</td>
            <td>${data.bookname}</td>
            <td>${data.isbn}</td>
            <td>${data.authorname}</td>

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


        }
        else if(data.bookexists==true){
            
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
    if(image.files.length==0||imageforupdate==image.files[0].name){
        console.log("empty")
        form_data.append("imagedata","false");
    }else{

        form_data.append("imagedata","true");
        form_data.append("image",document.querySelector('#updateImage').files[0]);
    
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
            edittablerow.children[1].innerHTML=bookname;
            edittablerow.children[2].innerHTML=ISBN;
            edittablerow.children[3].innerHTML=authorname;


        }
    })}

}


//to load all the data when window loadqa
window.addEventListener("load", () => {
    fetch("../../phpfile/bookdetails.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            updatebookimage=data.image;
            userdata = data;
            for (let i = 0; i < data.length; i++) {
                let bookdata = `<tr>
            <td>${data[i].book_id}</td>
            <td>${data[i].bookname}</td>
            <td>${data[i].ISBN}</td>
            <td>${data[i].authorname}</td>

            <td class="btn-td"><button onclick="edituser(this)">edit</button></td><td class="btn-td"><button onclick="removedata(this)" id="removebtn">delete</button></td>
            
        </tr>`;
                document.querySelector("tbody").insertAdjacentHTML("beforeend", bookdata)

            }
        })
});


//update the book
// let usernameforupdate,imageforupdate;

let edittablerow//to get the row in which data to be edited
function edituser(t){
    edittablerow=t.parentElement.parentElement;
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
            allhtml[0].value=data.book_id;
            allhtml[1].value="updatebook";
            allhtml[2].value=data.ISBN;
            allhtml[3].value=data.bookname;
            allhtml[4].value=data.authorname;
            allhtml[5].value=data.tag;
            allhtml[6].value=data.quantity;
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
    document.querySelector('#operationtype').value="updatebook"
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
