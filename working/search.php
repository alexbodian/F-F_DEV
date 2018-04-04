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
  define('SEARCHBOX', 'txtSearch');

  function getSearchFor()
  {
    $value = "";
    if(isset($_GET[SEARCHBOX])){
      $value =  $_GET[SEARCHBOX];
    }
    return $value;
  }


  // function getDB()
  // {


  //   $connString = "mysql:host=" . DBHOST . ";dbname=" .DBNAME;
  //   $user = "root";
  //   $pass = "wit123";

  //   $pdo = new PDO($connString, $user, $pass);
  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  //   // $user = DBUSER;
  //   // $pass = DBPASS;
  //   // $connString = "mysql:host=" . DBHOST . ";dbname=" .DBNAME;
  //   // $pdo = new PDO($connString, $user, $pass);
  //   return pdo;
  // }

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
  <form method="get" action="search.php";>
  <input type="search" 
         name="<?php echo SEARCHBOX; ?>"
         placeholder="Search.."
         value="<?php echo getSearchFor(); ?>"" />
  <input type="submit"/>


<?php




if (! empty ($_GET[SEARCHBOX]) && $result = getResults())
{
  while ($row = $result->fetch())
  {
          echo '<li>';
      echo '<a href="food_test.php?recipeid=' . $row['ID'] . '">';
      echo $row['tilte'];
      echo '</a>';
      echo '</li>';
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



</body>
</html>