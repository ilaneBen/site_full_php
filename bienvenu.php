<?php 
session_start()
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenu</title>
 </head>
 <body>
    <?php 
    echo "bonjour " . $_SESSION['email'];
    ?>
 </body>
 </html>