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
  
  if(isset($_GET["recipeid"]))
      {
        $recipe_id = $_GET["recipeid"];
      }
  else
      {
        $recipe_id = "1";
      }
 define('SEARCHBOX', 'txtSearch');

  function getSearchFor()
  {
    $value = "";
    if(isset($_GET[SEARCHBOX])){
      $value =  $_GET[SEARCHBOX];
    }
    return $value;
  }

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

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="template-food.css" />
    <link href= "dist/css/bootstrap.min.css" rel="stylesheet">
   <link href= "assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href= "album.css" rel="stylesheet">
    <title>Title</title> <!-- change to what you want the tab's title to be -->


</head>
<body>
<div class="navbar-wrapper">
  <div>
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
                <li><a href="http://localhost/F-F_DEV/homepage.php#">Home</a></li>
                <li><a href="#about">Blog</a></li>
                <li><a href="http://localhost/F-F_DEV/form.php">Sign Up</a></li>
               <li> <form method="get" action="search.php";>
                <p></p>
                <input type="search"
                                  name="<?php echo SEARCHBOX; ?>"
                                   placeholder="Search.."
                                   value=""<?php echo getSearchFor(); ?>"" />
                <input type="submit"/></form></li>
               </form>
</li>
</ul>
</div>
</div>
</nav>
  </div>
</div>





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
        

    
  echo  "</div>";

echo "<center>";
echo    "<div class=\"col-lg-4 col-md-4 col-sm-5 col-xs-5 \">";
echo      "<img src=\"$link\" class=\"img-thumbnail\" align=\"left\">";
echo     "</div>";
echo "</center>";


?>

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
                      
        ?>

    </td>
    </table>
   </br> 
   </br> 
   </br> 
 <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 FnF Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

</div>
</body>
</html>
