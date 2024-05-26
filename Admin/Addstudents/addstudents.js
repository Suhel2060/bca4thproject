let userdata, datacount, inputdataverify = 0;
let imageurl='../addstudents/studentimg/'

//to load all the data when window loadqa
window.addEventListener("load", () => {
    fetch("../../phpfile/studentdetails.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            userdata = data;
            for (let i = 0; i < data.length; i++) {
                let studentdata = `<tr>
            <td>${data[i].username}</td>
            <td>${data[i].studentname}</td>
            <td  id="table-image"><img src="${imageurl+data[i].image}" alt=""></td>
            <td>${data[i].email}</td>
            <td>${data[i].phonenumber}</td>
            <td><button onclick="edituser(this)">edit</button><br><button onclick="removedata(this)" id="removebtn">delete</button></td>
            
        </tr>`;
                document.querySelector("#studentsTableBody").insertAdjacentHTML("beforeend", studentdata)

            }
        })
});



//to add user data 
let addbtn = document.querySelector("#studentadd-form");
addbtn.addEventListener("submit", (e) => {
    e.preventDefault();
    if (inputdataverify == 0) { id="removebtn"
        let username = document.querySelector("#studentID").value;
        let password = document.querySelector("#password").value;
        let studentname = document.querySelector("#studentName").value;
        let Email = document.querySelector("#studentEmail").value;
        let phoneNumber = document.querySelector("#phoneNumber").value;
        let image = document.querySelector("#Image");
        console.log(image);
        //formdata creating and storing data from addstudents
        const formdata = new FormData();
        console.log(image.files);
        formdata.append("img", image.files[0]);
        formdata.append("username", username);
        formdata.append("password", password);
        formdata.append("email", Email);
        formdata.append("phonenumber", phoneNumber);
        formdata.append("studentname", studentname);

        // image and data sending through fetch api
        fetch("../../phpfile/imagehandle.php", {
            method: "POST",
            body: formdata,
        })
            .then((response) => response.json())
            .then((insertdata) => {
                console.log(insertdata);
                if (insertdata.status) {
                    let table = document.querySelector("#studentsTableBody");
                    let table_data = ` <tr>
        <td>${insertdata.username}</td>
        <td>${insertdata.studentname}</td>
        <td  id="table-image"><img src="${imageurl+insertdata.image}" alt=""></td>
        <td>${insertdata.email}</td>
        <td>${insertdata.phonenumber}</td>
        <td><button onclick="edituser(this)">edit</button><br><button onclick="removedata(this)" id="removebtn">delete</button></td>
        </tr>`;
                    table += table.insertAdjacentHTML("beforeend", table_data);
                    let message = document.querySelector('#insert-message');
                    message.innerHTML = "Data insert successful";
                    message.style.display = "block";
                    message.style.color = "blue";
                    setTimeout(() => {
                        message.style.display = "none";
                    }, 3000);
                    let a = document.querySelectorAll(".addstudent-data input");
                    // let a=document.querySelectorAll("#studentID","#password","#studentName","#studentEmail","#phoneNumber","#Image");
                    a.forEach((data) => {
                        data.value = "";
                    })

                } else {
                    let message = document.querySelector('#insert-message');
                    message.innerHTML = "Data insert unsuccessful";
                    message.style.display = "block";
                    message.style.color = "red";
                    setTimeout(() => {
                        message.style.display = "none";
                    }, 3000);
                }
            })
    }
    else {
        let message = document.querySelector('#insert-message');
        message.innerHTML = "Given data is not in format";
        message.style.display = "block";
        message.style.color = "red";
        setTimeout(() => {
            message.style.display = "none";
        }, 3000);
    }
}
);

//Search the data 

function searchdata(e) {
    let k = 0;
    let searchdata = document.querySelector('.search_input').value;
    if (!(searchdata == "" || searchdata == null)) {
        let formdata = new FormData();
        formdata.append("searchdata", searchdata);
        formdata.append("searchtype", "user");
        fetch("../../phpfile/searchdata.php", {
            method: "POST",
            body: formdata,
        })
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                // document.querySelector(".searchdatalist").style.display="block";
                // console.log(data);
                // console.log(data.length);
                // let i=0,j=0;
                if (data.length > 0) {
                    datacount = 0;
                    data.forEach((data) => {
                        loaddetails(data);
                    })

                } else {
                    document.querySelector('.searchlist').innerHTML = "No Result found";
                    document.querySelector('.searchlist').style.display = "block";

                    // document.querySelector('.searchmessage').style.display="block";
                    // document.querySelector('.searchmessage').innerHTML="no result found";
                    datacount = 0;
                    userdata.forEach((data) => {
                        loaddetails(data);
                    })



                }
            })
    }
    else {
        document.querySelector('.searchlist').style.display = "none";

        datacount = 0;
        userdata.forEach((data) => {
            loaddetails(data);
        })

    }
}

function loaddetails(data) {
    let table = document.querySelector("#studentsTableBody");
    let table_data = ` <tr>
<td>${data.username}</td>
<td>${data.studentname}</td>
<td  id="table-image"><img src="${imageurl+data.image}" alt=""></td>
<td>${data.email}</td>
<td>${data.date}</td>
<td><button onclick="edituser(this)">edit</button><br><button onclick="removedata(this)" id="removebtn">delete</button></td>
</tr>`;
    if (datacount == 0) {
        table.innerHTML = table_data;
    } else {
        table.innerHTML += table_data;
    }
    datacount++;

}

