<? $this->load->view('includes/header') ?>
  <!-- End Header -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding:10px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

            .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
            }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

            .button:hover {
                background-color: #555;
            }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>

    <br>
    <br>
<style>
  .row {
    margin-top: 50px; /* Adjust the value as needed */
  }
</style>
<div class="content">
  <!-- Content goes here -->
</div>

   
    <div class="row">
        <h2 style="text-align:center">Our Team</h2>
        <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>vishal.jpeg" alt="Vishal" width="150" height="150">
                <div class="container">
                    <h2>Vishal Govathoti</h2>
                    <p class="title">Coordinator</p>
                    <p>We have the ability to think outside the box. We make decisions,create something new and genarate a lot of ideas.</p>
                    <p>vishalmork176@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-528-2111</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>ganesh.jpeg" alt="Ganesh" width="150" height="150">
                <div class="container">
                    <h2>Ganesh Raghunadh Mukkapati</h2>
                    <p class="title">Organizer</p>
                    <p>I will help on visualize and present information and ideas by breaking down complex text and ideas into smaller chunks.</p>
                    <p>ganeshmukkapati18@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-351-9223</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>vengal.jpeg" alt="Vengal" width="150" height="150">
                <div class="container">
                    <h2>Vengala Rao Yeluri</h2>
                    <p class="title">Student Supporter</p>
                    <p>Professional designer combines his photography degree with his marketing degree to find the right balance between creativity and commercial sense.</p>
                    <p>vengalaraoyeluri@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-528-8495</button></p>
                </div>
            </div>
        </div>
    </div>
     
    <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>kasi.jpeg" alt="kasi" width="150" height="150">
                <div class="container">
                    <h2>Kasi</h2>
                    <p class="title">Coordinator</p>
                    <p>We have the ability to think outside the box. We make decisions,create something new and genarate a lot of ideas.</p>
                    <p>vishalmork176@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-528-2111</button></p>
                </div>
            </div>
        </div>
    <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>Anvesh.jpeg" alt="Anvesh" width="150" height="150">
                <div class="container">
                    <h2>Anvesh</h2>
                    <p class="title">Coordinator</p>
                    <p>We have the ability to think outside the box. We make decisions,create something new and genarate a lot of ideas.</p>
                    <p>vishalmork176@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-528-2111</button></p>
                </div>
            </div>
        </div>

     <div class="column">
            <div class="card">
                <img src="<? echo base_url('assets/img/') ?>praveen.jpeg" alt="praveen" width="150" height="150">
                <div class="container">
                    <h2>praveen</h2>
                    <p class="title">Coordinator</p>
                    <p>We have the ability to think outside the box. We make decisions,create something new and genarate a lot of ideas.</p>
                    <p>vishalmork176@gmail.com</p>
                    <p><button class="button">Contact:+1(660)-528-2111</button></p>
                </div>
            </div>
        </div>
        <!-- ======= Footer ======= -->
<? $this->load->view('includes/footer') ?>