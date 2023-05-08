
<?php
require_once ("./vendor/ccc.php");

global $KEY, $SECRETKEY;

//preliminari 
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// credenziali
$credentials= new Aws\Credentials\Credentials (

    $KEY, 
    $SECRETKEY); 

$s3= new Aws\S3\S3Client([  'version' => 'latest',
                            'region' => 'eu-central-1', 
                            'credentials'=> $credentials]);

$result= $s3->listBuckets();

foreach($result['Buckets'] as $bucket){

    print( "<p>".$bucket['Name'] . ":" .$bucket['CreationDate']."</p>"); 
    print_r($bucket);
}
?>