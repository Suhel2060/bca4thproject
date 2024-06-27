window.addEventListener("load",()=>{
  setTimeout(() => {
    let userstatus=localStorage.getItem("userstatus");
    let user_name=localStorage.getItem("User-name")
  console.log(  localStorage.getItem("userstatus"));
    console.log(localStorage.getItem("User-name"));
    if(user_name==null||userstatus==null){
        window.location.href="../../user/userdashboard/userdashboard.php";
    }
  })

})
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
            localStorage.removeItem("userstatus");
            localStorage.removeItem("User-name");
            // function preventback(){
            //   window.history.forward();
            //   setTimeout(preventback,0);
            // }
            // preventback();
            window.location.href="../../user/userdashboard/userdashboard.php";
            }
        })

      
      }
