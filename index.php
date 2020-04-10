<?php
    require_once "modules/php/readChat.php";
    require_once "modules/php/displayChat.php";
    require_once "modules/php/readDirectory.php";
    require_once "modules/php/displayDirectory.php";
    
    $chats = readDirectory("chats", []);

    if(isset($_GET["chat"])) {
        $chat = $_GET["chat"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WhatsApp Chats</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body onload=' location.href="#anchor" '>
    <div id="chats">
        <?php displayDirectory($chats); ?>
    </div>
    <div id="chat">
        <?php
            //displayChat($chat);
        ?>
    </div>
    <div id="anchor"></div>

    <script src="modules/js/getChat.js"></script>
</body>
</html>