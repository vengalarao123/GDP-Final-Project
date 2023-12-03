<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Property Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .property-details {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .property-details h2 {
      margin-bottom: 20px;
    }

    .property-details p {
      margin-bottom: 10px;
    }

    .image-gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
    }

    .image-gallery img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin-right: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Request for property</h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <lable>Name<span style="color:red">*</span></lable>
                <input type="text" class="form-control form-control-sm name" id="name">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <lable>Phone<span style="color:red">*</span></lable>
                <input type="text" class="form-control form-control-sm" id="phone">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <lable>Email</lable>
                <input type="text" class="form-control form-control-sm" id="email">
              </div>
            </div>
            <input type="hidden" id="row_id" name="row_id" class="row_id">
            <input type="hidden" id="c_date" name="c_date" class="c_date">

            <div class="col-md-2">
              <div class="form-group">
              <lable>&nbsp;</lable>
                <button type="button"  id="request_submit"  class="btn btn-success btn-sm request_submit">Add</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="property-details">
  <a href="<?php echo base_url()."home"?>" style="float: right;">Back Home</a>
    <?php if(!empty($list)){?>
      <?php if($tbl == ""){ ?>
        <h2>Property Details</h2>
        <p><strong>Title:</strong> <span id="title"><?php echo $list[0]['title']; ?></span></p>
        <p><strong>Description:</strong> <span id="description"><?php echo $list[0]['description']; ?></span></p>
        <p><strong>Price:</strong> <span id="price"><?php echo $list[0]['price']; ?></span></p>
        <p><strong>Bedrooms:</strong> <span id="bedrooms"><?php echo $list[0]['bedrooms']; ?></span></p>
        <p><strong>Bathrooms:</strong> <span id="bathrooms"><?php echo $list[0]['bathrooms']; ?></span></p>
        <p><strong>Property Type:</strong> <span id="property-type"><?php echo $list[0]['property_type']; ?></span></p>
        <p><strong>Availability for:</strong> <span id="availability"><?php echo $list[0]['availability_for']; ?></span></p>
        <p align="center"><button type="button" class="btn btn-info btn-sm" row_id="<?php echo $list[0]['id'];?>" c_date="<?php echo $list[0]['created_date'];?>" id="modal_add">Request Property</button></p>
        <div class="image-gallery" id="image-gallery">
          <?php 
            if(!empty($list[0]['availability_for'])){
              if($list[0]['video'] != ""){
                echo '<video src="' . base_url()."/".$list[0]['video'] . '" width="120" height="100" controls autoplay></video>';
              }
              $img = explode("||", $list[0]['images']);
              $c = count($img)-1;
              for($i = 0; $i < $c; $i++){
                echo '<img src="' . base_url()."/".$img[$i] . '" target="_blank" alt="Listing Image" width="100" height="100">';
              }
            }
          ?>
        </div>
      <?php } else if($tbl == "1"){?>
        <h2>Ride Details</h2>
        <p><strong>Name:</strong> <span id="name"><?php echo $list[0]['name']; ?></span></p>
        <p><strong>Pickup:</strong> <span id="pickup"><?php echo $list[0]['pickup']; ?></span></p>
        <p><strong>Drop:</strong> <span id="drop"><?php echo $list[0]['drop']; ?></span></p>
        <p><strong>Contact Number:</strong> <span id="contact_number"><?php echo $list[0]['contact_number']; ?></span></p>
        <p><strong>Date & Time:</strong> <span id="date"><?php echo $list[0]['date']." ".$list[0]['time']; ?></span></p>
      <?php } else if($tbl == "2"){?>
        <h2>Boooked Ride Details</h2>
        <p><strong>Name:</strong> <span id="name"><?php echo $list[0]['name']; ?></span></p>
        <p><strong>Pickup:</strong> <span id="pickup"><?php echo $list[0]['pickup']; ?></span></p>
        <p><strong>Drop:</strong> <span id="drop"><?php echo $list[0]['drop']; ?></span></p>
        <p><strong>Contact Number:</strong> <span id="contact_number"><?php echo $list[0]['contact_number']; ?></span></p>
        <p><strong>Date & Time:</strong> <span id="date"><?php echo $list[0]['date']." ".$list[0]['time']; ?></span></p>
      <?php }?>
      
    <?php }?>
    
  </div>

</div>

<script>
  
  $(document).ready(function() { 
    $("#modal_add").on("click", function(){
      var row_id = $(this).attr('row_id');
      var c_date = $(this).attr('c_date');
      $("#name").val("");
      $("#phone").val("");
      $("#email").val("");
      $("#row_id").val(row_id);
      $("#c_date").val(c_date);
      $("#myModal").modal("show");
    });

    $("#request_submit").on("click", function(){
      var row_id = $("#row_id").val();
      var c_date = $("#c_date").val();
      var name = $("#name").val();
      var phone = $("#phone").val();
      var email = $("#email").val();
      if(name == "" || phone == ""){
        alert("Please enter mandatory feilds.")
      }else{
        $.ajax({
          url:"<?php echo base_url("Accomodation/Save_request") ?>",
          data:{row_id:row_id,name:name,phone:phone,email:email,c_date:c_date},
          type:"post",
          
          success:function(res){
            // alert(res)
            if(res == "success"){
              alert("Request raised successfully.")
            }else{
              alert("Something went wrong try again later.")
            }
            $("#myModal").modal("hide");
          }
        });
      }
    });

    
  });
</script>

</body>
</html>




