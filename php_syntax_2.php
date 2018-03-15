<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="#">FnF</a>
      </div>
      <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Food</a></li>
          <li><a href="#">Work Outs</a></li>
          <li><a><input class="form-control" id="myInput" type="text" placeholder="Search.."></a></li>
      </ul>
  </div>
</nav>
  <div class='container'>
  <br>
        <?php
          echo "<html><body id='myTable'><table class='table table-bordered table-striped'>\n\n";
          $f = fopen("recipes.csv", "r");
          while (($line = fgetcsv($f)) !== false) {
                  
                  echo "<tr>";
                  foreach ($line as $row) {
                          echo "<td>" . htmlspecialchars($row) . "</td>";
                  }
               echo "</tr>";
          }
          fclose($f);
          echo "\n</table></body></html>";
            ?>
      </div>

      <script>
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });
      </script>
</body>
</html>
