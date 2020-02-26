

<!DOCTYPE html>
<html lang="en">
<?php 
    include_once 'database.php';
    
    
    
    
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    }else{
      $pageno = 1;
    }
    
    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page; 

    $total_pages_sql = "SELECT COUNT(*) FROM cars";
    $result = mysqli_query($db,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "Select * From Cars JOIN Images ON cars._id = images.car_id LIMIT $offset, $no_of_records_per_page";
    $query = mysqli_query($db, $sql);

?>
<head>
  <title>Cars | Manonamission</title>
  <link rel="shortcut icon" type="image/png" href="Images/logo1.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    
    <div class="header-top bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-lg-3">
            <a href="index.php">
              <img src="Images/logo1.jpg" alt="Image" class="img-fluid">
           
            </a>
          </div>
          <div class="col-lg-3 d-none d-lg-block">

            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-location-arrow text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">Yallahs</span>
                <span class="caption-text">Yallahs St. Thomas</span>
              </div>
            </div>

          </div>
          <div class="col-lg-3 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-phone text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">1876 790 0461</span>
                <span class="caption-text">Call now</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-envelope text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">manonamissionmotors19@gmail.com</span>
                <span class="caption-text">Email us</span>
              </div>
            </div>
          </div>

          <div class="col-6 d-block d-lg-none text-right">
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      


      
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mx-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                <li>
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="about.php" class="nav-link text-left">About Us</a>
                </li>
                <li class="active">
                  <a href="cars.php" class="nav-link text-left">Cars</a>
                </li>
                <li>
                  <a href="contact.php" class="nav-link text-left">Contact</a>
                </li>
              </ul>                                                                                                                                
            </nav>

          </div>
         
        </div>
      </div>

    </div>
    
    </div>
  


    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <span class="text-serif text-primary">Cars</span>
            <h3 class="heading-92913 text-black text-center">Our Cars</h3>
          </div>
        </div>
        
          <h2 class="text-center">Featured Vehicle</h2><br>
          <?php while ($row = mysqli_fetch_array($query)) { ?>
      
    
          <div class="col-md-6 col-lg-4 mb-4">

            <div class="service-39381">
              <img src="<?= $row['coverPhoto'] ?>" alt="Image" class="img-fluid">
              <div class="p-4">
                <h3><a href="#"><span class="icon-room mr-1 text-primary"></span> <?= $row['brandName']?> &mdash; <?= $row['carModel']?></a></h3>
                <div class="d-flex">
                  <div class="mr-auto">
                    <span class="icon-date_range"></span>
                    <?= $row['manufactureYear']?>
                  </div>
                  <div class="ml-auto price">
                    <span class="bg-primary">$<?= $row['carPrice'] ?></span>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-3">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        <?php } ?>
        <ul class="pagination justify-content-center">
          <li><a href="?pageno=1">First</a></li>
          <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo ''; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
          </li>
          <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
          </li>
          <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
        </div>
      </div>
    </div>

  
    <div class="site-section bg-image overlay" style="background-image: url('images/honda.jpg');">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="text-white">Get In Touch With Us</h2>
            <p class="lead text-white">Get the posiblities of owning your car or truck.</p>
            <p class="mb-0"><a href="contact.php" class="btn btn-warning py-3 px-5 text-white">Contact Us</a></p>
          </div>
        </div>
      </div>
    </div>


    
    

        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>
<!--details modal-->
<?php include 'detail-modal-Honda.php'; 
      include 'detail-modal-Subaru.php'; 
      include 'detail-modal-Toyota.php'; 
      include 'detail-modal-Kia.php'; 
      include 'detail-modal-Lambo.php'; 
      include 'detail-modal-Lada.php';  
?>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>