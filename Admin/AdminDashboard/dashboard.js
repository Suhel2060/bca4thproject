
window.addEventListener("load", () => {
    fetch("../../phpfile/dashboard.php")
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    });
});