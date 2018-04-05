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
    ?>
<?php

  if(isset($_GET["recipeid"]))
  {
    $recipe_id = $_GET["recipeid"];
  }
  else
  {
    $recipe_id = "1";
  }

?>

<!doctype html>
<html lang="en">
<head> 
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> F&F Home Page</title>


   <link href= "dist/css/bootstrap.min.css" rel="stylesheet">

   <link href= "assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   <link href= "album.css" rel="stylesheet">

</head>
<body>
<div class="navbar-wrapper">
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
                <li><a href="#about">Blog</a></li>
                <li><a href="#signin">Sign Up</a></li>
                <li> <form method="get" action="search.php";>
                <p></p>
                            <input type="search" 
                                   name="<?php echo SEARCHBOX; ?>"
                                   placeholder="Search.."
                                   value="<?php echo getSearchFor(); ?>"" />
                            <input type="submit"/></form></li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

    <div>
    <br>
        <?php
              
              // Recipe must have single quotes around recipe name or else wont work
              


              $pdo = new PDO($connString, $user, $pass);
              $sql = "SELECT * FROM food where ID=" . $recipe_id;
              $result = $pdo->query($sql);
              $row = $result->fetch();
            echo  "<h2 id= \"title\" class=\"font-weight-strong ml-5 mt-0-2\">" . $row['tilte'] . "<h2>";

            // echo   "<h5 class='font-weight-strong ml-5 mt-0-2'>x min | rating <h5> ";

        ?>

    
    </div>

<center>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
      <img src="blueberry-coffee-cake-low-res-1.jpg" class='img-thumbnail' >
    </div>
<center


<div id="recipe" align="left">
  <br>
  <br>
  <br>

  <!-- <p class="text-left" ><h4 " ">Steps<h4></p> -->
  <table border = 0; cellpadding="10" text-align="right">
    <th></th>
    <th><h2>Steps<h2></th>
    <th></th>
  </table>
</div>

<div id= "steps">

<table cellpadding="0" text-align="left">
  <td style="padding-left:30px">

        <?php

              $pdo = new PDO($connString, $user, $pass);
              $sql = "SELECT * FROM food where ID=". $recipe_id;
              $result = $pdo->query($sql);
              $row = $result->fetch();
              echo "<ul>";
              $sentences = explode(".", $row['directions'] );
              for($i = 0; $i < count($sentences); $i++)
              {
                if($sentences[$i]!= "")
                {
                  echo "<li>" . $sentences[$i] . "</li>";
                }
                
              }


              // echo "</ul>";
        ?>
  </td>
