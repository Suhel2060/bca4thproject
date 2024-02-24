function show_login(){
    document.querySelector("#username").value="";
    document.querySelector("#password").value="";
    document.querySelector('.login-container').style.display="inline-block";

    document.querySelector('.maincontainer').classList.toggle('active');
    document.querySelector('.login-container').style.zIndex=2;
    document.querySelector('.login-container').style.opacity=1;




}