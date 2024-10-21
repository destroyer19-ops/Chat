<?php
session_start();
include_once("config.php");

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent XSS attacks
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Check if all required fields are filled
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

        // Validate email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Check if email already exists in the database
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "The email $email is already registered.";
            } else {
                // Check if user uploaded an image
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    // Validate image type and extension
                    $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $allowed_extensions = ['png', 'jpg', 'jpeg'];

                    if (in_array($img_extension, $allowed_extensions)) {
                        // Check image size (2MB max)
                        if ($_FILES['image']['size'] <= 2097152) {
                            // Generate a unique name for the image
                            $new_img_name = time() . "_" . uniqid() . "." . $img_extension;
                            $upload_dir = "images/";
                            $img_path = $upload_dir . $new_img_name;

                            // Move uploaded file to the images directory
                            if (move_uploaded_file($tmp_name, $img_path)) {
                                // Hash the password
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                
                                // Set user status and create a random unique user ID
                                $status = "Active now";
                                $random_id = rand(time(), 10000000);

                                // Insert user data into the database
                                $stmt = $conn->prepare("INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("issssss", $random_id, $fname, $lname, $email, $hashed_password, $new_img_name, $status);

                                if ($stmt->execute()) {
                                    // Set session variable after successful registration
                                    $_SESSION['unique_id'] = $random_id;
                                    echo "Registration successful!";
                                } else {
                                    echo "Error: Could not insert user data.";
                                }
                            } else {
                                echo "Failed to upload the image.";
                            }
                        } else {
                            echo "Image size exceeds 2MB.";
                        }
                    } else {
                        echo "Invalid file type. Only PNG, JPG, and JPEG are allowed.";
                    }
                } else {
                    echo "Please select an image to upload.";
                }
            }
            $stmt->close();
        } else {
            echo "$email is not a valid email address.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
