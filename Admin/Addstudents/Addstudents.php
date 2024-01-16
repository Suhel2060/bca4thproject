<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <?php include('C:\xampp\htdocs\bca4thproject\Admin\AdminHeader\AdminNavcss.php'); ?>
    <link rel="stylesheet" href="Addstudents.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Clicker+Script&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>
    <?php include('C:\xampp\htdocs\bca4thproject\Admin\AdminHeader\AdminNav.php'); ?>
    <div class="addstudent-container">
    <section id="studentadd-form">
        <h2>Add Student</h2>
        <form id="addStudentForm">
        <div class="addstudents-items">
                <label for="studentID">Username:</label>
                <input type="text" id="studentID" name="studentID" required>
            </div>
        <div class="addstudents-items">
                <label for="password">Password:</label>
                <input type="password" id="password" name="" required>
            </div>
            <div class="addstudents-items">
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" required>
            </div>
            <div class="addstudents-items">
                <label for="studentEmail">Email:</label>
                <input type="email" id="studentEmail" name="studentEmail" required>
            </div>
            <div class="addstudents-items">
                <label for="phoneNumber">Phone Number</label>
                <input type="number" id="phoneNumber" name="studentCourse" required>
            </div>
            <div class="addstudents-items">
                <label for="Image">Image</label>
                <input type="file" id="Image" name="studentCourse" required>
            </div>
            <div class="addstudents-items" id="Add-btn">
            <input type="submit" value="Add student" class="Addbooks-btn">
            <input type="button" value="Update Student" class="Addbooks-btn">
            </div>
        </form>
    </section>

    <section id="studentsList">

        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="studentsTableBody">
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="sachin.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="sachindra.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="hemraj.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
                <tr>
                    <td>22061021343</td>
                    <td>Rakesk Man shakya Maharjan</td>
                    <td  id="table-image"><img src="suhel.png" alt=""></td>
                    <td>maharjansohail222@gmail.com</td>
                    <td>2080-12-30</td>
                </tr>
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

</body>

</html>