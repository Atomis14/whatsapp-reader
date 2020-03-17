<?php
    require_once "modules/php/readChat.php";
    require_once "modules/php/displayChat.php";
    $data = readChat("chats-dev/chat.txt");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatsApp Chats</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="chat">
        <?php
            displayChat($data);
        ?>
    </div>
</body>
</html>