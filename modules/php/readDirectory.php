<?php

    function readDirectory($path, $data) {
        $rawData = scandir($path);
        foreach($rawData AS $key => $item) {
            if($item[0] !== ".") {  //versteckte Ordner nicht berücksichtigen
                if(is_dir($path."/".$item)) {
                    $data = readDirectory($path."/".$item, $data);
                } elseif(substr($item, 0, 17) == "WhatsApp Chat mit") {
                    $url = urlencode($path."/".$item);
                    $name = substr($item, 17, -4);
                    $data[] = [$name, $url];
                }
            }
        }
        return $data;
    }


/* 

                    //echo "<a href='index.php?chat={$url}'>" . substr($item, 17, -4) . "</a> | ";
                    //var_dump($data);
                    //echo "<br><br>";

    function readDirectory($path) {
        $data = scandir($path);
        foreach($data AS $key => $item) {
            if($item[0] == ".") {
                unset($data[$key]);
                continue;
            } else {
                if(is_dir($path."/".$item)) {
                    readDirectory($path."/".$item);
                } elseif(substr($item, 0, 17) == "WhatsApp Chat mit") {
                    //echo "\t<li><a href='{$path}/{$item}'>" . $item . "</a></li>\n";
                    //echo $path ."<br>";
                    $url = urlencode($path."/".$item);
                    echo "<a href='index.php?chat={$url}'>" . substr($item, 17, -4) . "</a> | ";
                }
            }
        }
        return $data;
    }

    163 CHATS!!

*/

?>