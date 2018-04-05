<?php
      require_once("config.php");

      try{
        $connString = "mysql:host=" . DBHOST . ";dbname=" .DBNAME;
        $user = DBUSER;
        $pass = DBPASS;
        $pdo =null;
      }catch(PDOException $e){
        print "ERROR!: " . $e->getMessage() . "<br/>";

        die();
      }

session_start();
$_SESSION['message'] = '';
$mysql

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if($_POST['password'] == $_POST['confirmpassword']){

    $username = $mysql->real_escape_string($_POST['username']);
    $email = $mysql->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);
  }
  else {
    $_SESSION['message'] = "Passwords do not match";
  }
}

?>

       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>REGISTER</title>


       <link href= "dist/css/bootstrap.min.css" rel="stylesheet">

       <link href= "assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

       <link href= "carousel/carousel.css" rel="stylesheet">
<link rel="stylesheet" href="form.css" type="text/css">

      <div class="navbar-wrapper" id="nav" class="sticky" class="topnav">
        <div class="container">

          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">F&F</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#food">Food</a></li>
                  </ul>
                  <div class="search-container">
                <form action="/action_page.php">
                  <input type="text" placeholder="Search.." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>

              </div>
            </div>
          </nav>
        </div>
      </div>
</br>
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required /></br>
      <input type="email" placeholder="Email" name="email" required /></br>
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required /></br>
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /></br>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
  <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</div>


      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 FnF Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
