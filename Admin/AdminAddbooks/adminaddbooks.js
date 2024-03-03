function insertbook(){

    let ISBN=document.querySelector('#ISBN').value;
    let bookname=document.querySelector('#BookName').value;
    let authorname=document.querySelector('#AuthorName').value;
    let tag_data=document.querySelector('#Tags').value;
    // let tag=tag_data.split(",");
    let catagories=document.querySelector('#Catagories').value;
    let image=document.querySelector('#image');
    let description=document.querySelector('#Description').value;
    let quantity=document.querySelector('#Quantity').value;
    const form_data=new FormData();
    form_data.append("image",image.files[0]);
    form_data.append("ISBN",ISBN);
    form_data.append("bookname",bookname);
    form_data.append("authorname",authorname);
    form_data.append("tags",tag_data);
    form_data.append("description",description);
    form_data.append("Catagories",catagories);
    form_data.append("quantity",quantity);
    fetch("../../phpfile/adminaddbooks.php",{
        method:"POST",
        body: form_data,
    })
    .then((response) => response.json())
    .then((data)=>{
        console.log(data);
        if(data.status=="success"){
            document.querySelector(".message").innerHTML="Data insert successful"
            document.querySelector(".message").classList.add("success");

        }
    })

}