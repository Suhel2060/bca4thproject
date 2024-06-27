function logout(status){
    switch(status){
case "user":
    data={
        "data" => "logout"
    }
    }

    fetch("../phpfile/logout.js",{
        method:"POST",
        body:JSON.stringify();
    });

}