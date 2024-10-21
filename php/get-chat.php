<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_POST['outgoing_id'] ?? '';
    $incoming_id = $_POST['incoming_id'] ?? '';


   

        $stmt = $conn->prepare(
            "SELECT * FROM messages 
                 LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                 WHERE (outgoing_msg_id = ?  AND incoming_msg_id = ?) 
                 OR (outgoing_msg_id = ? AND incoming_msg_id = ?) 
                 ORDER BY msg_id"
        );
        // Bind parameters and execute the query
        $stmt->bind_param("iiii", $outgoing_id, $incoming_id, $incoming_id, $outgoing_id);


        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $output = '';
                while ($row = $result->fetch_assoc()) {
                    if ($row['incoming_msg_id'] === $incoming_id) {
                        $output .= '<div class="chat outgoing">
                                        <div class="details">
                                            <p> ' . $row['msg'] . '</p>
                                        </div>
                                    </div>';
                    } else {
                        $output .= '
                        
                                <div class="chat incoming">
                                                    <img src="php/images/'. $row['img'].' " alt="">

                                    <div class="detials">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                    }
                }
                echo $output;
            }
            // echo "Message sent successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
   
} else {
    header("../login.php");
}
?>