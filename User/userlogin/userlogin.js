//login using fetch
document.querySelector("#form-loginbtn").addEventListener("click",async(e)=>{
  e.preventDefault();
  let username_input=document.querySelector("#username").value;
  let password_input=document.querySelector("#password").value;
  console.log(username_input,password_input);
  let data={
    username:username_input,
    password:password_input

  };
  console.log(data);

  let options={
    method:"POST",
    headers:{
      "Content-Type":"application/json; Charset=UTF-8",
    },
    body:JSON.stringify(data),
  };
  fetch("../phpfile/login.php",options)
  .then((response)=>response.json())
  .then((post_data)=>{
    console.log(post_data);
    if(post_data.success==true){
      if(post_data.user_status=="user"){
        userlogin(post_data.username);
        loginRetrieve();
        localStorage.setItem("User-name",post_data.username);
        localStorage.setItem("userstatus",post_data.user_status);
      }
      else{
        localStorage.setItem("User-name",post_data.username);
        localStorage.setItem("userstatus",post_data.user_status);
        window.location.href="../admin/admindashboard/admindashboard.php";
      }
    }
    else{
      document.querySelector("#username").value="";
      document.querySelector("#password").value="";

      let a=document.querySelector(".login-message");
      a.setAttribute("style","display:block;");
      setTimeout(() => {
        a.setAttribute("style","display:none;");
      }, 4000);
    }
  });
  // .catch((data)=>{
  //   console.log(data.message);
  // })
});

function userlogin(user_name){
  document.querySelector(".login-container").style.display="none";
  document.querySelector(".login-user").style.display="block";
  document.querySelector("#user-name").innerHTML=user_name;
  document.querySelector("#login").style.display="none";
  document.querySelector("#login").style.zIndex="1";
  document.querySelector("#logout").style.display="block";
  document.querySelector("#logout").style.zIndex="5";
  document.querySelector("#username").value="";
document.querySelector("#password").value="";
  console.log(user_name);
}

function logout(){
  document.querySelector("#login").style.display="block";
  document.querySelector("#login").style.zIndex="5";
  document.querySelector("#logout").style.display="none";
  document.querySelector("#logout").style.zIndex="1";
  document.querySelector(".login-user").style.display="none";
  localStorage.removeItem("userstatus")
  localStorage.removeItem("User-name");

}




//login button show and unshow
function show_hide(){
let show_password=document.querySelector('#show');
let hide_password=document.querySelector('#hide');
if(document.querySelector('#password').type=='password'){
  show_password.style.zIndex=5;
  hide_password.style.zIndex=-1;
  document.querySelector('#password').type="text";
}
else{
  show_password.style.zIndex=-1;
  hide_password.style.zIndex=5;
  document.querySelector('#password').type="password";
}
}

//for cross icon in login
function loginRetrieve(){
  document.querySelector('.maincontainer').classList.remove('active');
  document.querySelector('.login-container').style.display="none";
}