//Remove the user
function removedata(t) {
    let username = t.parentElement.parentElement.children[0].innerHTML;
    let name = t.parentElement.parentElement.children[1].innerHTML;
    console.log(username, name);
    let data = {
        "username": username,
        "studentname": name
    }
    let check = confirm("Do you wabt to remove the data");
    if (check) {
        fetch("../../phpfile/userremove.php", {
            method: "POST",
            header: {
                "Content-Type": "application/json; Charset=UTf-8"
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                if (data.remove) {
                 t.parentElement.parentElement.remove();
                    alert("data is deleted");

                }
                else {
                    alert("data is not deleted");
                }
            })
    }
}



//for verifyiing the input data using regex
function checkdataentry(t) {
    console.log(t.id);
    var data = t.value;
    console.log(t.value);
    if (t.id == "studentID") {
        let usernamepattern = /^[A-Za-z][A-Za-z0-9_]{7,29}$/
        let result = usernamepattern.test(data)
        console.log(result);
        if (t.value == null || t.value == "") {
            t.setAttribute("style", "color:black");
        } else {
            if (result) {

                t.setAttribute("style", "color:black");
                console.log("verify")
                inputdataverify = 0;
            } else {
                t.setAttribute("style", "color:red");
                console.log("verify")
                inputdataverify = 1
            }
        }
    }
    else if (t.id == "password") {
        let passwordpattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*])(?!.*\s).{8,20}$/
        let result = passwordpattern.test(data)
        console.log(result);
        if (t.value == null || t.value == "") {
            t.setAttribute("style", "color:black");
        } else {
            if (result) {

                t.setAttribute("style", "color:black");
                console.log("verify")
                inputdataverify = 0;
            } else {
                t.setAttribute("style", "color:red");
                console.log("verify")
                inputdataverify = 1
            }
        }

    }

    else if (t.id == "studentEmail") {
        let emailpattern = /^[a-zA-Z0-9._]+@gmail\.com$/
        let result = emailpattern.test(data)
        console.log(result);
        if (t.value == null || t.value == "") {
            t.setAttribute("style", "color:black");
        } else {
            if (result) {

                t.setAttribute("style", "color:black");
                console.log("verify")
                inputdataverify = 0;
            } else {
                t.setAttribute("style", "color:red");
                console.log("verify")
                inputdataverify = 1
            }
        }

    }
    else if (t.id == "phoneNumber") {
        let numberpattern = /^9\d{9}$/
        let result = numberpattern.test(data)
        console.log(result);
        if (t.value == null || t.value == "") {
            t.setAttribute("style", "color:black");
        } else {
            if (result) {

                t.setAttribute("style", "color:black");
                console.log("verify")
                inputdataverify = 0;
            } else {
                t.setAttribute("style", "color:red");
                console.log("verify")
                inputdataverify = 1
            }
        }

    }
    else if (t.id == "studentName") {
        let numberpattern = /^[a-zA-z]{3,50}$/
        let result = numberpattern.test(data)
        console.log(result);
        if (t.value == null || t.value == "") {
            t.setAttribute("style", "color:black");
        } else {
            if (result) {

                t.setAttribute("style", "color:black");
                console.log("verify")
                inputdataverify = 0;
            } else {
                t.setAttribute("style", "color:red");
                console.log("verify")
                inputdataverify = 1
            }
        }

    }




}

// function colorborder(t){
// console.log(t);
// if(t.value==null||t.value==""){
//     t.setAttribute("style","color:black");
// }
// }

//update the user
let usernameforupdate,imageforupdate,updatehtml;
function edituser(t){
    updatehtml=t.parentElement.parentElement;
    let username=t.parentElement.parentElement.children[0].innerHTML;
    let formdata=new FormData();
    formdata.append("username",username);
    //get the data of the user to be updated
    fetch("../../phpfile/edituser.php", {
        method: "POST",
        body: formdata,
    })
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            document.querySelector('#updateStudentForm').style.display="block"
            document.querySelector('#studentadd-form').style.display="none"
            let allhtml=document.querySelectorAll(".updatestudent-data input");
            usernameforupdate=data.username;
            imageforupdate=data.image;
            allhtml[0].value=data.username;
            allhtml[1].value=data.studentname;
            allhtml[2].value=data.email;
            allhtml[3].value=data.phonenumber;
        }
        );
}

document.querySelector('#cancelbtn').addEventListener("click",()=>{
    document.querySelector('#updateStudentForm').style.display="none"
    document.querySelector('#studentadd-form').style.display="block"
})

//funtion for update btn
document.querySelector('#updateStudentForm').addEventListener("submit",(e)=>{
    e.preventDefault();
    let data=new FormData();
data.append("updateusername",document.querySelector('#updatestudentID').value);
data.append("username",usernameforupdate);
data.append("name",document.querySelector('#updatestudentName').value);
data.append("email",document.querySelector('#updatestudentEmail').value);
data.append("phonenumber",document.querySelector('#updatephoneNumber').value);
let image=document.querySelector('#updateImage')
if(image.files.length==0||imageforupdate==image.files[0].name){
    console.log("empty")
    data.append("imagedata","false");
}else{
    data.append("imagedata","true");
    data.append("image",document.querySelector('#updateImage').files[0]);

}
fetch("../../phpfile/updatestudent.php",{
    method: "POST",
    body: data,
}).then(response=>response.json())
.then((data)=>{
console.log(data);
updatehtml.children[0].innerHTML=data.data[0].username;
updatehtml.children[1].innerHTML=data.data[0].studentname;
updatehtml.children[2].childrenn[0].src="../addstudents/studentimg/"+data.data[0].image;
updatehtml.children[3].innerHTML=data.data[0].email;
updatehtml.children[4].innerHTML=data.data[0].phonenumber;
})
})