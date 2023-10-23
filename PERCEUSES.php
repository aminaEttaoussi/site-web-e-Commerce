<?php

@include 'config.php';

if(isset($_POST['add_produitt'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `vitement`(nom, image, prix) VALUES('$p_name', '$p_image', '$p_price')") or die('query failed');

   if($insert_query){
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  $delete_query = mysqli_query($conn, "DELETE FROM `vitement` WHERE id = $delete_id ") or die('query failed');
  if($delete_query){
     header('location:vitement.php');
     $message[] = 'product has been deleted';
  }else{
     header('location:vitement.php');
     $message[] = 'product could not be deleted';
  };
};

if(isset($_POST['update_product'])){
  $update_p_id = $_POST['update_p_id'];
  $update_p_nom = $_POST['update_p_nom'];
  $update_p_image = $_FILES['update_p_image']['name'];
  $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
  $update_p_image_folder = 'uploaded_img/'.$update_p_image;
  $update_p_prix = $_POST['update_p_prix'];
  $update_query = mysqli_query($conn, "UPDATE `vitement` SET  nom = '$update_p_nom', image = '$update_p_image' , prix = '$update_p_prix' WHERE id = '$update_p_id'");

  if($update_query){
     move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
     $message[] = 'product updated succesfully';
     header('location:vitement.php');
  }else{
     $message[] = 'product could not be updated';
     header('location:vitement.php');
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/ANTICHUT.CSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Spinner Start -->
    <!-- <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div> -->
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div
            class="h-100 d-inline-flex align-items-center border-start border-end px-3"
          >
            <small class="fa fa-phone-alt me-2"></small>
            <small>+212 5 22 44 45 46</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center border-end px-3">
            <small class="far fa-envelope-open me-2"></small>
            <small>info@ogin.ma</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center border-end px-3">
            <small class="far fa-clock me-2"></small>
            <small>Mon - Fri : 08 AM - 06:30 PM</small>
          </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-square border-end border-start" href=""
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-square border-end" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-square border-end" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="btn btn-square border-end" href=""
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top px-4 px-lg-5 py-lg-0"
    >
      <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img src="img/ogin.png" alt="" style="width: 150px;">
        </h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
          <a href="admin.php" class="nav-item nav-link active">Home</a>
          <a href="about.php" class="nav-item nav-link">About Us</a>
          <a href="service.php" class="nav-item nav-link">Our Services</a>
          <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              >Pages</a
            >
            <div class="dropdown-menu bg-light m-0">
              <a href="chaussure_securite.php" class="dropdown-item">CHAUSSURE</a>
              <a href="protection.php" class="dropdown-item">PROTECTION</a>
              <a href="gant.php" class="dropdown-item">GANT DE PROTECTION</a>
              <a href="ANTICHUT.php" class="dropdown-item">ANTICHUT</a>
              <a href="PERCEUSES.php" class="dropdown-item">PERCEUSES</a>
            </div>
          </div>
          <a href="contact.php" class="nav-item nav-link">Contact Us</a>
        </div>
      </div>
    </nav>
    <section id="product1" class="section-1">
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
          <h3>add a new product</h3>
          <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
          <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
          <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required><br>
          <a href="#"><input type="submit" value="AJOUTER" class="btnajt" name="add_produitt"></a>
        </form><br> <br>
        <h2>PERCEUSES MAGNITIQUES</h2>
        <P>la marque MAGTRON</P>
        <div class="pro-container">
        <?php
         
         $select_products = mysqli_query($conn, "SELECT * FROM `vitement`");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
        ?>
            <div class="pro">
                <img src="img/perceuses/<?php echo $row['image']; ?>">
                <div class="des">
                    <h5><?php echo $row['nom']; ?></h5>
                    <h4>$<?php echo $row['prix']; ?></h4>
                    <p>demande de devis</p>
                </div>
                <a href="vitement.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"><i class="fa-solid fa-trash" id="cartt"></i></a>
                <a href="vitement.php?edit=<?php echo $row['id']; ?>"><i class="fa-solid fa-cart-plus " id="cart"></i></a>
            </div>
            <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
           
    </section>
    <section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `vitement` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="100" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_nom" value="<?php echo $fetch_edit['nom']; ?>">
      <input type="number" min="0" class="box" required name="update_p_prix" value="<?php echo $fetch_edit['prix']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btnn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>
    <div class="lin"></div>
    <div
      class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5" >
        <div class="row g-5" >
          <div class="col-lg-3 col-md-6" >
              <img src="img/ogin.png" alt="" style="width: 100px; ">

            <p>
              Outtillage Manutention Protection
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-0" href=""
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Address</h4>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>22, Bd la Gironde Casablanca - Maroc
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>+212 5 22 44 45 46</p>
            <p><i class="fa fa-envelope me-3"></i>info@ogin.ma</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Quick Links</h4>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Support</a>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Newsletter</h4>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input
                class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                type="text"
                placeholder="Your email"
              />
              <button
                type="button"
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
              >
                SignUp
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

</body>
</html>