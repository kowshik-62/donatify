<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["email"])) { 
  session_destroy();
    header("Location: home.html"); //redirects to login page if not logged in 
    exit();
    
}

    $fnam = $_POST['fnam'];
    $lnam = $_POST['lnam'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ftype= $_POST['ftype'];
    $fq = $_POST['fq'];
    $fQun = $_POST['fQun'];
    $loc = $_POST['loc'];
    $date = $_POST['date'];
    $txtarea = $_POST['txtarea'];


    $conn =mysqli_connect("localhost:3306", "root","kowshik", "sys"); 
    if ($conn -> connect_error) {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
    }
    else echo "hi";
    
    


    $stm = $conn->prepare('SELECT * FROM registration WHERE email = ?');
    $stm->bind_param('s', $email);
    $stm->execute();
    $result = $stm->get_result();
    
    if ($result->num_rows > 0) {
        $string= "This Email already donated if you want to donate new food ,you want to delete old record (or) if you want to update donation details you want to delete old record and register again";
        echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
     echo "<div class='buttons' align='center'>
     <a class='btn-1' href='donate.html'>donate</a>
    </div>";
        exit();
    }





    $sql=mysqli_query($conn,"insert into registration(fnam,lnam,email,phone,ftype,fq,fQun,loc,date,txtarea) values('$fnam','$lnam','$email','$phone','$ftype','$fq','$fQun','$loc','$date','$txtarea')");
    



                    
 /*$sql = "insert into registration(fnam,lnam,email,phone,ftype,fq,fQun,loc,date,txtarea) values('$fnam','$lnam','$email','$phone','$ftype','$fq','$fQun','$loc','$date','$txtarea')";

 //USE OF PREPARED STATEMENTS
 $stmt = mysqli_stmt_init($conn);
 $prepareStmt = mysqli_stmt_prepare($stmt, $sql);*/


    if($sql)
    {
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
         
          $foo = "bar";
          $string= "Inserted Success fully kindly check your filled details in donor table:";
          
          echo '<span style="font-size: 50px; font-family:Poppins, sans-serif;"> ' . $string;
          echo "<div class='buttons' align='center'>
<a class='btn-1' href='food.php'>Donor table</a></div>";
          
    }
    else
    {
      echo "Not Inserted".mysqli_error($conn);
    }
    
    /*

    <?php
error_reporting(0);
    $donarname = $_POST['donarname'];
    $donaremail = $_POST['donaremail'];
    $donarloc = $_POST['donarloc'];
    $donardetails = $_POST['donardetails'];
    $conn =mysqli_connect("localhost", "root","", "mysql"); 
    $ans=mysqli_query($conn,"insert into registration(donarname, donaremail, donarloc, donardetails) values('$donarname','$donaremail','$donarloc','$donardetails')");
    if($ans){
          echo "Inserted";
    }else{
      "Not Inserted">mysqli_error($conn);
    }
     */
  ?>