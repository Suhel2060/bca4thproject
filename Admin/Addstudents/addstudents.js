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
    console.log(image.files[0].type);
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
.then((imagedata)=>{
    console.log(imagedata)
})
}
);