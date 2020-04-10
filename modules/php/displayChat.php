<?php

    require_once "readChat.php";

    $chatPath = "../../" . $_GET["path"];
        
    $data = readChat($chatPath);

    foreach($data AS $message) {
        $type = $message[0];
        $date = $message[1];
        $time = $message[2];
        $name = $message[3];
        $content = nl2br($message[4]);

        if(strpos($content, "Medien ausgeschlossen")) {
            $cssClasses = "bubble deleted";
        } else {
            $cssClasses = "bubble";
        }

        echo "<div class='{$cssClasses}'>";

        if($type == "notification") {
            echo "<div class='notification'><span>{$content}</span></div>";
        } elseif($type == "message") {
            echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span> | {$type}</div>";
            echo $content;
        } elseif($type == "file") {
            echo "<div class='meta'><span class='name'>{$name}</span> <span class='time'>{$date} um {$time}</span> | {$type}</div>";
            $path = substr($chatPath, 6, strripos($chatPath, "/")-5);    //Pfad des Ordners
            /* echo "\n\n".strripos($chatPath, "/")."\n\n";
            echo "\n\n{$chatPath}\n\n";
            echo "\n\n{$path}\n\n"; */
            $filename = substr(str_replace(" (Datei angehängt)", "", $content), 3, -7);   //3 unsichbare Zeichen am Anfang, 7 am Ende des Strings
            $filetype = str_replace(".", "", substr($filename, -4));    //letzte 4 Zeichen, bei 3-Zeichen-Endung . entfernen
            if($filetype == "jpg") {
                echo $filename . "<br>";
                echo "<a href='{$path}{$filename}' target='_blank'><img src='{$path}{$filename}' class='image' /></a>";
            } elseif($filetype == "opus") {
                echo $filename . "<br>";
                echo "<audio controls><source src='{$path}/{$filename}' type='audio/ogg' codecs=opus>Audio-Tag wird nicht unterstützt.</audio>";
            } elseif($filetype == "mp4") {
                echo $filename . "<br>";
                echo "<video width='320' height='auto' controls><source src='{$path}{$filename}' type='video/mp4'></video>";
            } else {
                echo "<a href='{$path}{$filename}' target='_blank'>{$filename}</a>";
            }
        } elseif($type == "caption") {
            echo "<br>" . $content;
        }

        echo "</div>";

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