<?php 
    require 'autoload.php';
    use File\ServerProperties;
    use File\Plugins;
    use Style\StyleObject;
    use SQLite\DBManager;
    use SQLite\Connection;
    use File\Mods;

    // var_dump(ServerProperties::getData());
    // $obj = new Plugins();
    // // $obj->deletePlugin('arclight-forge-1.20.4-1.0.2.jar');
    // var_dump($obj-> getPluginsList());

    // $obj2 = new Mods();
    // var_dump($obj2->getModsList());
    // // $obj2->deleteMod('CraftPresence-2.2.6+1.19.4.jar');

    $databaseInstance = Connection::getSQLiteInstance();
    $connection = $databaseInstance->getConnection();
    $dbmanager = new DBManager($connection);

    // $dbmanager->deleteServersTable();


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