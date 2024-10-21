<?php
session_start();

// Include the configuration file for database connection
include_once("config.php");

try {
    $outgoing_id = $_SESSION['unique_id'];
    // Prepare the SQL query to select all users
    $stmt = $conn->prepare("SELECT * FROM users WHERE NOT unique_id = ?");
    $stmt->bind_param("i", $outgoing_id);

    // Execute the query
    if ($stmt->execute()) {
        // Fetch the result set
        $result = $stmt->get_result();
        $output = "";

        // Check if there are users in the database
        if ($result->num_rows === 0) {
            $output .= "No users available";
        } else {
            // Loop through each user and generate the HTML output
            include("data.php");
        }

        // Output the result
        echo $output;
    } else {
        // Handle query execution error
        echo "Failed to execute query: " . $stmt->error;
    }
} catch (Exception $e) {
    // Handle any other exceptions
    echo "Error: " . $e->getMessage();
}

// Close the statement and database connection
// $stmt->close();
// $conn->close();
?>
