<? $this->load->view('includes/header') ?>
<!-- End Header -->

  <style>
   .scrolling-images {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 300px;
    }
    
    .availability-heading {
      text-align: center;
      padding: 20px;
      background-color: #f5f5f5;
    }
    
    .listings-heading {
      text-align: center;
      margin-top: 20px;
    }
    
    .listings {
      display: block;
      text-align: center;
    }
    
    .listing {
      display: inline-block;
      width: 300px;
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px;
      box-sizing: border-box;
    }
    
    .listing h3 {
      margin: 0;
      font-size: 18px;
    }
    
    .listing p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <style>
    .scrolling-images{
      margin-top: 50px; /* Adjust the value as needed */
    }
  </style>
  <div class="content">
    <!-- Content goes here -->
  </div>
  <!-- <div class="scrolling-images"> -->
    <!-- <a href = "https://www.opgforestcove.com/"><img src="https://cdngeneralcf.rentcafe.com/dmslivecafe/3/1182987/Logo%20Good.JPG?crop=(0,0,300,169)&cropxunits=300&cropyunits=169&quality=85" alt="Image 1" width = "250" height = "200"><div class="image-text">Orion Property Group</div></a>
    <a href = "https://shirleysrealty.com/"><img src="https://media.merchantcircle.com/9883251/1606764023.37-3365f30b2144c810d6abe11f313454fd_medium.png" alt="Image 2" width = "200" height = "200"><div class="image-text">Shirley's Reality,LTD.</div></a>
    <a href = "https://propertymanage.biz/u42275/rentals/listings"><img src="https://rtd4.com/thumb_primary.php?p=525845&v=1554229836&cf_cache=true" alt="Image 3" width = "200" height = "200"><div class="image-text">Sri Four LLC</div></a>
   -->
  <!-- </div> -->
 <div style ="margin-top : 100px" class="listings-heading">
    <h2><centre>Rides</centre></h2>
  </div>
<!-- </body>
<body> -->
  <div id="listings">
    <p style="margin-left: 10px; font-size: 18px; font-weight: 600;">Post Rides</p>
    <!-- Listing items will be dynamically generated here -->
    <?php 
    
      $list = $this->db->get_where("tbl_ride",["status"=>1,"deleted"=>0])->result_array();
      foreach($list as $li){
        echo '<div class="listing">';
    ?>    
        
        <p><strong>Name:</strong> <span id="name"><?php echo $li['name']; ?></span></p>
        <p><strong>Pickup:</strong> <span id="pickup"><?php echo $li['pickup']; ?></span></p>
        <p><strong>Drop:</strong> <span id="drop"><?php echo $li['drop']; ?></span></p>
        <p><strong>Contact Number:</strong> <span id="contact_number"><?php echo $li['contact_number']; ?></span></p>
        <p><strong>Date & Time:</strong> <span id="date"><?php echo $li['date']." ".$li['time']; ?></span></p>
        <a href="<? echo base_url().'home/ViewListing?id='.$li['id'] ?>||1">View More</a>  
      </div>
                
    <? } ?>
   
  </div>

  <div id="listings">
    <p style="margin-left: 10px; font-size: 18px; font-weight: 600;">Booked Rides</p>
    <!-- Listing items will be dynamically generated here -->
    <?php 
    
      $blist = $this->db->get_where("tbl_ride_book",["status"=>1,"deleted"=>0])->result_array();
      foreach($blist as $bli){
        echo '<div class="listing">';
    ?>    
        
        <p><strong>Name:</strong> <span id="name"><?php echo $bli['name']; ?></span></p>
        <p><strong>Pickup:</strong> <span id="pickup"><?php echo $bli['pickup']; ?></span></p>
        <p><strong>Drop:</strong> <span id="drop"><?php echo $bli['drop']; ?></span></p>
        <p><strong>Contact Number:</strong> <span id="contact_number"><?php echo $bli['contact_number']; ?></span></p>
        <p><strong>Date & Time:</strong> <span id="date"><?php echo $bli['date']." ".$bli['time']; ?></span></p>
        <a href="<? echo base_url().'home/ViewListing?id='.$bli['id'] ?>||2">View More</a>  
      </div>
                
    <? } ?>
   
  </div>      

  <script>
    $(document).ready(function(){
      $("button").click(function(){
        $("p").slideToggle();
      });
    });
  </script>
  </div>
  <!-- ======= Footer ======= -->
  <? $this->load->view('includes/footer') ?>