<? $this->load->view('includes/header') ?>
      
  <style>
        .row {
          /* margin-top: 80px; Adjust the value as needed */
        }
      </style>
  <style>
    body {
      background-color: #f8f9fa;
      color: #333;
    }
    
    
    .mentor-section {
      background-color: #fff;
      border-radius: 4px;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0,0,0,.1);
    }
    
    .mentor-heading {
      color: #333;
    }
    
    .mentor-buttons {
      /* margin-top: 1.5rem; */
    }
    
    .mentor-btn {
      display: block;
      margin-bottom: 1rem;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      background-color: green;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .mentor-btn:hover {
      background-color: grey;
    }
    
    .mentor-details {
      margin-top: 2rem;
      display: none;
    }
    
    .mentor-details h2 {
      margin-top: 0;
    }
    
  </style>

  <main style="margin-top: 70px;">
    <section class="jumbotron text-center">
      <div class="container">
        <b><h1 class="display-4 row">Welcome to the Mentor Page</b></h1>
      </div>
    </section>
<section class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="mentor-section">
        <h2 class="mentor-heading">Mentors</h2>
        <div class="mentor-buttons">
          <button class="mentor-btn" data-mentor="mentor1">Mentor 1</button>
          <button class="mentor-btn" data-mentor="mentor2">Mentor 2</button>
          <button class="mentor-btn" data-mentor="mentor3">Mentor 3</button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <section id="mentor-details" class="mentor-details">
        <div class="row">
          <div class="col-md-6">
            <h4>Name</h4>
            <p id="mentor-name"></p>
            <h4>Email</h4>
            <p id="mentor-email"></p>
          </div>
          <div class="col-md-6">
            <h4>Phone Number</h4>
            <p id="mentor-phone"></p>
            <h4>Address</h4>
            <p id="mentor-address"></p>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
</main>
   <!-- ======= Footer ======= -->
   
   
   
   <script>
    const mentorButtons = document.querySelectorAll('.mentor-btn');
    mentorButtons.forEach(button => {
      button.addEventListener('click', showMentorDetails);
    });
    
    function showMentorDetails(event) {
      const mentor = event.target.dataset.mentor;
      const mentorDetails = getMentorDetails(mentor);
      
      if (mentorDetails) {
        document.getElementById('mentor-name').textContent = mentorDetails.name;
        document.getElementById('mentor-email').textContent = mentorDetails.email;
        document.getElementById('mentor-phone').textContent = mentorDetails.phone;
        document.getElementById('mentor-address').textContent = mentorDetails.address;
        
        document.getElementById('mentor-details').style.display = 'block';
      }
    }
    
    function getMentorDetails(mentor) {
      switch (mentor) {
        case 'mentor1':
          return {
            name: 'Mentor 1',
            email: 'mentor1@example.com',
            phone: '123-456-7890',
            address: '123 Main St, City, Country'
          };
        case 'mentor2':
          return {
            name: 'Mentor 2',
            email: 'mentor2@example.com',
            phone: '987-654-3210',
            address: '456 Elm St, City, Country'
          };
        case 'mentor3':
          return {
            name: 'Mentor 3',
            email: 'mentor3@example.com',
            phone: '555-123-4567',
            address: '789 Oak St, City, Country'
          };
        default:
          return null;
      }
    }
  </script>

<? $this->load->view('includes/footer') ?>

  







