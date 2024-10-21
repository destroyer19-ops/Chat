<?php
session_start();
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Check if email and password are not empty
    if (!empty($email) && !empty($password)) {
        // Validate email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Prepare the SQL statement
            $stmt = $conn->prepare("SELECT unique_id, password FROM users WHERE email = ?");
            if ($stmt === false) {
                echo "Error preparing statement: " . $conn->error;
                exit();
            }

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            // Check if user exists
            if ($stmt->num_rows > 0) {
                // Fetch associated data
                $stmt->bind_result($unique_id, $hashed_password);
                $stmt->fetch();

                // Verify password
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['unique_id'] = $unique_id;  // Set session variable
                    echo "success";
                } else {
                    echo "Invalid credentials";
                }
            } else {
                echo "No account found with this email.";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Invalid email format.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
