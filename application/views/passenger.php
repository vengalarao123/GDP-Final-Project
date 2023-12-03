<? $this->load->view('includes/header') ?>
  <!-- End Header -->
  <style>
    .form-container {
      margin-top: 80px; /* Adjust the value as needed */
    }
  </style>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 50px;
      padding: 20px;
      background-color: #f2f2f2;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .form-container {
      flex: 1;
    }
       
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="datetime-local"],
    .form-group input[type="email"],
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-group textarea {
      resize: vertical;
      height: 100px;
    }

    .submit-button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    .submit-button:hover {
      background-color: #45a049;
    }

    .image-container {
      flex: 1;
      text-align: center;
    }

    .image-container img {
      max-width: 80%;
      height: auto;
    }

    #footer{
      left: 0 !important;
    }
    
  </style>

  <div class="container">
    
    <div class="form-container">
      <form>
        <div class="form-group">
          <h1>Schedule a Ride</h1>
          <label for="name">Your Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="PhoneNumber">PhoneNumber:</label>
            <input type="text" id="PhoneNumber" name="PhoneNumber" placeholder="Enter your PhoneNumber">
          </div>

        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date">
        </div>

        <div class="form-group">
          <label for="time">Time:</label>
          <input type="time" id="time" name="time">
        </div>

        <div class="form-group">
          <label for="pickup">Pickup Location:</label>
          <input type="text" id="pickup" name="pickup" placeholder="Enter pickup location">
        </div>

        <div class="form-group">
          <label for="drop">Drop Location:</label>
          <input type="text" id="drop" name="drop" placeholder="Enter drop location">
        </div>

        <div class="form-group">
          <label for="details">Additional Details:</label>
          <textarea id="details" name="details" placeholder="Enter any additional details"></textarea>
        </div>

        <div class="form-group">
          <input type="button" onclick="post()"  class="submit-button" value="Schedule Ride">
        </div>
      </form>
    </div>
  <div class="image-container">
    <img src="<? echo base_url('assets/img/') ?>passen.jpg" alt="Ride Image">
  </div>

  
  <script>
    function post() {
      // Retrieve the values entered by the user
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var PhoneNumber = document.getElementById('PhoneNumber').value;
      var details = document.getElementById('details').value;
      var date = document.getElementById('date').value;
      var time = document.getElementById('time').value;
      var pickup = document.getElementById('pickup').value;
      var drop = document.getElementById('drop').value;
      

      if(email =="" ||details =="" ||name =="" ||date =="" ||time =="" ||pickup =="" ||drop ==""||PhoneNumber==""){
        alert("Please enter all fields.")
      }else{
        $.ajax({
          "url": "<?php echo base_url("home/passenger_") ?>",
          "type": "POST",
          "data": {name:name,date:date,time:time,pickup:pickup,drop:drop,number:PhoneNumber,details:details,email:email},
          // "dataType": 'json',
          "success": function(data) {
            if (data == "success") {
              alert("Ride booked successfully.")
            } else {
              alert("Something went wrong please try again.")
            }
          },
          "error": function(data) {
            console.log(data);
          }
        })

      }
    }
  </script>


  <? $this->load->view('includes/footer') ?>
