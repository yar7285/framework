<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=$this->getMeta();?>
</head>
<body>
<h1>Default layouts</h1>
<?=$content?>

<?php
    $logs = \RedBeanPHP\R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    print_r( $logs->grep( 'SELECT' ) );
?>

</body>
</html>