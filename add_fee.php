<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare data for insertion
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    // Insert data into fees table
    $sql = "INSERT INTO fees (student_id, fee_amount, fee_date, status)
            VALUES ('$student_id', '$amount', '$date', 'Unpaid')";

    if ($conn->query($sql) === TRUE) {
        echo "Fee added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Fee Payment</title>
</head>
<body>
<h2>Add Fee Payment</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="student_id">Student ID:</label><br>
    <input type="text" id="student_id" name="student_id" required><br><br>
    <label for="amount">Amount:</label><br>
    <input type="text" id="amount" name="amount" required><br><br>
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" required><br><br>
    <input type="submit" value="Add Fee Payment">
</form>
<br>
<a href="index.php">Back to Home</a>
</body>
</html>
