<? $this->load->view('includes/header') ?>
  <!-- End Header -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 50px;
      padding: 20px;
      display: flex;
    }

    .container {
      flex: 1;
    }

    h1 {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"] {
      width: 300px;
      padding: 5px;
      font-size: 16px;
    }

    .button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
    }

    .button:hover {
      background-color: #45a049;
    }

    .driver-image {
      flex: 1;
      text-align: center;
      justify-content: center;
    }

    .driver-image img {
      width: 400px;
      height: auto;
    }
    #footer{
      left: 0 !important;
    }
  </style>
  <style>
    .v {
      margin-top: 80px; /* Adjust the value as needed */
    }
  </style>
  <div class="v">
    <h1>Post a Ride</h1>

    <form>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>
      <label for="number">MobileNumber:</label>
      <input type="text" id="number" name="number" required><br><br>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required><br><br>

      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required><br><br>

      <label for="pickup">From:</label>
      <input type="text" id="pickup" name="pickup" required><br><br>

      <label for="drop">To:</label>
      <input type="text" id="drop" name="drop" required><br><br>

      <input type="button" value="Post Now" style="margin-bottom: 20px;" onclick="post()" class="button">
    </form>
  </div>

  <div class="driver-image">
    <img src="<? echo base_url() ?>assets/img/Rider.jpg" alt="Ride">
  </div>

  <script>
    function post() {
      // Retrieve the values entered by the user
      var name = document.getElementById('name').value;
      var date = document.getElementById('date').value;
      var time = document.getElementById('time').value;
      var pickup = document.getElementById('pickup').value;
      var drop = document.getElementById('drop').value;
      var number = document.getElementById('number').value;
      

      if(name =="" ||date =="" ||time =="" ||pickup =="" ||drop ==""||number==""){
        alert("Please enter all fields.")
      }else{
        $.ajax({
          "url": "<?php echo base_url("home/insertRide") ?>",
          "type": "POST",
          "data": {name:name,date:date,time:time,pickup:pickup,drop:drop,number:number},
          // "dataType": 'json',
          "success": function(data) {
            if (data == "success") {
              alert("Ride posted successfully.")
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
