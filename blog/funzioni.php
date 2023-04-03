<?php

function registra($titolo, $testo) {

    global $BLOGFILE;
    $contenuto = file($BLOGFILE); 
    $penultimo = explode("#", $contenuto[0]);
    $ultimo = $penultimo[0]+1;
    $fp = fopen($BLOGFILE, "w"); 
    $titolo = rendiConforme($titolo);
    $testo = rendiConforme($testo);
    $post = $ultimo ."#".date("Y-m-d, G:i") . "#". $titolo . "#" . $testo . "\n";
    fwrite($fp, $post); 
    if(count($contenuto) > 0)  
        foreach($contenuto as$post) fwrite($fp, $post);
    fclose($fp); // chiudo il file
    }

function rendiConforme($testo) {

        $testo = nl2br(htmlentities(stripslashes($testo)));

        $testo = str_replace("\r\n", "", $testo);
        // sistemi windows
        $testo = str_replace("\n", "", $testo); 
        // sistemi unix
        $testo = str_replace("\r", "", $testo); // sistemi MacOS
        $testo=str_replace("#","&hash;",$testo);
        return$testo;
    }

function leggi($da, $quanti = NULL) {

    global $BLOGFILE;
    $risultato = array();
    $contenuto = file($BLOGFILE); // leggo il contenuto

    if(is_null($quanti))
        $quanti = count($contenuto);

    for ($i = $da; ($i -$da < $quanti) && ($i <= count($contenuto)); $i++) {
        // estraggo un post dal file e lo aggiungo all'array 
        $risultato; 
        $post = explode("#", $contenuto[$i -1]);
        $risultato[] = $post;
    }
    
    return $risultato;
    }

function numeroPost() {

    global $BLOGFILE;
    $blog = file($BLOGFILE);// restituisco il numero di righe del file
    return count($blog); 
    }
    
function utenteValido($utente, $password) {

    global $UTENTE, $PASSWORD;
    return($utente == $UTENTE && $password == $PASSWORD);
    }

?>