<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   include 'C:\wamp64\www\site_grilladerie\connection.php';
    $email = $_POST['email'];
    $mdp =$_POST['mdp'];
    $nom_serveur = "localhost";
    $dbname="lagrilladerie";
    $login= "root";
    $password = "";
    $erreur= "";
    $con = mysqli_connect($nom_serveur, $login, $password, $dbname);
    $email = $_POST["email"];
    $mdp = $_POST["mdp"]; 
    $sql= "SELECT * from users where email= '$email'";
    $result = mysqli_query($con, $sql);
    
    $num = mysqli_num_rows(mysqli_result $result );
    if ($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            if (password_verify($mdp, $row['mdp'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: bienvenu.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Login to our website</h1>
     <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Username</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="mdp">Password</label>
            <input type="mdp" class="form-control" id="mdp" name="mdp">
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>

  </body>
</html>