<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Expats Hub </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<? echo base_url() ?>assets/img/favicon.png" rel="icon">
  <link href="<? echo base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<? echo base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<? echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<? echo base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid d-flex align-items-center">

      <h1 class="logo mx-auto"><img src="<? echo base_url() ?>assets/img/IMG-1.png"><a href="<? echo base_url() ?>">Expats Hub</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
 <?php $a = $this->uri->segment(2);
 $a1= "";$a2= "";$a3= "";$a4= "";$a5= "";$a5= "";
 if($a == ""){
  $a1= "active";
 }else if($a == "about_us"){
  $a2= "active";
 }
 else if($a == "accomodation"){
  $a3= "active";
 }
 else if($a == "transportation"){
  $a4= "active";
 }
 else if($a == "mentor"){
  $a5= "active";
 }
 else if($a == "rules"){
  $a6= "active";
 }

 ?>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?php echo $a1;?>" href="<? echo base_url() ?>">Home</a></li>
          <li><a class="nav-link scrollto <?php echo $a2;?>" href="<? echo base_url('home/about_us') ?>">About Us</a></li>
          <li><a class="nav-link scrollto <?php echo $a3;?>" href="<? echo base_url('home/accomodation') ?>">Accommodation</a></li>
          <li><a class="nav-link   scrollto <?php echo $a4;?>" href="<? echo base_url('home/transportation') ?>">Transportation</a></li>
          <li><a class="nav-link scrollto <?php echo $a5;?>" href="<? echo base_url('home/mentor') ?>">Guidence</a></li>
          <!--  <li class="dropdown"><a href="#"><span>Rules & Regulation</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto  <?php echo $a6;?>" href="<? echo base_url('home/') ?>rules">Rules & Regulation</a></li>
          <li><a class="nav-link scrollto" href="#contact">
              <input type="text" class="form-control pl-3" placeholder="Search">
            </a>

          </li>
          <li class="dropdown"><a href="#"><span><? echo ($this->session->userdata("user_id")) ? 'Account' : 'Login' ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <? if (!$this->session->userdata("user_id")) { ?>
                <li><a href="<? echo base_url() ?>home/login">Login</a></li>
              <? } ?> 
              <? if ($this->session->userdata("user_id")) { ?> 
                <li><a><? echo $this->session->userdata("user_name") ?></a></li>
              <? } ?>  
              <? if (!$this->session->userdata("user_id")) { ?>
                <li><a href="<? echo base_url() ?>home/signup">Register</a></li>
              <? } ?>  
              <? if ($this->session->userdata("user_id")) { ?> 
                <li><a href="<? echo base_url('home/logout') ?>">Logout</a></li>
              <? } ?>  
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->