<?php

    function readChat($path) {
        $handle = fopen($path, "r");
        if ($handle) {
            $data = [];     //Aufbau des Arrays pro Zeile: [Nachrichtentyp, Datum, Zeit, Absender, Inhalt]
            $firstline = true;
            while (($line = fgets($handle)) !== false) {
                
                if ($firstline) {
                    $date = substr($line, 0, 8);
                    $time = substr($line, 10, 5);
                    $message = substr($line, 18, -1);
                    $data[] = ["notification", $date, $time, "SYSTEM", $message];
                    $firstline = false;
                } elseif(substr($line, 15, 3) == " - ") {   //falls neue Nachricht
                    $date = substr($line, 0, 8);
                    $time = substr($line, 10, 5);
                    $position = strpos(substr($line, 18), ":"); //erstes Vorkommen des Doppelpunkts
                    $name = substr($line, 18, $position);
                    $message = substr($line, 20+$position);

                    $data[] = ["message", $date, $time, $name, $message];
                } else {                                    //falls neue Zeile in gleicher Nachricht
                    $data[count($data)-1][4] .= substr($line, 0, -1);
                }
            }
            fclose($handle);
        } else {
            echo "<b>Fehler:</b> Datei im Pfad \"" . $path .  "\"nicht gefunden.";
        } 
        return $data;
    }

?>