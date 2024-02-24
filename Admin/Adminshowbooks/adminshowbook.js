var flag = 0;
var I;
function showdetails(event) {
        var x = event.pageX;
         var y = event.pageY;
         var x1=x+40;
         var y1=y-230;
         console.log(x);
         console.log(y);

    if(flag==1){
        I.style.display="inline-block";
    }
    if (flag == 0) {
        document.querySelector('.book-details-container').insertAdjacentHTML('afterend', " <div class='hover-container'> <div class='image'><img src='harrypotter.png' alt=''></div><h2>Bookname</h2><p class='main-book-details'>catagory</p><p class='main-book-details'>Author Name</p><p class='main-book-details'>Publication Name</p><p class='hover-book-description'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus corporis quae fugit? Nesciunt, iste blanditiis. Minus, suscipit quidem! Minus molestiae doloribus quidem, dolorum aliquam officiis. Quos id enim omnis aut suscipit vero dignissimos in exercitationem beatae labore officia molestiae, tempore soluta consequatur, illum unde facilis culpa eos. Dolorum, id libero.</p></div>");
    }
    I = document.querySelector('.hover-container');
    I.style.top = `${y1}px`;
    I.style.left = `${x1}px`;
    flag = 1;

}
function hidedetails(){
    I.style.display="none";
}
