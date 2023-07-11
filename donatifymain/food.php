<?php
require_once('db.php');
$s = "SELECT * FROM registration";
$result = mysqli_query($con,$s);


session_start();
if (!isset($_SESSION["email"])) { 
  session_destroy();
    header("Location: home.html"); //redirects to login page if not logged in 
    
}


    

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONATIFY-RECIVE
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   
    </head>
    <body> 
    <div class="fixed-top">
    <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="#home">DONATIFY</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="donate.html" >Donate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="food.php">Recieve</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="donate.html #deletion">Delete_Record</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html #mission-id">Missions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html%20#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html%20#about">Feedback</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="cont-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <p>Connects food <strong> Donor & Receiver</strong></p>
                    </div>
                    <div class="col-lg-6">
                        <div class="social">
                            <a href="#"><img src="img/icons/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="img/icons/instagram.png" alt="inatagram"></a>
                            <a href="#"><img src="img/icons/youtube.png" alt="youtube"></a>
                            <a href="#"><img src="img/icons/linkedin.png" alt="linkedin"></a>
                            <a href="#"><img src="img/icons/gmail.png" alt="gnail"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 
    <br><br><br>        

               
        <section class="home-sec" id="home">
           <div class="container">
           
            <div class="heading">
               <h2>DONOR TABLE</h2><br>
            </div>
            <p>Before Contacting Donor Know the Process of donating and Recieving Food by on clicking <strong>About bar</strong> on the top </p><br>
            
  
        <p>Type something in the input field to search the table for first names, last names , emails,food quality(or)quantity etc...:</p>  
         <input class="form-control" id="myInput" type="text" placeholder="Search..">
         <br><br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Phone Number</th>
            <th>Food Name</th>
            <th>Food Quantity</th>
            <th>Food Quality</th>
            <th>Location Of DoNor</th>
            <th>Donated date</th>
            <th>Extra details</th>
      </tr>
    </thead>
    <tbody id="myTable">
       
        <?php
      /*$conn = mysqli_connect("localhost", "root", "", "mysql");
      $sql = "SELECT * FROM registrations";
      $result = $conn->query($sql);*/
      if ($result->num_rows > 0) {
           while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr><td>". $row["fnam"]. "</td><td>". $row["lnam"]. "</td><td>". $row["email"] . "</td><td>" .$row["phone"]. "</td><td>". $row["ftype"]."</td><td>". $row["fq"]. "</td><td>". $row["fQun"] . "</td><td>" .$row["loc"]. "</td><td>". $row["date"] . "</td><td>" .$row["txtarea"]. "</td><tr>";
           }
          }

      else {
        echo "No Results";}

         $con->close(); 
          ?> 
       </tbody>
        </table>
      </div></section>




<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    </body>
</html>

<!--<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Filterable Table</h2>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@mail.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@greatstuff.com</td>
      </tr>
      <tr>
        <td>Anja</td>
        <td>Ravendale</td>
        <td>a_r@test.com</td>
      </tr>
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>-->