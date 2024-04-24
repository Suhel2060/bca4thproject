window.addEventListener("load",()=>{
  let status=localStorage.getItem("userstatus");
  let username=localStorage.getItem("User-name");
  if(status=="user"){
    // document.querySelector(".login-container").style.display="none";
    document.querySelector(".login-user").style.display="block";
    document.querySelector("#user-name").innerHTML=username;
    document.querySelector("#login").style.display="none";
    document.querySelector("#login").style.zIndex="1";
    document.querySelector("#logout").style.display="block";
    document.querySelector("#logout").style.zIndex="5";
  }
  else{
    document.querySelector("#login").style.display="block";
    document.querySelector("#login").style.zIndex="5";
    document.querySelector("#logout").style.display="none";
    document.querySelector("#logout").style.zIndex="1";
    document.querySelector(".login-user").style.display="none";
  }
  

})



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
  fetch("../../phpfile/login.php",options)
  .then((response)=>response.json())
  .then((post_data)=>{
    console.log(post_data);
    if(post_data.success==true){
      if(post_data.user_status=="user"){
        userlogin(post_data.username);
        loginRetrieve();
        localStorage.setItem("User-name",post_data.username);
        localStorage.setItem("userstatus",post_data.user_status);
        if(window.location.pathname=="/BCA4THPROJECT/user/userissuebook/userissuebook.php"){
          document.querySelector('.body-container').style.border="none"
          fetchUserIssuedBooks();
        }
  
      }
      else{
        document.querySelector("#username").value='';
        document.querySelector("#password").value='';
        localStorage.setItem("User-name",post_data.username);
        localStorage.setItem("userstatus",post_data.user_status);
        window.location.href="../../admin/admindashboard/admindashboard.php";
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
  document.querySelector("#login-form").style.opacity="0";
  document.querySelector(".login-user").style.display="block";
  document.querySelector("#user-name").innerHTML=user_name;
  document.querySelector("#login").style.display="none";
  document.querySelector("#login").style.zIndex="1";
  document.querySelector("#logout").style.display="block";
  document.querySelector("#logout").style.zIndex="5";
  document.querySelector("#username").value="";
document.querySelector("#password").value="";
  console.log(user_name);
  // if(window.location.pathname=='')

}

function logout(){
  let logout={
   "logout":"true"
  }
  fetch("../../phpfile/logout.php",{
    method:"POST",
    headers:{
      "Content-Type":"application/json; Charset=UTF-8",
    },
    body:JSON.stringify(logout),
  }).then(response => response.json())
  .then((data)=>{
    if(data.logout_status){
      document.querySelector("#login").style.display="block";
      document.querySelector("#login").style.zIndex="5";
      document.querySelector("#logout").style.display="none";
      document.querySelector("#logout").style.zIndex="1";
      document.querySelector(".login-user").style.display="none";
      localStorage.removeItem("userstatus");
      localStorage.removeItem("User-name");
      if(window.location.pathname=="/BCA4THPROJECT/user/userissuebook/userissuebook.php"){
        clearissuedbooks();
        show_login();
      }
    }
  })


}




//login button show and unshow
function show_hide(t){
  console.log(t.parentElement)
let show_password=t.parentElement.children[1];
let hide_password=t.parentElement.children[2];
if(t.parentElement.children[0].type=='password'){
  show_password.style.zIndex=5;
  hide_password.style.zIndex=-1;
  t.parentElement.children[0].type="text";
}
else{
  show_password.style.zIndex=-1;
  hide_password.style.zIndex=5;
  t.parentElement.children[0].type="password";
}
}

//for cross icon in login
function loginRetrieve(){
  document.querySelector('.body-container').classList.remove('active');
  document.querySelector('.login-container').style.zIndex=-5;
  document.querySelector('.login-container').style.opacity=0;
  document.querySelector('#forgot-password').style.opacity=0;
  document.querySelector('#login-form').style.zIndex=-5;
  document.querySelector('#forgot-password').style.zIndex=-10;
  document.querySelector('#forgot-username').value="";
  document.querySelector('#forgot-password-input').value="";
  document.querySelector('#cpassword').value="";
  document.querySelector("#username").value='';
  document.querySelector("#password").value='';
// setTimeout(() => {
//   document.querySelectorAll('.login-container').forEach((html)=>{
//     html.style.display="none"
//   });

// }, 800);}
}


  function forgotpasswordclick(){
    document.querySelector('#login-form').style.zIndex=-10;
    document.querySelector('#forgot-password').style.zIndex=30;
    document.querySelector('#forgot-password').style.opacity=1;

  }
document.querySelector('#forgot-form').addEventListener("submit",(e)=>{
    e.preventDefault();
    let username=document.querySelector('#forgot-username').value;
    let password=document.querySelector('#forgot-password-input').value;
    let cpassword=document.querySelector('#cpassword').value;
    if(password===cpassword){
      data={
        username:username,
        password:password
      }
      fetch("../../phpfile/passwordchange.php",{
        method:"POST",
        headers:{
          "Content-Type":"application/json; Charset=UTF-8",
        },
        body:JSON.stringify(data),
      }).then(response => response.json())
      .then((data)=>{
        document.querySelector('#login-form').style.zIndex=-5;
        document.querySelector('#forgot-password').style.zIndex=-10;
        document.querySelector('#forgot-username').value="";
        document.querySelector('#forgot-password-input').value="";
        document.querySelector('#cpassword').value="";

      })
    }
    else{
      alert('psd not correct')
    }
  })
