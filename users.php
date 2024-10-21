<?php 
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>

<?php include_once('header.php') ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                    include_once("php/config.php");
                    $stmt = $conn->prepare("SELECT * FROM users WHERE unique_id = ?");
                    $stmt->bind_param("i", $_SESSION['unique_id']);
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
                    <img src="php/images/<?php echo $user['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $user['fname'] .' ' .$user['lname'] ?></span>
                        <p><?php echo $user['status'] ?></p>
                    </div>
                </div>
                <a href="" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">
                    Select a user to start chatting
                </span>
                <input type="text" placeholder="Enter name to search ..." name="" id="">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>



    <script src="javascript/users.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>