<?php
    require_once "modules/php/readChat.php";
    require_once "modules/php/displayChat.php";
    require_once "modules/php/readDirectory.php";
    
    $chats = readDirectory("./chats");
    $chat = $_GET["chat"];
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
            $data = readChat("{$chat}");
            displayChat($data, $chat);
        ?>
    </div>
    <div id="anchor"></div>
</body>
</html>