<?php 
    require 'autoload.php';
    use File\ServerProperties;
    use File\Plugins;
    use Style\StyleObject;

    var_dump(ServerProperties::getData());

    var_dump($obj = new Plugins());


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>


<?php
    // Tailwind Import 
    //echo StyleObject::insertStyleFragment();  

?>
</html>