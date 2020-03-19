<?php
    require_once "modules/php/readChat.php";
    require_once "modules/php/displayChat.php";
    require_once "modules/php/readDirectory.php";
    
    $data = readChat("chats-dev/Gwen/chat.txt");
    
    echo "<ul>";
    $directory = readDirectory("./chats");
    echo "</ul>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatsApp Chats</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body onload=' location.href="#anchor" '>
    <div id="chat">
        <?php
            displayChat($data);
        ?>
    </div>
    <div id="anchor"></div>
</body>
</html>