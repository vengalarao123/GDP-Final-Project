<? $this->load->view('includes/header') ?>
<!-- End Header -->
  <style>
    /* Add your CSS styling here */
    /* Example styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .listing-form {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      height: 100px;
    }

    .submit-button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <style>
    .listing-form {
      margin-top: 80px; /* Adjust the value as needed */
    }
  </style>
  <div class="content">
    <!-- Content goes here -->
  </div>
  <div class="listing-form">
    <h2>Post a Listing</h2>
    <? echo $this->session->flashdata('emsg'); ?>
    <form method="post" action="<? echo base_url('Accomodation/insertAccomodation') ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="property-type">Property Type:</label>
        <select id="property-type" name="property_type" required>
          <option value="House">House</option>
          <option value="Apartment">Apartment</option>
          <option value="Condo">Condo</option>
          <option value="Townhouse">Townhouse</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bedrooms">Bedrooms:</label>
        <select id="bedrooms" name="bedrooms" required>
          <option value="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5+</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bathrooms">Bathrooms:</label>
        <select id="bathrooms" name="bathrooms" required>
          <option value="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5+</option>
        </select>
      </div>
      <div class="form-group">
        <label for="availability">Availability for:</label>
        <select id="availability" name="availability_for" required>
          <option value="1">1 person</option>
          <option value="2">2 people</option>
          <option value="3">3 people</option>
          <option value="4">4 people</option>
          <option value="5">5 people</option>
        </select>
        </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
      </div>
      <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact_number" required>
      </div>
        <div class="form-group">
          <label for="photos">Upload Photos:</label>
          <input type="file" id="photos" name="files[]" multiple required>
        </div>
        <div class="form-group">
          <label for="photos">Upload Video:</label>
          <input type="file" id="" name="video" required>
        </div>
      <input type="submit" value="Submit" class="submit-button" style="margin-bottom: 40px;">
    </form>
  </div>
    <!-- ======= Footer ======= -->
    <? $this->load->view('includes/footer') ?>

    <script>

    $("#insert").submit(function(e) {
      e.preventDefault();
      var fdata = $(this).serialize();
      $.ajax({
        "url": "<?php echo base_url("Accomodation/insertAccomodation") ?>",
        "type": "POST",
        "data": fdata,
        "dataType": 'json',
        "success": function(data) {
          alert(data)
          if (data.status == 200) {
            Swal.fire(
              'Success',
              data.message,
              'success'
            )
            setTimeout(location.reload(), 3000);
          } else {
            Swal.fire(
              'Error',
              data.message,
              'error'
            )
          }
        },
        "error": function(data) {
          console.log(data);
        }
      })
    })

     </script>