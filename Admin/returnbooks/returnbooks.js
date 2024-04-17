window.addEventListener("load", () => {
    fetch("../../phpfile/returnbooks.php")
        .then(response => response.json())
        .then((data) => {
            // console.log(data);
            for(let i=0;i<data.length;i++){
                let studentdata=`<tr>
                <td>${data[i].username}</td>
                <td>${data[i].individual_book_id}</td>
                <td>${data[i].bookname}</td>
                <td>${data[i].book_issue_status}</td>
                <td>${data[i].issueddate}</td>
                <td>${data[i].returndate}</td>
                <td id='removebtn'><button onclick=removedata(this)>Remove</button></td>
                <td id='returnbtn'><button onclick=returnbook(this)>Returned</button></td>
                
            </tr>`;
                document.querySelector("#studentsTableBody").insertAdjacentHTML("beforeend",studentdata)
    
            }
        })
    })


    function removedata(t){
        let username=t.parentElement.parentElement.children[0].innerHTML;
        let bookid=t.parentElement.parentElement.children[1].innerHTML;
        let bookname=t.parentElement.parentElement.children[2].innerHTML;
        let data={
            "username":username,
            "bookname":bookname,
            "bookid":bookid
        }
        let check=confirm("Do you wabt to remove the data");
        if(check){
            fetch("../../phpfile/returnbookremove.php",{
                method:"POST",
                header:{
                    "Content-Type": "application/json; Charset=UTf-8"
                },
                body:JSON.stringify(data),
            })
            .then(response=>response.json())
            .then((data)=>{
                console.log(data);
                if(data.remove){
                    let parent=t.parentElement.parentElement;
                    parent.setAttribute("style","display:none");
                    alert("data is deleted");
                    
                }
                else{
                    alert("data is not deleted");
                }
            })
        }
        
       
    }

    function returnbook(t){
        let username=t.parentElement.parentElement.children[0].innerHTML;
        let bookid=t.parentElement.parentElement.children[1].innerHTML;
        let bookname =t.parentElement.parentElement.children[2].innerHTML;
        let data={
            "username":username,
            "bookname":bookname,
            "bookid":bookid
        }
        let check=confirm("Do you wabt to return the book");
        if(check){
            fetch("../../phpfile/userreturnbook.php",{
                method:"POST",
                header:{
                    "Content-Type": "application/json; Charset=UTf-8"
                },
                body:JSON.stringify(data),
            })
            .then((response)=>{
                if(!response.ok){
                    throw new Error("Connection failed");
                }
                    response.json()})
            .then((data)=>{
                console.log(data);
        
                    let parent=t.parentElement.parentElement;
                    parent.setAttribute("style","display:none");
                    alert("book is returned");
                    
            })
            .catch(error=>{
                console.log(error);
            })
        }
        
    }