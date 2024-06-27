let icon = document.querySelector('aside');
let section = document.querySelector('section');
let list = document.getElementById('list');
let cross = document.getElementById('cross');
let i = document.querySelector('i');

function show_login(){
    document.querySelector("#username").value="";
    document.querySelector("#password").value="";
    // document.querySelector('.login-container').style.display="inline-block";

    document.querySelector('.body-container').classList.toggle('active');
    document.querySelector('.login-container').style.zIndex=15;
    document.querySelector('.login-container').style.opacity=1;
    document.querySelector('#login-form').style.opacity=1;
    // document.querySelector('.login-container').style.top=`${window.innerWidth/2}px`;
    // document.querySelector('.login-container').style.left=`${window.innerHeight/2}px`;
    // console.log(window.innerHeight/2)
    console.log(window.location.pathname);
    if(window.location.pathname=="/BCA4THPROJECT/user/userissuebook/userissuebook.php"){
        if(localStorage.getItem('User-name')==null){

document.querySelector('#login-cross').setAttribute("style","opacity:0");
        }
        else{
            document.querySelector('#login-cross').setAttribute("style","opacity:1");

        }
    }else{
        document.querySelector('#login-cross').setAttribute("style","opacity:1");

    }






}


function shownavbar() {

    setTimeout(() => {
        icon.classList.toggle('showhidenavbar');
        console.log(icon.classList.contains('showhidenavbar'));
        if (icon.classList.contains('showhidenavbar')) {
            document.querySelector('aside').style.display='block';
            list.style.opacity='0';
            cross.style.opacity='1';
            document.querySelector('section').style.zIndex='-5';
            document.querySelector('aside').style.zIndex='5';
            section.setAttribute('style', "width:99%;margin-left:15px;");

        } else {
            list.style.opacity='1';
            cross.style.opacity='0';
            document.querySelector('section').style.zIndex='5';
            document.querySelector('aside').style.zIndex='-5';
            setTimeout(() => {
                document.querySelector('aside').style.display='none';

            },200);
            // section.setAttribute('style',"width:80%");
            // section.setAttribute('style', "width:99%;margin-left:15px;");
        }
    }, 100);
}
window.addEventListener('load',()=>{
    document.title='Library Management - User'
})


function navsearchbooks(e){
    if(e.key=="Enter"){
      let bookdata= document.getElementById('navbarbooksearch').value;
      localStorage.setItem('bookdata',bookdata);
      window.location.pathname="/BCA4THPROJECT/user/usersearchbook/usersearchbook.php"
    }

}

function nav_logo(){
    console.log( window.location.pathname);
    console.log("hello")
    if( !(window.location.pathname=="/BCA4THPROJECT/user/userdashboard/userdashboard.php"))
    window.location.assign("../userdashboard/userdashboard.php");
}