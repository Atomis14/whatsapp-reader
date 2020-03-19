<?php

    function readDirectory($path) {
        $data = scandir($path);
        foreach($data AS $key => $item) {
            if($item[0] == ".") {
                unset($data[$key]);
                continue;
            } else {
                if(is_dir($path."/".$item)) {
                    echo "<li><b>Ordner: </b>" . $path."/".$item ."</li>\n";
                    echo "<ul>\n";
                    readDirectory($path."/".$item);
                    echo "</ul>\n";
                } else {
                    echo "\t<li><a href='{$path}/{$item}'>" . $item . "</a></li>\n";
                    if(filetype() == "txt") {

                    }
                }
            }
        }
        return $data;
    }

?>