<?php 

    use Style\Style as StyleObject;
    include ('Style/Style.php');

    use File\File;
    use File\ServerProperties;
    require 'File/ServerProperties.php';
    require 'File/File.php';


    var_dump(ServerProperties::getData());


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
    echo StyleObject::insertStyleFragment();  

?>
</html>