<?php
$values = $_POST["values"];
$searchFilter= $values["filter"];
$searchString= $values["search_string"];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://ww2.odu.edu/apps/mobile/directory/search.php?search=1&string=".$searchString."&filter=".$searchFilter,
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



