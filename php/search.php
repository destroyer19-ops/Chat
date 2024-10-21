<?php
    include_once("config.php");
    session_start();
    $outgoing_id = $_SESSION['unique_id'];
    try {
        if(isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])){
            $searchTerm = '%' .trim($_POST['searchTerm']). '%';
            $output = "";
            $stmt = $conn->prepare('SELECT * FROM users WHERE fname LIKE ? OR lname LIKE ?');
            $stmt->bind_param("ss", $searchTerm, $searchTerm);

            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    // while ($row = $result->fetch_assoc()) {
                    //     echo htmlspecialchars($row['fname'], ENT_QUOTES, 'UTF-8');
                    //     echo htmlspecialchars($row['lname'], ENT_QUOTES, 'UTF-8');
                    // }
                    include("data.php");
                    echo $output;
                }else{
                    echo "No results found";
                }
            } else{
                echo "Error occured when executing query " .$stmt->error;
            }
            // $stmt->close();
        } else{
            echo "Search term is empty";
        }
    } catch (Exception $e) {
        echo "An Error Occured" .$e->getMessage();
    }
    $conn->close();
?>