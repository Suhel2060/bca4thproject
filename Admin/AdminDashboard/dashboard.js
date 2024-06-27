
window.addEventListener("load", () => {
    fetch("../../phpfile/dashboard.php")
    .then((response) => response.json())
    .then((data) => {
        let body=document.querySelectorAll('.dashboard-data');
        body[0].innerHTML=data.users
        body[1].innerHTML=data.total
        body[2].innerHTML=data.author
        body[3].innerHTML=data.issue
        body[4].innerHTML=data.return
        console.log(data)

    });
});