<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./static/css/adminstyle.css">

  <title><?php echo $title; ?></title>
</head>
<body>
  <?php
  if(file_exists($header))
  {
    include_once($header);
  }

  if(file_exists($template))
  {
    include_once($template);
  }
  ?>
  
  <script src="./static/js/script.js"></script>
  <script
      src="https://kit.fontawesome.com/132c0e1345.js"
      crossorigin="anonymous">
  </script>
</body>
</html>