<?php

    function readDirectory($path) {
        $data = scandir($path);
        foreach($data AS $key => $item) {
            if($item[0] == ".") {
                unset($data[$key]);
                continue;
            } else {
                if(is_dir($path."/".$item)) {
                    //echo "<li><b>Ordner: </b>" . $path."/".$item ."</li>\n";
                    //echo "<ul>\n";
                    readDirectory($path."/".$item);
                    //echo "</ul>\n";
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

?>