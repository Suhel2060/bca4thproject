<?php
// session_start();
// if(!(isset($_SESSION["loginstatus"])&&isset($_SESSION["adminusername"])&&isset($_SESSION["userstatus"]))){
// header("Location:../../user/usernavbar.php");
// }
// else{
//     if($_SESSION["userstatus"]=="user"){
//         header("Location:../../../user/usernavbar.php");
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <?php include('../adminheader/adminnavcss.php'); ?>
    <link rel="stylesheet" href="returnbooks.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <script src="../../admin/adminheader/adminheader.js"></script>


</head>

<body>
    <?php include('../adminHeader/adminNav.php'); ?>
    <div class="addstudent-container">
    <section id="studentsList">

        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Student Name</th>
                    <th>Bookname</th>
                    <th>Issued books</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody id="studentsTableBody">
            </tbody>
        </table>
    </section>
    </div>
    <!-- <script>
    function addStudent() {
        var studentName = document.getElementById("studentName").value;
        var studentID = document.getElementById("studentID").value;
        var studentEmail = document.getElementById("studentEmail").value;
        var studentCourse = document.getElementById("studentCourse").value;

        var tableRow = document.createElement("tr");
        
        tableRow.innerHTML = `<td>${studentName}</td><td>${studentID}</td><td><strong>${studentEmail}</strong></td><td>${studentCourse}</td>`;

        var studentsTableBody = document.getElementById("studentsTableBody");
        studentsTableBody.appendChild(tableRow);

        document.getElementById("studentName").value = "";
        document.getElementById("studentID").value = "";
        document.getElementById("studentEmail").value = "";
        document.getElementById("studentCourse").value = "";
    }
</script> -->
    <script src="../returnbooks/returnbooks.js"></script>
</body>

</html>