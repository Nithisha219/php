<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "college_fee_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students and their fees
$sql = "SELECT students.student_id, student_name, student_email, student_phone, 
               fee_id, fee_amount, fee_date, status 
        FROM students 
        LEFT JOIN fees ON students.student_id = fees.student_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <html>
    <head>
        <title>College Fee Management System</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
    <h2>College Fee Management System</h2>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Fee ID</th>
            <th>Fee Amount</th>
            <th>Fee Date</th>
            <th>Status</th>
        </tr>
        <?php
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["student_id"]."</td>";
            echo "<td>".$row["student_name"]."</td>";
            echo "<td>".$row["student_email"]."</td>";
            echo "<td>".$row["student_phone"]."</td>";
            echo "<td>".$row["fee_id"]."</td>";
            echo "<td>".$row["fee_amount"]."</td>";
            echo "<td>".$row["fee_date"]."</td>";
            echo "<td>".$row["status"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="add_student.php">Add New Student</a><br>
    <a href="add_fee.php">Add Fee Payment</a>
    </body>
    </html>
    <?php
} else {
    echo "No students found";
}
$conn->close();
?>
