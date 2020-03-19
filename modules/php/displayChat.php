<?php

    function displayChat($data, $chatPath) {
        
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
            } elseif($type == "file") {
                echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span></div>";
                $path = substr($chatPath, 0, strripos($chatPath, "/")+1);    //Pfad des Ordners
                $filename = substr($content, 3, -7-18); //3 unsichbare Zeichen am Anfang, 7 am Ende des Strings

                echo "<a href='{$path}/{$filename}' target='_blank'><img src='{$path}/{$filename}' class='image' /></a>";
                
                /* Code für Herausfinden von Dateityp
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $type = finfo_file($finfo, "{$path}/{$item}");
                    if($type == "text/plain") {
                        echo $item . "<br/>\n";
                    }
                    finfo_close($finfo);
                */

            }
            
            echo "<hr/>";
        }
    }

?>