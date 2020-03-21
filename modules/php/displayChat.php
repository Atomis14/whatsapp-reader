<?php

    function displayChat($data, $chatPath) {
        
        foreach($data AS $message) {
            $type = $message[0];
            $date = $message[1];
            $time = $message[2];
            $name = $message[3];
            $content = nl2br(htmlspecialchars($message[4]));

            if($type == "notification") {
                echo "<hr>";
                echo "<div class='notification'><span>{$content}</span></div>";
            } elseif($type == "message") {
                echo "<hr>";
                echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span></div>";
                echo $content;
            } elseif($type == "file") {
                echo "<hr>";
                echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span></div>";
                $path = substr($chatPath, 0, strripos($chatPath, "/")+1);    //Pfad des Ordners
                $filename = substr(str_replace(" (Datei angehängt)", "", $content), 3, -7);   //3 unsichbare Zeichen am Anfang, 7 am Ende des Strings
                $filetype = str_replace(".", "", substr($filename, -4));    //letzte 4 Zeichen, bei 3-Zeichen-Endung . entfernen
                if($filetype == "jpg") {
                    echo $filename . "<br>";
                    echo "<a href='{$path}/{$filename}' target='_blank'><img src='{$path}/{$filename}' class='image' /></a>";
                } elseif($filetype == "opus") {
                    echo "<audio controls><source src='{$path}/{$filename}' type='audio/ogg' codecs=opus>Your browser does not support the audio tag.</audio>";
                } else {
                    echo "<a href='{$path}/{$filename}' target='_blank'>{$filename}</a>";
                }
            } elseif($type == "caption") {
                echo "<br>" . $content;
            }
        }
    }

    /* Code für Herausfinden von Dateityp
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($finfo, "{$path}/{$item}");
        if($type == "text/plain") {
            echo $item . "<br>\n";
        }
        finfo_close($finfo);
    */

?>