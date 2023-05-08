<?php 
// Includi il file di configurazione
require_once("config.php");
require_once './aws/vendor/autoload.php';
require_once ("./aws/vendor/c.php");

use Aws\S3\S3Client;
use Aws\Exception\AwsException;



// Definisci una funzione che carica i file presenti nella directory $dir che rientrano nei formati ammessi
function caricaDirectory($dir) {

    // Apri la directory e gestisci eventuali errori
    $dh = opendir($dir) or die("Errore nell'apertura della directory ". $dir);

    // Inizializza un array vuoto per contenere i nomi dei file
    $contenuto = array();

    // Leggi il contenuto della directory
    while( ($file = readdir($dh)) != FALSE) {
        // Se il file non è una directory e rientra nei formati ammessi, aggiungilo all'array
        if(!is_dir($file) && controllaFormato($file))
            $contenuto[] = $file; 
    }

    // Chiudi la directory e restituisci l'array di nomi dei file
    closedir($dh);
    return $contenuto;
}

/*ORA UTILIZZO S3 */
function caricaDirectoryDaS3($bucketName) {


    global $KEY, $SECRETKEY;
    
    //preliminari 

    //array elements
    $elements= Array();
    // credenziali
    $credentials= new Aws\Credentials\Credentials ($KEY, $SECRETKEY); 
    
    $s3= new Aws\S3\S3Client([  'version' => 'latest',
                                'region' => 'eu-central-1', 
                                'credentials'=> $credentials]);
    
    $elenco=$s3->ListObjects(array('Bucket' => $bucketName));    
    if($elenco->get("Contents")){
        // cerco elementi
        foreach($elenco->get("Contents") as $object) {
            // aggiungo elemento ad array
            $elements[] = $object['Key'];
        }
    }
     
    return $elements;
} 



// Definisci una funzione che genera un link all'immagine con indice $indice_immagine e nome file $file
function generaLinkImmagine($indice_immagine, $file) {
    // Restituisci una stringa HTML contenente il link all'immagine con indice e nome file specificati
    return "<a href=\"visualizza.php?immagine=" 
    . $indice_immagine. "\">" 
    . "<img src=\"" .DIR_IMMAGINI. "/" 
    . $file . "\" width=\"80\" height= \"60\"/>"
    . "</a>";
}

// Definisci una funzione che genera un link all'immagine con indice $indice_immagine e nome file $file
function generaLinkImmagineDaS3($indice_immagine, $file, $bucketName) {
    global $KEY, $SECRETKEY;
    
    //preliminari 

    //array elements
    $elements= Array();
    // credenziali
    $credentials= new Aws\Credentials\Credentials ($KEY, $SECRETKEY); 
    
    $s3= new Aws\S3\S3Client([  'version' => 'latest',
                                'region' => 'eu-central-1', 
                                'credentials'=> $credentials]);

     $url = $s3->getObjectUrl($bucketName, $file);
    
    // Restituisci una stringa HTML contenente il link all'immagine con indice e nome file specificati
    return $url;
}

// Definisci una funzione che genera un link testuale all'immagine con indice $indice_immagine e testo $testo
function generaLinkTestuale($indice_immagine, $testo = "") {
    // Restituisci una stringa HTML contenente il link testuale all'immagine con indice e testo specificati
    return "<a href=\"visualizza.php?immagine=" 
    . $indice_immagine. "\">" 
    . $testo 
    . "</a>";
}

// Definisci una funzione che controlla se il nome file $nomefile rientra nei formati ammessi
function controllaFormato($nomefile) {
    // Usa la variabile globale $formati_immagine per controllare se il nome file rientra nei formati ammessi
    global $formati_immagine;
    foreach($formati_immagine as $formato)
        if(strrpos($nomefile, $formato))
            return TRUE;

    // Se il nome file non rientra in nessun formato ammesso, restituisci FALSE
    return FALSE;
}

// Definisci una funzione che controlla se il tipo MIME $tipo rientra nei tipi di immagine ammessi
function controllaTipo($tipo) {
    // Usa la variabile globale $tipi_immagine per controllare se il tipo MIME rientra nei tipi di immagine ammessi
    global $tipi_immagine;
    foreach($tipi_immagine as $formato) 
        if(strpos($tipo, $formato) === 0)
            return TRUE;

    // Se il tipo MIME non rientra in nessun tipo di immagine ammesso, restituisci FALSE
    return FALSE;
}
?>
