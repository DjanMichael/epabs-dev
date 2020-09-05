<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <?php 
    
    foreach ($data as $row){
      echo 'Units::create(["id"=>"'. $row->no_units .'",
                        "division"=>"'. $row->division .'",
                        "section"=>"'. $row->section .'",
                        "status"=>"ACTIVE"]);<br/>';
    }
    
    ?>  
</body>
</html>