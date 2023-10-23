<?php 
   // session_start();
    //if(isset($_SESSION['nom'])){
        //header("location:admin.php");

    //}
   $host="localhost";
    $user="root";
    $pw="";
    $nbd="ogin";
    $con=mysqli_connect($host,$user,$pw,$nbd);
    if(isset($_POST['submit'])){
        $nom=htmlspecialchars(trim(strtolower($_POST['nom']))) ;
        $password=$_POST['password']; 

        $select_products = mysqli_query($con,"SELECT * FROM login WHERE nom='$nom' && password='$password';");
        echo $select_products;
        if(mysqli_num_rows($select_products)>0){
           //$_SESSION['nom']=$nom;
           if($password==$select_products("password")){
            $_SESSION["id"]=$select_products["id"];
            header("location:ANTICHUT.php");
           }
           
        }else{
            echo"<script>alert('Mode de Passe Incorret')</script>";
        }
        
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,400;0,600;1,300;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="csss/cssloginn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >
    <div class="wrapper">
        <form action="." method="POST">
            <h1>login</h1>
            <div class="inputt">
                <input type="text" name="nom" placeholder="Username" required >
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inputt">
                <input type="password" name="password" placeholder="Password" required >
                <i class="fa-solid fa-lock"></i>
            </div>
            <button type="submit" name="submit" class="btn">login</button>
            <div class="registre">
                <p>Don't have an account? <a href="index.php">REGISTER</a></p>
            </div>
            </div>
        </form>
    </div>
</body>
</html>