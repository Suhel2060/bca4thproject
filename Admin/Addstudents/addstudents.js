window.addEventListener("load",()=>{
    fetch("../../phpfile/studentdetails.php")
    .then(response => response.json())
    .then((data) => {
        console.log(data);

        for(let i=0;i<data.length;i++){
            let studentdata=`<tr>
            <td>${data[i].username}</td>
            <td>${data[i].studentname}</td>
            <td  id="table-image"><img src="${data[i].image}" alt=""></td>
            <td>${data[i].email}</td>
            <td>2080-12-30</td>
            <td><button>edit<button><button>delete<button></td>
            
        </tr>`;
            document.querySelector("#studentsTableBody").insertAdjacentHTML("beforeend",studentdata)

        }
    })
});




let addbtn=document.querySelector("#Addbtn");
addbtn.addEventListener("click",()=>{

    let username=document.querySelector("#studentID").value;
    let password=document.querySelector("#password").value;
    let studentname=document.querySelector("#studentName").value;
    let Email=document.querySelector("#studentEmail").value;
    let phoneNumber=document.querySelector("#phoneNumber").value;
    let image=document.querySelector("#Image");
    console.log(image);
    //formdata creating and storing data from addstudents
    const formdata=new FormData();
    console.log(image.files);
    formdata.append("img",image.files[0]);
    formdata.append("username",username);
    formdata.append("password",password);
    formdata.append("email",Email);
    formdata.append("phonenumber",phoneNumber);
    formdata.append("studentname",studentname);
    
    
    
    
    // console.log(formdata.get("img"));
    // console.log(formdata.get("username"));
    // // formdata.append("img",image.files[0]);
    // // formdata.append("img",image.files[0]);
  
    // let data={
    //     "username":username,
    //     "password":password,
    //     "email":Email,
    //     "phone":phoneNumber,
    // }
    // let options={
    //     method:"POST",
    //     headers:{
    //         "Content-Type":"application/json; Charset=UTF-8"
    //     },
    //     body:JSON.stringify(data),
    // }

    // fetch("../../phpfile/adminaddstudents.php",options)
    // .then((response)=>{
    //     console.log(response.status);
    //     response.json();})
    // .then((post_data)=>{
    //     console.log(post_data);
    // });

// image and data sending through fetch api
fetch("../../phpfile/imagehandle.php",{
    method:"POST",
    body:formdata,
})
.then((response)=>response.json())
.then((insertdata)=>{
    console.log(insertdata);
    if(insertdata.status){
        let table=document.querySelector("#studentsTableBody");
        let table_data=` <tr>
        <td>${insertdata.username}</td>
        <td>${insertdata.studentname}</td>
        <td  id="table-image"><img src="${insertdata.image}" alt=""></td>
        <td>${insertdata.email}</td>
        <td>${insertdata.date}</td>
        <td><button>edit<button><button>delete<button></td>
    </tr>`;
    table=+table.insertAdjacentHTML("beforeend",table_data);
    let message=document.querySelector('#insert-message');
    message.innerHTML="Data insert successful";
    message.style.display="block";
    message.style.color="blue";
    setTimeout(() => {
        message.style.display="none";
    }, 3000);
    let a=document.querySelectorAll(".addstudent-data input");
    // let a=document.querySelectorAll("#studentID","#password","#studentName","#studentEmail","#phoneNumber","#Image");
    a.forEach((data) =>{
        data.value="";
    })

    }else{
        let message=document.querySelector('#insert-message');
        message.innerHTML="Data insert unsuccessful";
        message.style.display="block";
        message.style.color="red";
        setTimeout(() => {
            message.style.display="none";
        }, 3000);
    }
})
}
);