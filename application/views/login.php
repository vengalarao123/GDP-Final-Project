<!DOCTYPE html>
<!-- saved from url=(0080)file:///C:/Users/S555276/OneDrive%20-%20nwmissouri.edu/Pictures/loginpage/2.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Login Page</title>
  
  <style>
    body {
        background-image: url('pink.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
     body {
      position: relative;
      left: 320px;
    }
    .moved-text {
      position: absolute;
      top: 370px;
      left: 110px;
    }
    .expats-hub {
      display: -webkit-inline-box;
      font-size: 38px;
      font-weight: bold;
      color: #fa0000;
      text-transform: uppercase;
      position: relative;
    }
    
    .expats-hub::before {
      content: "E";
      position: absolute;
      left: -10px;
      top: -10px;
      color: #fa0000;
      animation: slideLeft 1s ease-in-out infinite;
    }
    
    .expats-hub::after {
      content: "!";
      position: absolute;
      right: -10px;
      top: -10px;
      color: #fa0000;
      animation: slideRight 1s ease-in-out infinite;
    }
    
    @keyframes slideLeft {
      0% { transform: translateX(0); }
      50% { transform: translateX(-20px); }
      100% { transform: translateX(0); }
    }
    
    @keyframes slideRight {
      0% { transform: translateX(0); }
      50% { transform: translateX(-20px); }
      100% { transform: translateX(0); }
    }
  
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    
    .container {
      display: flex;
      align-items: top;
      justify-content: top;
      height: 100vh;
    }
    
    .login-form {
      
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
    }
    
    .login-image {
      flex: 1;
      background: url("w.png") center/cover;
    }
    
    .login-content {
      position: relative;
      top: 50px;
      flex: 1;
      padding: 20px;
    }
    
    .login-form input[type="email"],
    .login-form input[type="password"] {
      
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 2px solid #ccc;
      border-radius: 4px;
    }
    
    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .login-form button:hover {
      background-color: #45a049;
    }
    
    .signup-link {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <div class="login-image">
<img src="<? echo base_url() ?>assets/img/Logonew.png" alt="Logo" width="250" height="300">
<div class="container">
    <h1 class="expats-hub">XPATS HUB</h1><br> 
  </div>
  <p class="moved-text"><b>Your  GateWay To A Thriving Expat</b></p>
  
</div>
      <div class="login-content">
        <form method="post" id="loginUser">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required="">
          </div>
          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div> -->
          <button type="submit" class="btn btn-primary"><p>login</p></button>
        </form>
        <div class="signup-link">
          <p>If you don't have an account, <a href="<? echo base_url() ?>home/signup">sign up here</a>.<br>
          <a href="<?echo base_url('home/forgot') ?>">Click Here</a> Forgot Password.</p>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
</body>

<script>

  function home(){
    window.location.href = "<? echo base_url() ?>"
  }

  $(document).ready(function(){
    $("#loginUser").submit(function(e){
      e.preventDefault();
      var fdata = $(this).serialize();
      $.ajax({
        "url": "<?php echo base_url("home/do_login") ?>",
        "type": "POST",
        "data" : fdata,
        "dataType": 'json',
        "success" : function(data){
          if(data.status == 200){
            setTimeout(home, 3000); 
          }else{
            Swal.fire(
              'Error',
              data.message,
              'error'
            )
          }
        },
        "error" : function(data){
          console.log(data);
        }
      })
    })
  })
</script>
</html>