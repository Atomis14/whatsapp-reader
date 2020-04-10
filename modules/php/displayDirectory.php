<?php

    function displayDirectory($data) {
        //echo "<a href='index.php?chat={$url}'>" . substr($item, 17, -4) . "</a> | ";
        foreach($data AS $chat) {
            $name = $chat[0];
            $url = $chat[1];
            
            //echo "<a onclick='getChat(\"{$name}\")' href='index.php?chat={$url}'>{$name}</a> | ";
            echo "<a onclick='getChat(\"{$url}\")' href='#'>{$name}</a> | ";
        }
    }

?>