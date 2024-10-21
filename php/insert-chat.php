<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_POST['outgoing_id'] ?? '';
    $incoming_id = $_POST['incoming_id'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (?, ?, ?)");

        // Bind parameters and execute the query
        $stmt->bind_param("iis", $incoming_id, $outgoing_id, $message);

        if ($stmt->execute()) {
            echo "Message sent successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }else{
        echo "Message cannot be empty";
    }
} else {
    header("../login.php");
}
?>