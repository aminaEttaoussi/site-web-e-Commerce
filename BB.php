<?php 
    //if(isset($_SESSION['nom'])){
        //header("location:admin.php");

    //}
    if(isset($_POST['submit'])){
    $host="localhost";
    $user="root";
    $pw="";
    $nbd="ogin";
    $con=mysqli_connect($host,$user,$pw,$nbd);
    if(isset($_POST['submit'])){
        $nom=$_POST['Username'] ;
        $email=$_POST['Email']; 
        $age=$_POST['age']; 
        $password=$_POST['password']; 
        //$insert_query = mysqli_query($con,"INSERT INTO `register`(nom,email,age,password) VALUES('$nom','$email','$age','$password')");
        if($insert_query){
            $message[] = 'product add succesfully';
         }else{
            $message[] = 'could not add the product';
         }
        //echo $query;
        //if(mysqli_num_rows(mysqli_query($con,$query))>0){
            //header("location:index.php");
       // }
    //    if($con){
    //     echo"connection ok";
    //    }
    //    else{
    //     echo "connection failed".mysqli.error();
    //    }
        
    }}










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
<body>
    <div class="wrapper">
        <form action="." method="POST">
            <h1>REGISTER</h1>
            <div class="inputt">
                <input type="text" name="Username" placeholder="Username" required >
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inputt">
                <input type="text" name="Email" placeholder="Email" required >
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="inputt">
                <input type="number" name="age" placeholder="Age" required >
            </div>
            <div class="inputt">
                <input type="password" name="password" placeholder="Password" required >
                <i class="fa-solid fa-lock"></i>
            </div>
            <button type="submit"  class="btn" name="submit">Registre</button>
            <div class="registre">
                <p>Already a member ? <a href="AA.php">Sign in</a></p>
            </div>
            </div>
        </form>
    </div>
</body>
</html>