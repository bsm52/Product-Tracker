<?php
function get_titles($keywords)
{
  // Your Access Key ID, as taken from the Your Account page
  $access_key_id = "AKIAJJO5EPD46ZBKZMVQ";

  // Your Secret Key corresponding to the above ID, as taken from the Your Account page
  $secret_key = "dWuoEGBleFe3axMzJwQ2HMJIXd58soGscx3Rj8EE";

  // The region you are interested in
  $endpoint = "webservices.amazon.com";

  $uri = "/onca/xml";

  $params = array(
      "Service" => "AWSECommerceService",
      "Operation" => "ItemSearch",
      "AWSAccessKeyId" => "AKIAJJO5EPD46ZBKZMVQ",
      "AssociateTag" => "brandon082-20",
      "SearchIndex" => "All",
      "Keywords" => "$keywords",
      "ResponseGroup" => "Images,ItemAttributes,Offers"
  );

  // Set current timestamp if not set
  if (!isset($params["Timestamp"])) {
      $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
  }

  // Sort the parameters by key
  ksort($params);

  $pairs = array();

  foreach ($params as $key => $value) {
      array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
  }

  // Generate the canonical query
  $canonical_query_string = join("&", $pairs);

  // Generate the string to be signed
  $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

  // Generate the signature required by the Product Advertising API
  $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $secret_key, true));

  // Generate the signed URL
  $request_url = 'https://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

  //echo "Signed URL: \"".$request_url."\"";



  $xml = simplexml_load_file($request_url);
  foreach ($xml->Items->Item as $item) 
  {
   echo $item->ItemAttributes->Title . '<br>';
  }

}


?>