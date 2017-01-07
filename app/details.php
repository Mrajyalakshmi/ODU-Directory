<?php
$values = $_POST["values"];
$uid=$values["id"];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://ww2.odu.edu/apps/mobile/directory/getDetails.php?search=1&id=".$uid,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json"),
                 ));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>

