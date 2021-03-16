<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->siteTitle(); ?></title>
    <link href="<?=PROOT?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">
    
    <?= $this->content('head');?>


  </head>
  <body>
    <?= $this->content('body'); ?>




    <script src="<?=PROOT?>js/jquery.min.js"></script>
    <script src="<?=PROOT?>js/bootstrap.min.js"></script>
  </body>
</html>