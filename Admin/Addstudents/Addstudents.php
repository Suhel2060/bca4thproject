<?php
session_start();
if(!(isset($_SESSION["loginstatus"])&&isset($_SESSION["admin_username"])&&isset($_SESSION["user_status"]))){
    header("Location:../../user/userdashboard/userdashboard.php");}
else{
    if($_SESSION["user_status"]=="user"){
        header("Location:../../user/userdashboard/userdashboard.php");    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <?php include('../adminheader/adminnavcss.php'); ?>
    <link rel="stylesheet" href="addstudents.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6855e15ae1.js" crossorigin="anonymous"></script>
    <script src="../../admin/adminheader/adminheader.js"></script>


</head>

<body>
    <?php require('../adminheader/adminnav.php'); ?>
    <div class="addstudent-container">
        <div class="formcontainer">
            <form id="studentadd-form" >
                <h2>Add Student</h2>


                <div id="addStudentForm">
                    <div class="addstudents-items addstudent-data">
                        <label for="studentID">Username:</label>
                        <input type="text" id="studentID" name="studentID" required onkeyup="checkdataentry(this)" minlength="5">
                    </div>
                    <div class="addstudents-items addstudent-data">
                        <label for="password">Password:</label>
                        <input type="text" id="password" name="" required onkeyup="checkdataentry(this)" minlength="8">
                    </div>
                    <div class="addstudents-items addstudent-data">
                        <label for="studentName">Student Name:</label>
                        <input type="text" id="studentName" name="studentName" required onkeyup="checkdataentry(this)" minlength="3">
                    </div>
                    <div class="addstudents-items addstudent-data">
                        <label for="studentEmail">Email:</label>
                        <input type="email" id="studentEmail" name="studentEmail" required onkeyup="checkdataentry(this)">
                    </div>
                    <div class="addstudents-items addstudent-data">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" required onkeyup="checkdataentry(this)" pattern="[9][5-8][0-9]{8}" maxlength="10">
                    </div>
                    <div class="addstudents-items addstudent-data">
                        <label for="Image">Image</label>
                        <input type="file" id="Image" name="Image" required>
                    </div>
                    <div class="addstudents-items" id="Add-btn">
                        <input type="submit" value="Addstudent" class="Addstudent-btn" id="Addbtn">
                    </div>
                    <div class="addstudents-items" id="message">
                        <span id="insert-message"></span>
                    </div>
                </div>
            </form>
            <form id="updateStudentForm">
                <h2>update Student</h2>


                <div id="addStudentForm">
                    <div class="addstudents-items updatestudent-data">
                        <label for="studentID">Username:</label>
                        <input type="text" id="updatestudentID" name="studentID" required onkeyup="checkdataentry(this)"  minlength="5">
                    </div>
                    <div class="addstudents-items updatestudent-data">
                        <label for="studentName">Student Name:</label>
                        <input type="text" id="updatestudentName" name="studentName" required onkeyup="checkdataentry(this)" minlength="8">
                    </div>
                    <div class="addstudents-items updatestudent-data">
                        <label for="studentEmail">Email:</label>
                        <input type="email" id="updatestudentEmail" name="studentEmail" required onkeyup="checkdataentry(this)">
                    </div>
                    <div class="addstudents-items updatestudent-data">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" id="updatephoneNumber" name="phoneNumber" required onkeyup="checkdataentry(this)" pattern="[9][5-8][0-9]{8}" maxlength="10">
                    </div>
                    <div class="addstudents-items updatestudent-data">
                        <label for="Image">Image</label>
                        <input type="file" id="updateImage" name="Image">
                    </div>
                    <div class="addstudents-items" id="update-btn">
                        <input type="submit" value="UpdateStudent" class="updatestudent-btn" id="updatebtn">
                        <input type="button" value="Cancel" class="Addstudent-btn" id="cancelbtn">
                    </div>
                    <div class="addstudents-items" id="message">
                        <span id="insert-message"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <section id="studentsList">

        <h2>Student List</h2>
        <div class="search">
            <input type="text" class="search_input" placeholder="search users" onkeyup="searchdata(event)">
            <i class="fa-solid fa-magnifying-glass"></i>
            <li class="searchlist" style="display: none;background-color: #b0b0df;"></li>
            <!-- <ol class="searchdatalist" type="none">
                
            </ol> -->


        </div>
        <table>
            <thead>
                <tr class="tablehead">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Modify</th>
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
    <script src="../addstudents/addstudents.js"></script>
</body>

</html>