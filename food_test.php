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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="template-food.css" />

    <title>Title</title> <!-- change to what you want the tab's title to be -->

    <div  class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow p-3 mb-2 bg-dark text-white">
        <h5 class="my-0 mr-md-auto font-weight-normal">FnF</h5>
        <nav class="my-2 my-md-0 mr-md-3 p-3 mb-2 bg-dark text-white">
          <a class="p-2 text-white">Bob</a> <!--this will be the name of the logged in admin -->
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign Out</a> <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
      </div>

</head>
<body>


    <div>
    <br>
        <?php
              $pdo = new PDO($connString, $user, $pass);
              $sql = "SELECT * FROM food where title='Sweet and Sour Pork' ";
              $result = $pdo->query($sql);
              $row = $result->fetch();
            echo  "<h2 id= \"title\" class=\"font-weight-strong ml-5 mt-0-2\">" . $row['title'] . "<h2>";
        ?>

    
    <h5 class="font-weight-strong ml-5 mt-0-2">x min | rating <h5>
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
              $sql = "SELECT * FROM food where title='Sweet and Sour Pork' ";
              $result = $pdo->query($sql);
              $row = $result->fetch();
              echo "<ul>";
              echo "<li>" . $row['directions'] . "</li>";
              echo "</ul>";
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
                $sql = "SELECT `quantity`, `unit01`, `ingredient01`, `quantity02`, `unit02`, `ingredient02`, `quantity03`, `unit03`, `ingredient03`, `quantity04`, `unit04`, `ingredient04`, `quantity05`, `unit05`, `ingredient05`, `quantity06`, `unit06`, `ingredient06`, `quantity07`, `unit07`, `ingredient07`, `quantity08`, `unit08`, `ingredient08`, `quantity09`, `unit09`, `ingredient09`, `quantity10`, `unit10`, `ingredient10`, `quantity11`, `unit11`, `ingredient11`, `quantity12`, `unit12`, `ingredient12`, `quantity13`, `unit13`, `ingredient13`, `quantity14`, `unit14`, `ingredient14`, `quantity15`, `unit15`, `ingredient15`, `quantity16`, `unit16`, `ingredient16`, `quantity17`, `unit17`, `ingredient17`, `quantity18`, `unit18`, `ingredient18`, `quantity19`, `unit19`, `ingredient19` FROM `food` WHERE title='Sweet and Sour Pork'";
                
                $result = $pdo->query($sql);
                $row = $result->fetch();
                $null = ' ';
                if ($row['ingredient01'] != $null){
                  echo "<li>" . $row['quantity'] . " " . $row['unit01'] . " " .$row['ingredient01'] . "</li>";
                echo "<li>" . $row['quantity02'] . " " . $row['unit02'] . " " .$row['ingredient02'] . "</li>";
                echo "<li>" . $row['quantity03'] . " " . $row['unit03'] . " " .$row['ingredient03'] . "</li>";
                echo "<li>" . $row['quantity04'] . " " . $row['unit04'] . " " .$row['ingredient04'] . "</li>";
                echo "<li>" . $row['quantity05'] . " " . $row['unit05'] . " " .$row['ingredient05'] . "</li>";
                echo "<li>" . $row['quantity06'] . " " . $row['unit06'] . " " .$row['ingredient06'] . "</li>";
                echo "<li>" . $row['quantity07'] . " " . $row['unit07'] . " " .$row['ingredient07'] . "</li>";
                echo "<li>" . $row['quantity08'] . " " . $row['unit08'] . " " .$row['ingredient08'] . "</li>";
                echo "<li>" . $row['quantity09'] . " " . $row['unit09'] . " " .$row['ingredient09'] . "</li>";
                echo "<li>" . $row['quantity10'] . " " . $row['unit10'] . " " .$row['ingredient10'] . "</li>";
                echo "<li>" . $row['quantity11'] . " " . $row['unit11'] . " " .$row['ingredient11'] . "</li>";
                echo "<li>" . $row['quantity12'] . " " . $row['unit12'] . " " .$row['ingredient12'] . "</li>";
                echo "<li>" . $row['quantity13'] . " " . $row['unit13'] . " " .$row['ingredient13'] . "</li>";
                echo "<li>" . $row['quantity14'] . " " . $row['unit14'] . " " .$row['ingredient14'] . "</li>";
                echo "<li>" . $row['quantity15'] . " " . $row['unit15'] . " " .$row['ingredient15'] . "</li>";
                echo "<li>" . $row['quantity16'] . " " . $row['unit16'] . " " .$row['ingredient16'] . "</li>";
                echo "<li>" . $row['quantity17'] . " " . $row['unit17'] . " " .$row['ingredient17'] . "</li>";
                echo "<li>" . $row['quantity18'] . " " . $row['unit18'] . " " .$row['ingredient18'] . "</li>";
                echo "<li>" . $row['quantity19'] . " " . $row['unit19'] . " " .$row['ingredient19'] . "</li>"; 
            
                      
        ?>

    </td>
    </table>
    <div>


</body>
</html>
