<? $this->load->view('includes/header') ?>
<!-- End Header -->
  
  <style>
    .content {
      margin-top: 70px; /* Adjust the value as needed */
    }
  </style>
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      margin-bottom: 20px;
    }

    .button-container {
      text-align: center;
      margin-bottom: 30px;
    }

    .button-container .button {
      background-color: white;
      color: black;
      border: none;
      padding: 15px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      margin: 0 10px;
    }

    .button-container .button:hover {
      background-color: white;
    }

    .button-container .divider {
      display: inline-block;
      border-left: 1px solid black;
      height: 300px;
      margin: 0 10px;
      vertical-align: middle;
    }

    .content {
      text-align: center;
      margin-top: 20px;
    }
    #footer{
      left: 0 !important;
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

  </style>
  <div class="container">
  <nav style="margin-top: 80px;">
    <div class="tabs">
      <div class = "tab"><a href="<? echo base_url('home/rides') ?>"><b>Rides</b></a></div>
      <div class = "tab"><a href="<? echo base_url('home/transportation') ?>"><b>Post/Book Ride</b></a></div>
    </div>

  </nav>
    <div class="button-container">
      <button class="button" onclick="giveARide()">  <img class="button-icon" src="<? echo base_url('assets/img/') ?>Driver1.jpg" height="150" alt="Give a Ride Icon" ><div class="= "image-text">POST A RIDE</div>
          </button>
      <span class="divider"></span>
      <button class="button" onclick="wantARide()"> <img class="button-icon" src="<? echo base_url('assets/img/') ?>pass.jpg" height="150" alt="Want a Ride Icon" ><div class="= "image-text">BOOK A RIDE</div>
          </button>
          <!-- <button class="button" >  <img class="button-icon" src="<? echo base_url('assets/img/') ?>Driver1.jpg" height="150" alt="Give a Ride Icon" ><div class="= "image-text">POST A RIDE</div>
          </button>
      <span class="divider"></span>
      <button class="button" > <img class="button-icon" src="<? echo base_url('assets/img/') ?>pass.jpg" height="150" alt="Want a Ride Icon" ><div class="= "image-text">BOOK A RIDE</div>
          </button> -->
    </div>

    <div id="giveRideContent" class="content" style="display: none; height: 200px">
      <h2>POST A RIDE</h2>
      <p>If you have a vehicle and want to provide rides to others, click the button below.</p>
      <button class="button" onclick="goToGiveRidePage()">Post a Ride</button>
    </div>

    <div id="wantRideContent" class="content" style="display: none; height: 200px">
      <h2>BOOK A RIDE</h2>
      <p>If you need a ride and want to find available rides, click the button below.</p>
      <button class="button" onclick="goToWantRidePage()">Find a Ride</button>
    </div>
  </div>
  <? $this->load->view('includes/footer') ?>
  <script>
    function giveARide() {
      document.getElementById("giveRideContent").style.display = "block";
      document.getElementById("wantRideContent").style.display = "none";
    }

    function wantARide() {
      document.getElementById("giveRideContent").style.display = "none";
      document.getElementById("wantRideContent").style.display = "block";
    }

    function goToGiveRidePage() {
      window.location.href = "<? echo base_url('home/') ?>rider";
    }

    function goToWantRidePage() {
      window.location.href = "<? echo base_url('home/') ?>passenger";
    }
  </script>
  
</body>
</html>
