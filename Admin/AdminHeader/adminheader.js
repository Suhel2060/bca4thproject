
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
            window.location.href="../../user/usernavbar.php";
            }
        })

      
      }
