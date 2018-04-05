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
$mysql;

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

 function getSearchFor()
  {
    $value = "";
    if(isset($_GET[SEARCHBOX])){
      $value =  $_GET[SEARCHBOX];
    }
    return $value;
  }

 define('SEARCHBOX', 'txtSearch');

function getResults()
  {
    try{
      // $db = getDB();
      $connString = "mysql:host=" . DBHOST . ";dbname=" .DBNAME;
      $user = DBUSER;
      $pass = DBPASS;
      $pdo =null;
      $db = new PDO($connString, $user, $pass);
      
      $searchFor = '%' . getSearchFor() . '%';


      $sql = "Select * from food where tilte like ?";
  
      $statement = $db->prepare($sql);
      $statement -> bindValue(1, $searchFor);
      $statement->execute();
      return $statement;


    }

    catch(PDOException $e)
    {
      die($e->getMessage());
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

 <body>
    <div class="navbar-wrapper">
      <div >

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="#">Food & Fitness</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="http://localhost/F-F_DEV/homepage.php">Home</a></li>
                <li><a href="#about">Blog</a></li>
                <li><a href="#signin">Sign Up</a></li>
                <li> <form method="get" action="search.php";>
                <p></p>
                            <input type="search" 
                                   name="<?php echo SEARCHBOX; ?>"
                                   placeholder="Search.."
                                   value=""<?php echo getSearchFor(); ?>"" />
                            <input type="submit"/></form></li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        </div>
    </div>
</br>
 <div class="container">
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


  <?php

if (! empty ($_GET[SEARCHBOX]) && $result = getResults())
{
  $sql = "Select * from food where tilte like ?";
  while ($row = $result->fetch())
  {
//Image links for food items
                $cake="http://www.homecookingadventure.com/images/recipes/Chocolate_Mirror_Cake_main.jpg";
                $cookie="https://images-gmi-pmc.edge-generalmills.com/b9272720-c6bf-4288-92f7-43542067af7c.jpg";
                $pies="https://food.fnr.sndimg.com/content/dam/images/food/fullset/2011/10/5/1/FNM_110111-Insert-039-c_s4x3.jpg.rend.hgtvcom.616.462.suffix/1371600353552.jpeg";
                $salad="https://images.media-allrecipes.com/images/51520.jpg?width=420&height=237";
                $soup="http://tiphero.com/wp-content/uploads/2017/01/Tomato-Basil-Soup-FI-750x364.jpg";
                $chicken="http://subversify.com/wp-content/uploads/2017/04/chicken-011.jpg";

                //If statement selects image based on the category column

                 if ($row['category'] == 'Cakes'){
                      $link = $cake;

                 }else if ($row['category'] == 'Cookies'){    
                $link = $cookie;

                }else if ($row['category'] == 'Pies'){
                $link = $pies;

                }else if ($row['category'] == 'Salads and Dress'){
                $link = $salad;
                
                }else if ($row['category'] == 'Chicken'){
                $link = $chicken;

                }else if ($row['category'] == 'Soup'){
                $link = $soup;

                }else{
                $link = "https://cdn.vox-cdn.com/thumbor/-MUN-48SZgakNEBeDP4VlAP-NWs=/0x920:1600x2084/1820x1213/filters:focal(644x1550:900x1806):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/59223947/9781787474802.1522497283.jpg";}

                    echo  "<div class=\"container\">";

                    echo  "<div class=\"row\">";
                    echo    "<div class=\"col-md-4\">";
                    echo "<div class=\"card mb-4 box-shadow\">";
                    echo       "<img class=\"card-img-top\" src=$link data-holder-rendered=\"true\" style=\"height:225px; width: 225px; display: block\;\">";
                    echo      "<div class=\"card-body\">";
                    echo '<a href="food_test.php?recipeid=' . $row['ID'] . '">';
                    echo       "<p class=\"card-text\">" . $row['tilte'] . "</p>";
                    echo        "<div class=\"d-flex justify-content-between align-items-center\">";
                    echo          "<div class=\"btn-group\">";
                    echo          "</div>";
                    echo        "</div>";
                    echo      "</div>";    
                    echo   "</div>";
                    echo "</div>"; 
  }
}



    // if(! empty($_GET[SEARCHBOX]) && $result = getResults())
    // {
    // while($row = $result->fetch()){
    //   echo '<li>';
    //   echo '<a href="food_test.php?recipeid=' . $row['ID'] . '">';
    //   echo $row['tilte'];
    //   echo '</a>';
    //   echo '</li>';
    // }

    // }
    // $defaultid = 1;


?>
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
        </br>
      </footer>
      </body>
      </div>
      </div>

