
<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    
    $conn = new mysqli('localhost:3306', 'root', 'kowshik', 'sys');

    
    if($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    
    $stmt = $conn->prepare('SELECT name, email, password FROM user WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();

    
    $result = $stmt->get_result();

    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if($password==$user['password']){
            
                    $_SESSION["email"] = $user['email']; 
                   include("index.html");
                    die();
            
            
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";  
            exit();
        }
    } else {
         echo "<div class='alert alert-danger'>Password or email does not match</div>";
         exit();
    }
    /*if(isset($_SESSION["email"])) {
        header("Location:index.html");
        }*/

    
    $stmt->close();
    $conn->close();
}
?>
