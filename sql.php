-- Students table
CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    student_email VARCHAR(100),
    student_phone VARCHAR(20)
);

-- Fees table
CREATE TABLE fees (
    fee_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    fee_amount DECIMAL(10,2) NOT NULL,
    fee_date DATE NOT NULL,
    status ENUM('Paid', 'Unpaid') NOT NULL DEFAULT 'Unpaid',
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);
