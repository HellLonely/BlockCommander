<?php
    session_start();
    require 'autoload.php';
    // session_unset();
    use Style\Style as Style;
    use SQLite\Connection as SQLiteConnection;
    use SQLite\DBManager as DBManager;


    $databaseInstance = SQLiteConnection::getSQLiteInstance();
    $connection = $databaseInstance->getConnection();
    $dbmanager = new DBManager($connection);


    if($dbmanager->tableExists('servers')){
        $serverInfo = $dbmanager->getMinecraftServerInfo();

        $_SESSION['serverData']['server_name'] = $serverInfo[0]['name'];
        $_SESSION['serverData']['server_address']  = $serverInfo[0]['ip'];
        $_SESSION['serverData']['server_port'] = $serverInfo[0]['port'];
        $_SESSION['serverData']['server_webpage']  = $serverInfo[0]['webpage'];

        header('Location: dashboard.php');
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!isset($_SESSION['serverData'])){
            $_SESSION['serverData'] = array();
        }

        foreach($_POST as $key => $val){
            $_SESSION['serverData'][$key] = $_POST[$key];
        }

        if(count($_SESSION['serverData']) > 3){
            if(!$dbmanager->tableExists('servers')){
                $dbmanager->makeMinecraftServerTable();
                $dbmanager->addServerInfo(
                    $_SESSION['serverData']['server_name'], 
                    $_SESSION['serverData']['server_address'], 
                    $_SESSION['serverData']['server_port'],
                    $_SESSION['serverData']['server_webpage']
                );
                header('Location: dashboard.php');
            }
        }
    }   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlockCommander</title>
</head>

<body>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form action='' method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <div class="flex justify-center items-center flex-col mb-6" >
                    <img src="assets/command_block.png" width="128" alt="">
                    <h3 class="block text-gray-700 text-lg font-semibold" >Block Commander</h3>
                </div>

                <?php if(!isset($_SESSION['serverData']['server_name'])){ ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Server Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username" name="server_name" type="text" placeholder="Server Name">
                    </div>
                <?php }else{ ?>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Minecraft Server Address
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username" name="server_address" type="text" placeholder="Server Address">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Port
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username" name="server_port" type="text" placeholder="Port">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            WebPage
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username" name="server_webpage" type="text" placeholder="WebPage">
                    </div>

                <?php } ?>
                <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Make
                    </button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2024 BlockCommander. All rights reserved.
            </p>
        </div>
    </div>
</body>

<?php echo Style::insertStyleFragment(); ?>

</html>