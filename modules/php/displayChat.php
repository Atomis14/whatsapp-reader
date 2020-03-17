<?php

    function displayChat($data) {
        foreach($data AS $message) {
            $type = $message[0];
            $date = $message[1];
            $time = $message[2];
            $name = $message[3];
            $content = nl2br($message[4]);
            
            if($type == "notification") {
                echo "<div class='notification'><span>{$content}</span></div>";
            } elseif($type == "message") {
                echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span></div>";
                echo "{$content}";
            }
            
            echo "<hr/>";
        }
    }

?>