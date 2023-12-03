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
    <h2><centre>Listings</centre></h2>
  </div>
<!-- </body>
<body> -->
  <div id="listings">
    <!-- Listing items will be dynamically generated here -->
    <?php 
    if(!empty($list)){
      foreach($list as $li){
        $img = explode("||", $li['images']);
        echo '<div class="listing">' .
        '<img src="' . base_url()."/".$img[0] . '" alt="Listing Image" width="100" height="100">' .
        '<h3>' . $li['title'] . '</h3>' .
        '<p><strong>Bedrooms:</strong> ' . $li['bedrooms'] . '</p>' .
        '<a href="'.base_url().'home/ViewListing?id='.$li['id'].'||">View More</a>' .
        '</div>';
        // '.<?=base_url()."home/ViewListing.php?id='.$li['id'].'"
        // <button type="button" id="ViewListing" class="ViewListing btn btn-info" lid='.$li['id'].'>View More</button>' .
       
        // echo $li['images'];
      }
    }
    // SELECT `id`, `title`, `description`, ``, `property_type`, `bedrooms`, ``, `availability_for`, `location`, `contact_number`, `images`, `status`, `deleted`, `created_date` FROM `tbl_accomodations` WHERE 1
    // price: 2500,
    // //         bedrooms: 3,
    //         bathrooms: 2,
    //         : 'House',
    //         : '4',
    
   
  ?>

<!-- https://images.unsplash.com/photo-1593696140826-c58b021acf8b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlJTIwaW50ZXJpb3J8ZW58MHx8MHx8&w=1000&q=80 -->

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