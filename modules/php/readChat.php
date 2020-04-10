<?php

    function readChat($path) {
        $handle = fopen($path, "r");
        if ($handle) {
            $data = [];     //Aufbau des Arrays pro Zeile: [Nachrichtentyp, Datum, Zeit, Absender, Inhalt]
            while (($line = fgets($handle)) !== false) {
                $date = substr($line, 0, 8);
                $time = substr($line, 10, 5);
                if (substr($line, 15, 3) == " - " && strpos(substr($line, 18), ":") == false) {     //Systembenachrichtigung
                    $message = substr($line, 18, -1);
                    $data[] = ["notification", $date, $time, "SYSTEM", $message];
                } elseif(substr($line, 15, 3) == " - ") {                                           //neue Nachricht
                    $position = strpos(substr($line, 18), ":"); //erstes Vorkommen des Doppelpunkts
                    $name = substr($line, 18, $position);
                    $message = htmlspecialchars(substr($line, 20+$position));
                    if(strpos(substr($line, 18), "(Datei angehängt)")) {    //Datei angehängt
                        $data[] = ["file", $date, $time, $name, $message];
                    } else {                                                //normale Textnachricht
                        $data[] = ["message", $date, $time, $name, $message];
                    }
                } elseif($data[count($data)-1][0] == "file") {                                      //Bildunterschrift
                    $data[] = ["caption", $date, $time, $name, $line];
                } else {                                                                            //neue Zeile in normaler Nachricht
                    $data[count($data)-1][4] .= substr($line, 0);
                }
            }
            fclose($handle);
        } else {
            echo "<b>Fehler:</b> Datei im Pfad \"" . $path .  "\"nicht gefunden.";
        } 
        return $data;
    }

?>