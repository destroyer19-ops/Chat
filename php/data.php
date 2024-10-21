<?php
// Start session and include necessary files
// session_start();
include_once("config.php");

// Initialize output variable
$output = "";

// Fetch all users (assumed that $result is already initialized)
while ($row = $result->fetch_assoc()) {
    // Prepare a query to fetch the latest message between the logged-in user and this user
    $stmt = $conn->prepare(
        "SELECT msg FROM messages 
         WHERE (incoming_msg_id = ? AND outgoing_msg_id = ?) 
         OR (outgoing_msg_id = ? AND incoming_msg_id = ?) 
         ORDER BY msg_id DESC LIMIT 1"
    );
    
    // Bind parameters
    $stmt->bind_param("iiii", $row['unique_id'], $outgoing_id, $outgoing_id, $row['unique_id']);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $row2 = $stmt->get_result();
    
    // Fetch the latest message
    $lastMessage = "No message available"; // Default message if no result is found
    if ($row2->num_rows > 0) {
        $messageRow = $row2->fetch_assoc();
        // Sanitize the message content to prevent XSS
        $lastMessage = htmlspecialchars($messageRow['msg'], ENT_QUOTES, 'UTF-8');
        if (strlen($lastMessage) > 30) {
            // Cut the message and add ellipsis
            $lastMessage = substr($lastMessage, 0, 30) . '...';
        }
        // ($outgoing_id == $messageRow['outgoing_msg_id']) ? $you = "You: " : $you = "";

    }

    // Sanitize user information to prevent XSS
    $firstName = htmlspecialchars($row['fname'], ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($row['lname'], ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($row['img'], ENT_QUOTES, 'UTF-8');

    // Append the user block to the output
    $output .= '
        <a href="chat.php?user_id=' . $row['unique_id'] . '">
            <div class="content">
                <img src="php/images/' . $image . '" alt="User Image">
                <div class="details">
                    <span>' . $firstName . ' ' . $lastName . '</span>
                    <p>' . $lastMessage . '</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>';
    
    // Close the statement after processing the current user
    $stmt->close();
}

// Output the result
echo $output;
?>