</table>
<div>

  <div id="ingredients" align="left">


    <!-- <p class="text-left" ><h4 " ">Steps<h4></p> -->
    <table border = 0; cellpadding="" text-align="right">
      <th></th>
      <th><h2>Ingredients<h2></th>
      <th></th>
    </table>
  </div>

  <div id= "steps">

    <table cellpadding="0" text-align="left">
    <td style="padding-left:30px">
          <?php
                $pdo = new PDO($connString, $user, $pass);
                $sql = "SELECT `quantity`, `unit01`, `ingredient01`, `quantity02`, `unit02`, `ingredient02`, `quantity03`, `unit03`, `ingredient03`, `quantity04`, `unit04`, `ingredient04`, `quantity05`, `unit05`, `ingredient05`, `quantity06`, `unit06`, `ingredient06`, `quantity07`, `unit07`, `ingredient07`, `quantity08`, `unit08`, `ingredient08`, `quantity09`, `unit09`, `ingredient09`, `quantity10`, `unit10`, `ingredient10`, `quantity11`, `unit11`, `ingredient11`, `quantity12`, `unit12`, `ingredient12`, `quantity13`, `unit13`, `ingredient13`, `quantity14`, `unit14`, `ingredient14`, `quantity15`, `unit15`, `ingredient15`, `quantity16`, `unit16`, `ingredient16`, `quantity17`, `unit17`, `ingredient17`, `quantity18`, `unit18`, `ingredient18`, `quantity19`, `unit19`, `ingredient19` FROM food WHERE ID=".$recipe_id;
                
                $result = $pdo->query($sql);
                $row = $result->fetch();


                if($row['ingredient01'] != '')
                {
                  echo "<li>" . $row['quantity'] . " " . $row['unit01'] . " " .$row['ingredient01'] . "</li>";
                }

                if($row['ingredient02'] != '')
                {
                  echo "<li>" . $row['quantity02'] . " " . $row['unit02'] . " " .$row['ingredient02'] . "</li>";
                }

                if($row['ingredient03'] != '')
                {
                  echo "<li>" . $row['quantity03'] . " " . $row['unit03'] . " " .$row['ingredient03'] . "</li>";
                }

                if($row['ingredient04'] != '')
                {
                  echo "<li>" . $row['quantity04'] . " " . $row['unit04'] . " " .$row['ingredient04'] . "</li>";
                }

                if($row['ingredient05'] != '')
                {
                  echo "<li>" . $row['quantity05'] . " " . $row['unit05'] . " " .$row['ingredient05'] . "</li>";
                }

                if($row['ingredient06'] != '')
                {
                  echo "<li>" . $row['quantity06'] . " " . $row['unit06'] . " " .$row['ingredient06'] . "</li>";
                }

                if($row['ingredient07'] != '')
                {
                  echo "<li>" . $row['quantity07'] . " " . $row['unit07'] . " " .$row['ingredient07'] . "</li>";
                }

                if($row['ingredient08'] != '')
                {
                  echo "<li>" . $row['quantity08'] . " " . $row['unit08'] . " " .$row['ingredient08'] . "</li>";
                }

                if($row['ingredient09'] != '')
                {
                  echo "<li>" . $row['quantity09'] . " " . $row['unit09'] . " " .$row['ingredient09'] . "</li>";
                }

                if($row['ingredient10'] != '')
                {
                  echo "<li>" . $row['quantity10'] . " " . $row['unit10'] . " " .$row['ingredient10'] . "</li>";
                }

                if($row['ingredient11'] != '')
                {
                  echo "<li>" . $row['quantity11'] . " " . $row['unit11'] . " " .$row['ingredient11'] . "</li>";
                }

                if($row['ingredient12'] != '')
                {
                  echo "<li>" . $row['quantity12'] . " " . $row['unit12'] . " " .$row['ingredient12'] . "</li>";
                }

                if($row['ingredient13'] != '')
                {
                  echo "<li>" . $row['quantity13'] . " " . $row['unit13'] . " " .$row['ingredient13'] . "</li>";
                }

                if($row['ingredient14'] != '')
                {
                  echo "<li>" . $row['quantity14'] . " " . $row['unit14'] . " " .$row['ingredient14'] . "</li>";
                }
                
                if($row['ingredient15'] != '')
                {
                  echo "<li>" . $row['quantity15'] . " " . $row['unit15'] . " " .$row['ingredient15'] . "</li>";
                }

                if($row['ingredient16'] != '')
                {
                  echo "<li>" . $row['quantity16'] . " " . $row['unit16'] . " " .$row['ingredient16'] . "</li>";
                }

                if($row['ingredient17'] != '')
                {
                  echo "<li>" . $row['quantity17'] . " " . $row['unit17'] . " " .$row['ingredient17'] . "</li>";
                }

                if($row['ingredient18'] != '')
                {
                  echo "<li>" . $row['quantity18'] . " " . $row['unit18'] . " " .$row['ingredient18'] . "</li>";
                }

                if($row['ingredient19'] != '')
                {
                  echo "<li>" . $row['quantity19'] . " " . $row['unit19'] . " " .$row['ingredient19'] . "</li>";
                }


                
                // echo "<li>" . $row['quantity02'] . " " . $row['unit02'] . " " .$row['ingredient02'] . "</li>";
                // echo "<li>" . $row['quantity03'] . " " . $row['unit03'] . " " .$row['ingredient03'] . "</li>";
                // echo "<li>" . $row['quantity04'] . " " . $row['unit04'] . " " .$row['ingredient04'] . "</li>";
                // echo "<li>" . $row['quantity05'] . " " . $row['unit05'] . " " .$row['ingredient05'] . "</li>";
                // echo "<li>" . $row['quantity06'] . " " . $row['unit06'] . " " .$row['ingredient06'] . "</li>";
                // echo "<li>" . $row['quantity07'] . " " . $row['unit07'] . " " .$row['ingredient07'] . "</li>";
                // echo "<li>" . $row['quantity08'] . " " . $row['unit08'] . " " .$row['ingredient08'] . "</li>";
                // echo "<li>" . $row['quantity09'] . " " . $row['unit09'] . " " .$row['ingredient09'] . "</li>";
                // echo "<li>" . $row['quantity10'] . " " . $row['unit10'] . " " .$row['ingredient10'] . "</li>";
                // echo "<li>" . $row['quantity11'] . " " . $row['unit11'] . " " .$row['ingredient11'] . "</li>";
                // echo "<li>" . $row['quantity12'] . " " . $row['unit12'] . " " .$row['ingredient12'] . "</li>";
                // echo "<li>" . $row['quantity13'] . " " . $row['unit13'] . " " .$row['ingredient13'] . "</li>";
                // echo "<li>" . $row['quantity14'] . " " . $row['unit14'] . " " .$row['ingredient14'] . "</li>";
                // echo "<li>" . $row['quantity15'] . " " . $row['unit15'] . " " .$row['ingredient15'] . "</li>";
                // echo "<li>" . $row['quantity16'] . " " . $row['unit16'] . " " .$row['ingredient16'] . "</li>";
                // echo "<li>" . $row['quantity17'] . " " . $row['unit17'] . " " .$row['ingredient17'] . "</li>";
                // echo "<li>" . $row['quantity18'] . " " . $row['unit18'] . " " .$row['ingredient18'] . "</li>";
                // echo "<li>" . $row['quantity19'] . " " . $row['unit19'] . " " .$row['ingredient19'] . "</li>"; 
            
                      
        ?>

    </td>
    </table>
  
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 FnF Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->
    
  </body>
</html>
