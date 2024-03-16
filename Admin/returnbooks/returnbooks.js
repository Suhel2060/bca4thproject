window.addEventListener("load", () => {
    fetch("../../phpfile/returnbooks.php")
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            for(let i=0;i<data.length;i++){
                let studentdata=`<tr>
                <td>${data[i].username}</td>
                <td>${data[i].studentname}</td>
                <td>${data[i].bookname}</td>
                <td>${data[i].issueddate}</td>
                <td>${data[i].returndate}</td>
                <td><button onclick=removedata()>Remove</button><button onclick=removedata()>Returned</button></td>
                
            </tr>`;
                document.querySelector("#studentsTableBody").insertAdjacentHTML("beforeend",studentdata)
    
            }
        })
    })