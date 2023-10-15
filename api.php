<?php
include("dbconn.php");
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'POST':
    $data = json_decode(file_get_contents('php://input'), true);
      $arrcheckpost = array(
   "Light"=> '',
   "PersentaseKelembapanTanah"=> '',
   "AirQuality"=> '',
   "RainDrop"=> '',
   "H"=> '',
   "T"=> '',
   "Temperature"=> '',
   "Pressure"=> '',
   "ApproxAltitude"=> '');
   $hitung = count(array_intersect_key($data, $arrcheckpost));
   if($hitung == count($arrcheckpost)){
    $postData = [
        "Light"                       => "$data[Light]",
         "PersentaseKelembapanTanah"   => "$data[PersentaseKelembapanTanah]",
         "AirQuality"                  => "$data[AirQuality]",
         "RainDrop"                    => "$data[RainDrop]",
         "H"                           => "$data[H]",
         "T"                           => "$data[T]",
         "Temperature"                 => "$data[Temperature]",
         "Pressure"                    => "$data[Pressure]",
         "ApproxAltitude"              => "$data[ApproxAltitude]",
         "TimeStamp"                   => date("Y-m-d,H:i:s"),
    ];

    $ref_tables = "sensor1";
    $postRef = $database->getReference($ref_tables)->push($postData);
    if($postRef){
        echo "Data Saved";
    }
    else {
        echo "Error";
    }

    };
}
?>