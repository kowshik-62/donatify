<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
    $string= "Please Fill all the feilds.";
    echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
 echo "<div class='buttons' align='center'>
 <a class='btn-1' href='signup.html'>Signup</a>
</div>";
}

if (strlen($password)<8) {
  $string='Passwords have less than 8 characters.';
    echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
 echo "<div class='buttons' align='center'>
 <a class='btn-1' href='signup.html'>Signup</a>
</div>";
  exit();
}

if ($password !== $confirm_password) {
   $string= 'Passwords do not match.';
   echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
   echo "<div class='buttons' align='center'>
   <a class='btn-1' href='signup.html'>Singup</a>
  </div>";
  exit();
}
$conn = new mysqli('localhost:3306','root','kowshik', 'sys');
if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Failed to connect to database.'));
    exit();
}


 //insert into db


 $stm = $conn->prepare('SELECT * FROM user WHERE email = ?');
$stm->bind_param('s', $email);
$stm->execute();
$result = $stm->get_result();

if ($result->num_rows > 0) {
    $string= "Email already in use Signup with different Email";
    echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
 echo "<div class='buttons' align='center'> <a class='btn-1' href='signup.html'>Signup</a> </div>";
    exit();
}
                
 $sql = "INSERT INTO user (name,email, password) VALUES ('$name', '$email', '$password')";

 /*USE OF PREPARED STATEMENTS
 $stmt = mysqli_stmt_init($conn);
 $prepareStmt = mysqli_stmt_prepare($stmt, $sql);*/


 $sq=mysqli_query($conn,$sql);
 if($sq){

     /*mysqli_stmt_bind_param($stmt, "sss",$name,$email, $password); //sss-> 3 strings
     mysqli_stmt_execute($stmt);*/

     $string= "Registered Successfully You can login Now.";
        echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
     echo "<div class='buttons' align='center'><a class='btn-1' href='login.html'>LogIn</a></div>";

 
 }
 else{
    $string= "SomeThing went wrong Signup again";
    echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
 echo "<div class='buttons' align='center'><a class='btn-1' href='signup.html'>Signup</a></div>";

 }

?>