<? $this->load->view('includes/header') ?>
<!-- End Header -->
  <style>
    .tab {
      margin-top: 90px; /* Adjust the value as needed */
    }
  </style>
  <style>
    /* Add your CSS styling here */
    /* Example styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      /* padding: 20px; */
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    .logo {
      display: flex;
      justify-content: left;
      margin-top: 30px;
    }

    nav {
     
      padding: 10px;
      text-align: left;
    }

    .tabs {
      display: flex;
      justify-content: space-between;
      max-width: 600px;
      margin: 0 auto;
    }

    .tab {
      padding: 10px 20px;
      background-color: #ccc;
      color: #333;
      cursor: pointer;
    }

    .tab:hover {
      background-color: #ddd;
    }

    .display-screen {
      background-color: #fff;
      height: 400px;
      margin: 30px auto;
      max-width: 800px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .display-image {
      max-width: 100%;
      max-height: 200px;
      margin-bottom: 20px;
    }

    .display-description {
      text-align: center;
      font-size: 16px;
    }
  </style>
  <div class="content">
    <!-- Content goes here -->
  </div>

  

  <nav>
    <div class="tabs">
      <div class = "tab"><a href="<? echo base_url('home/availability') ?>"><b>Availability</b></a></div>
      <div class = "tab"><a href="<? echo base_url('home/availability_requests') ?>"><b>Available Requests</b></a></div>
      <div class="tab"><a href="<? echo base_url('home/post_listing') ?>"><b>Post Listing</b></a></div>
      <div class="tab"><a href="<? echo base_url('home/help') ?>"><b>Help</b></a></div>
    </div>

  </nav>

  <div class="display-screen">
    <img src="https://www.pngitem.com/pimgs/m/151-1510456_home-construction-clipart-png-property-house-logo-png.png" alt="Display Image" class="display-image">
    <p class="display-description"> Browse listings, Apply online, Post listings and more...</p>
  </div>

  

</div>
<!-- ======= Footer ======= -->
<? $this->load->view('includes/footer') ?>
