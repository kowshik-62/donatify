<?php
    
    session_start();
    
    if (!isset($_SESSION["email"])) { 
        session_destroy();
        header("Location: login.html"); //redirects to login page if not logged in 
        
    }
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    
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

        $st = $conn->prepare('DELETE FROM registration WHERE email= ?');
        $st->bind_param('s', $email);
        $st->execute();

        $string= "DELETED Successfully kindly check donor table for further verfications";
        echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
        echo "<div align='center' class='buttons'><a  href='food.php' class='btn1'>Donor table</a></div>";
        exit();
        }else{
            $string= "Password Does not matches";
        echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
        echo "<div class='buttons' align='center'><a class='btn-1' href='donate.html #deletion'>Delete_Record</a></div>";
                               
        }
    }else{
        $string= "Email Does not matches";
        echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
        echo "<div class='buttons' align='center'><a class='btn-1' href='donate.html #deletion'>Delete_Record</a></div>";



    }
?>