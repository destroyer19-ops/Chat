
<?php 
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once('header.php') ?>


<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php
                    include_once("php/config.php");
                    $user_id = (int) $_GET['user_id']; 
                    $stmt = $conn->prepare("SELECT * FROM users WHERE unique_id = ?");
                    $stmt->bind_param("i", $user_id);
                    if($stmt->execute()){
                        $result = $stmt->get_result();
                        if($result->num_rows > 0){
                            $user = $result->fetch_assoc();
                        } else{
                            echo "No user found";
                        }
                    } else {
                        echo "failed to execute query: " .$stmt->error;
                    }
                ?>
                <div class="content">
                    <a href="users.php" class="back-icon">
                        <i class="fas fa-arrow-left">""</i></a>
                    <img src="php/images/<?php echo $user['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $user['fname'] .' ' .$user['lname'] ?></span>
                        <p><?php echo $user['status'] ?></p>
                    </div>
                </div>
            </header>
            <div class="chat-box">
                
                
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" id="" class="input-field" placeholder="Type a message here ....">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>



<script src="javascript/chat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>