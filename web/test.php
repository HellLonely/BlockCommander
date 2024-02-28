<?php 

    use Style\Style as StyleObject;
    include ('Styles/Style.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="bg-blue-500">3</div>
</body>


<?php
    // Tailwind Import 
    echo StyleObject::insertStyleFragment();  

    echo StyleObject::getTailwindLink();
?>
</html>