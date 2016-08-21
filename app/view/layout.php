<!doctype html>

<html>
<head>
  <meta charset="utf-8">

  <title><?php echo $this->title; ?></title>

  <link rel="stylesheet" type="text/css" 
  	href="<?php echo $this->baseUrl; ?>websource/css/style.css" />
    
</head>
<body>

  <div class="wrapper">

    <h1>Layout: Welcome to Sitewald Php framework!</h1>

    <!--CONTENT-->
    <?php require_once($this->view); ?>
    <!--END CONTENT-->

  </div>

</body>
</html>

